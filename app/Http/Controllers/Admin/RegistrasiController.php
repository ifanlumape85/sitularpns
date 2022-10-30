<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegistrasiRequest;
use App\Models\Registrasi;
use PDF;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:registrasi-list|registrasi-create|registrasi-edit|registrasi-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:registrasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:registrasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:registrasi-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->getRoleNames()[0] == 'User') {
            $items = Registrasi::select(
                'registrasi.id',
                'registrasi.no_registrasi',
                'registrasi.created_at',
                'ujian.nama_ujian',
                'users.name',
            )
                ->join('detail_user', 'registrasi.id_detail_user', '=', 'detail_user.id')
                ->join('ujian', 'detail_user.id_ujian', '=', 'ujian.id')
                ->join('users', 'detail_user.id_user', '=', 'users.id')
                ->where('detail_user.id_user', auth()->user()->id)
                ->latest()
                ->paginate(10);
        } else {
            $items = Registrasi::select(
                'registrasi.id',
                'registrasi.no_registrasi',
                'registrasi.created_at',
                'ujian.nama_ujian',
                'users.name',
            )
                ->join('detail_user', 'registrasi.id_detail_user', '=', 'detail_user.id')
                ->join('ujian', 'detail_user.id_ujian', '=', 'ujian.id')
                ->join('users', 'detail_user.id_user', '=', 'users.id')
                ->latest()
                ->paginate(10);
        }
        return view('pages.registrasi.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Registrasi();
        return view('pages.registrasi.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrasiRequest $request)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->nama_ujian);
        Registrasi::create($data);
        session()->flash('success', 'Registrasi Berhasil.');
        return redirect()->route('registrasi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Registrasi::findOrFail($id);
        return view('pages.registrasi.show', compact('item'));
    }

    public function pdf($id)
    {
        $item = Registrasi::findOrFail($id);
        $title = 'BUKTI PENDAFTARAN';
        $pdf = PDF::loadView('pages.registrasi.pdf', compact('item', 'title'));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Registrasi::findOrFail($id);
        return view('pages.registrasi.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistrasiRequest $request, $id)
    {
        $data = $request->all();
        $item = Registrasi::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Registrasi telah diperbaharui.');
        return redirect()->route('registrasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Registrasi::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Registrasi telah terhapus.');
        return redirect()->route('registrasi.index');
    }
}
