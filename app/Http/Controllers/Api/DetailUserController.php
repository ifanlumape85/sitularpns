<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detail_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class DetailUserController extends Controller
{
    public function index(Request $request)
    {
        $items = Detail_user::with('registrasi', 'ujian', 'golongan', 'skpd', 'jenjang_pendidikan')->where(function ($query) use ($request) {
            return $request->input('id') ?
                $query->where('id_user', $request->input('id')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'detail_users' => $items->toArray()
        ];
        return response()->json($response, 200);
    }
}
