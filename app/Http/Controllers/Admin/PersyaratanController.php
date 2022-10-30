<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersyaratanRequest;
use App\Models\Persyaratan;
use App\Models\Ujian;
use Illuminate\Support\Str;

class PersyaratanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:persyaratan-list|persyaratan-create|persyaratan-edit|persyaratan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:persyaratan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:persyaratan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:persyaratan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Persyaratan::with('ujian')->latest()->paginate(10);
        return view('pages.persyaratan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Persyaratan();
        $ujians = Ujian::get();
        return view('pages.persyaratan.create', compact('item', 'ujians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersyaratanRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_persyaratan);
        Persyaratan::create($data);
        session()->flash('success', 'Persyaratan berhasil dibuat.');
        return redirect()->route('persyaratan.create');
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
        $item = Persyaratan::findOrFail($id);
        $ujians = Ujian::get();
        return view('pages.persyaratan.edit', compact('item', 'ujians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersyaratanRequest $request, $id)
    {
        $data = $request->all();
        $item = Persyaratan::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Persyaratan telah diperbaharui.');
        return redirect()->route('persyaratan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Persyaratan::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Persyaratan telah terhapus.');
        return redirect()->route('persyaratan.index');
    }
}
