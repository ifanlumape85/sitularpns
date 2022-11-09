<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;

class JenjangPendidikanController extends Controller
{
    public function index(Request $request)
    {
        $items = JenjangPendidikan::where(function ($query) use ($request) {
            return $request->input('query') ?
                $query->where('nama_jenjang_pendidikan', $request->input('query')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'jenjang_pendidikans' => $items->toArray()
        ];
        return response()->json($response, 200);
    }

    public function all(Request $request)
    {
        $items = JenjangPendidikan::get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'jenjang_pendidikans' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
