<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkpdRequest;
use App\Models\Skpd;
use Illuminate\Support\Str;

class SkpdController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:skpd-list|skpd-create|skpd-edit|skpd-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:skpd-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:skpd-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:skpd-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Skpd::latest()->paginate(10);
        return view('pages.skpd.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Skpd();
        return view('pages.skpd.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkpdRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_skpd);
        Skpd::create($data);
        session()->flash('success', 'SKPD berhasil dibuat.');
        return redirect()->route('skpd.create');
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
        $item = Skpd::findOrFail($id);
        return view('pages.skpd.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkpdRequest $request, $id)
    {
        $data = $request->all();
        $item = Skpd::findOrFail($id);
        $item->update($data);
        session()->flash('success', 'SKPD telah diperbaharui.');
        return redirect()->route('skpd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Skpd::findOrFail($id);
        $item->delete();
        session()->flash('success', 'SKPD telah terhapus.');
        return redirect()->route('skpd.index');
    }
}
