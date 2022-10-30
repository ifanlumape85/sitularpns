<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index(Request $request)
    {
        $items = Ujian::with('persyaratan')->where(function ($query) use ($request) {
            return $request->input('query') ?
                $query->where('nama_ujian', $request->input('query')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'ujians' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
