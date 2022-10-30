<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JenjangPendidikanRequest;
use App\Models\JenjangPendidikan;
use Illuminate\Support\Str;

class JenjangPendidikanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:jenjang_pendidikan-list|jenjang_pendidikan-create|jenjang_pendidikan-edit|jenjang_pendidikan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:jenjang_pendidikan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jenjang_pendidikan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jenjang_pendidikan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = JenjangPendidikan::latest()->paginate(10);
        return view('pages.jenjang_pendidikan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new JenjangPendidikan();
        return view('pages.jenjang_pendidikan.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenjangPendidikanRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_jenjang_pendidikan);
        JenjangPendidikan::create($data);
        session()->flash('success', 'Jenjang Pendidikan berhasil dibuat.');
        return redirect()->route('jenjang_pendidikan.create');
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
        $item = JenjangPendidikan::findOrFail($id);
        return view('pages.jenjang_pendidikan.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenjangPendidikanRequest $request, $id)
    {
        $data = $request->all();
        $item = JenjangPendidikan::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'Jenjang Pendidikan telah diperbaharui.');
        return redirect()->route('jenjang_pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = JenjangPendidikan::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Golongan telah terhapus.');
        return redirect()->route('jenjang_pendidikan.index');
    }
}
