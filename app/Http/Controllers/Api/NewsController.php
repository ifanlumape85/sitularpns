<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $items = News::with('category', 'user')->where(function ($query) use ($request) {
            return $request->input('query') ?
                $query->where('name', $request->input('query')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'news' => $items->toArray()
        ];
        return response()->json($response, 200);
    }

    public function lastNews(Request $request)
    {
        $items = News::with('category', 'user')->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'news' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
