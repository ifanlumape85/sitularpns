<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetailUserRequest;
use App\Models\Detail_user;
use App\Models\Golongan;
use App\Models\Registrasi;
use App\Models\Skpd;
use App\Models\Ujian;
use Illuminate\Http\Request;

class DetailUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:detail_user-list|detail_user-create|detail_user-edit|detail_user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:detail_user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:detail_user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:detail_user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Detail_user::latest()->paginate(10);
        return view('pages.detail_user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Detail_user();
        $golongans = Golongan::get();
        $skpds = Skpd::get();
        $ujians = Ujian::get();
        return view('pages.detail_user.create', compact('item', 'ujians', 'golongans', 'skpds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailUserRequest $request)
    {
        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        $detailUser = Detail_user::create($data);
        $registrasi = [
            'id_detail_user' => $detailUser->id,
            'no_registrasi' => uniqid()
        ];
        Registrasi::create($registrasi);
        session()->flash('success', 'Registrasi Berhasil.');
        return redirect()->route('registrasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Detail_user::findOrFail($id);
        $golongans = Golongan::get();
        $skpds = Skpd::get();
        $ujians = Ujian::get();
        return view('pages.detail_user.edit', compact('item', 'ujians', 'golongans', 'skpds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailUserRequest $request, $id)
    {
        $data = $request->all();
        $item = Detail_user::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Detail User telah diperbaharui.');
        return redirect()->route('detail_user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Detail_user::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Detail User telah terhapus.');
        return redirect()->route('detail_user.index');
    }
}
