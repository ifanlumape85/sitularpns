<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    public function index(Request $request)
    {
        $items = Skpd::where(function ($query) use ($request) {
            return $request->input('query') ?
                $query->where('nama_skpd', $request->input('query')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'skpds' => $items->toArray()
        ];
        return response()->json($response, 200);
    }

    public function all(Request $request)
    {
        $items = Skpd::get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'skpds' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
