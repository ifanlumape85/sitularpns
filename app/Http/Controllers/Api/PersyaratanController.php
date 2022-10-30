<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persyaratan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function index(Request $request)
    {
        $items = Persyaratan::with(['persyaratan_user' => function($query) use($request) {
            return $request->input('id_registrasi') ?
                $query->where('id_registrasi', $request->input('id_registrasi')) : '';
        }])
        ->where(function ($query) use ($request) {
            return $request->input('query') ?
                $query->where('nama_persyaratan', $request->input('query')) : '';
        })->where(function ($query) use ($request) {
            return $request->input('id') ?
                $query->where('id_ujian', $request->input('id')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'persyaratans' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
