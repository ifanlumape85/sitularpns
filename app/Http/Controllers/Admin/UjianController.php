<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UjianRequest;
use App\Models\Ujian;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ujian-list|ujian-create|ujian-edit|ujian-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:ujian-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ujian-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ujian-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ujian::latest()->paginate(10);
        return view('pages.ujian.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Ujian();
        return view('pages.ujian.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UjianRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_ujian);
        Ujian::create($data);
        session()->flash('success', 'Ujian berhasil dibuat.');
        return redirect()->route('ujian.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Ujian::findOrFail($id);
        return view('pages.ujian.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Ujian::findOrFail($id);
        return view('pages.ujian.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UjianRequest $request, $id)
    {
        $data = $request->all();
        $item = Ujian::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Ujian telah diperbaharui.');
        return redirect()->route('ujian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ujian::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Ujian telah terhapus.');
        return redirect()->route('ujian.index');
    }
}
