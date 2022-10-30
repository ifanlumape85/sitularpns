<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GolonganRequest;
use App\Models\Golongan;
use Illuminate\Support\Str;

class GolonganController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:golongan-list|golongan-create|golongan-edit|golongan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:golongan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:golongan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:golongan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Golongan::latest()->paginate(10);
        return view('pages.golongan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Golongan();
        return view('pages.golongan.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GolonganRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_pangkat);
        Golongan::create($data);
        session()->flash('success', 'Golongan berhasil dibuat.');
        return redirect()->route('golongan.create');
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
        $item = Golongan::findOrFail($id);
        return view('pages.golongan.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GolonganRequest $request, $id)
    {
        $data = $request->all();
        $item = Golongan::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Golongan telah diperbaharui.');
        return redirect()->route('golongan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Golongan::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Golongan telah terhapus.');
        return redirect()->route('golongan.index');
    }
}
