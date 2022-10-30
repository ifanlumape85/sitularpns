<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index(Request $request)
    {
        $items = Golongan::where(function ($query) use ($request) {
            return $request->input('query') ?
            $query->where('nama_pangkat', $request->input('query')) : '';
        })->orderBy('id', 'desc')
        ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'golongans' => $items->toArray()
        ];
        return response()->json($response, 200);
    }

    public function all(Request $request)
    {
        $items = Golongan::get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'golongans' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
