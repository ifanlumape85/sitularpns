<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersyaratanRequest;
use App\Http\Requests\Admin\PersyaratanUserRequest;
use App\Models\Persyaratan;
use App\Models\Persyaratan_user;
use App\Models\Registrasi;
use App\Models\Ujian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersyaratanUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:persyaratan_user-list|persyaratan_user-create|persyaratan_user-edit|persyaratan_user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:persyaratan_user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:persyaratan_user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:persyaratan_user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->getRoleNames()[0] == 'User') {

            $items = Persyaratan_user::select(
                'persyaratan_user.id',
                'persyaratan.nama_persyaratan',
                'ujian.nama_ujian',
                'persyaratan_user.berkas',
                'users.name',
                'persyaratan_user.id_registrasi',
                'detail_user.nip',
                'registrasi.no_registrasi',
                'persyaratan_user.created_at'
            )
                ->join('persyaratan', 'persyaratan_user.id_persyaratan', '=', 'persyaratan.id')
                ->join('registrasi', 'persyaratan_user.id_registrasi', '=', 'registrasi.id')
                ->join('detail_user', 'registrasi.id_detail_user', '=', 'detail_user.id')
                ->join('ujian', 'detail_user.id_ujian', '=', 'ujian.id')
                ->join('users', 'detail_user.id_user', '=', 'users.id')
                ->where('detail_user.id_user', auth()->user()->id)
                ->latest()
                ->paginate(10);
        } else {
            $items = Persyaratan_user::select(
                'persyaratan_user.id',
                'persyaratan.nama_persyaratan',
                'ujian.nama_ujian',
                'persyaratan_user.berkas',
                'users.name',
                'persyaratan_user.id_registrasi',
                'detail_user.nip',
                'registrasi.no_registrasi',
                'persyaratan_user.created_at'
            )
                ->join('persyaratan', 'persyaratan_user.id_persyaratan', '=', 'persyaratan.id')
                ->join('registrasi', 'persyaratan_user.id_registrasi', '=', 'registrasi.id')
                ->join('detail_user', 'registrasi.id_detail_user', '=', 'detail_user.id')
                ->join('ujian', 'detail_user.id_ujian', '=', 'ujian.id')
                ->join('users', 'detail_user.id_user', '=', 'users.id')
                ->where('detail_user.id_user', auth()->user()->id)
                ->latest()
                ->paginate(10);
        }
        return view('pages.persyaratan_user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Persyaratan_user();
        $persyaratans = Persyaratan::get();
        $registrasis = Registrasi::get();
        return view('pages.persyaratan_user.create', compact('item', 'persyaratans', 'registrasis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersyaratanUserRequest $request)
    {
        $data = $request->all();
        if ($request->file('berkas')) {
            $data['berkas'] = $request->file('berkas')->store(
                'assets/berkas',
                'public'
            );
        }
        Persyaratan_user::create($data);
        session()->flash('success', 'Berkas User berhasil diupload.');
        return redirect()->route('registrasi.show', $data['id_registrasi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Persyaratan_user::findOrFail($id);
        return view('pages.persyaratan_user.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Persyaratan_user::findOrFail($id);
        $persyaratans = Persyaratan::get();
        $registrasis = Registrasi::get();
        return view('pages.persyaratan_user.edit', compact('item', 'persyaratans', 'registrasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersyaratanUserRequest $request, $id)
    {
        $data = $request->all();
        $item = Persyaratan_user::findOrFail($id);
        if ($request->file('berkas')) {
            Storage::delete($item->berkas);
            $data['berkas'] = $request->file('berkas')->store(
                'assets/berkas',
                'public'
            );
        }
        $item->update($data);
        session()->flash('success', 'Persyaratan User telah diperbaharui.');
        return redirect()->route('persyaratan_user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Persyaratan_user::findOrFail($id);
        $id_registrasi = $item->id_registrasi;
        Storage::delete($item->berkas);
        $item->delete();
        session()->flash('success', 'Berkas telah terhapus.');
        return redirect()->route('registrasi.show', $id_registrasi);
    }
}
