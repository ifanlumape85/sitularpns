<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detail_user;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    public function index(Request $request)
    {
        $items = Registrasi::with('detail_user', 'detail_user.ujian')->where(function ($query) use ($request) {
            return $request->input('id') ?
                $query->where('id_user', $request->input('id')) : '';
        })->orderBy('id', 'desc')
            ->skip($request->input('start') ?? 0)
            ->take($request->input('limit') ?? 10)
            ->get();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'registrasis' => $items->toArray()
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_ujian' => ['required', 'integer', 'exists:ujian,id'],
            'id_user' => ['required', 'integer', 'exists:users,id'],
            'nip' => ['required'],
            'id_golongan' => ['required', 'integer', 'exists:golongan,id'],
            'jabatan' => ['required'],
            'id_skpd' => ['required', 'integer', 'exists:skpd,id']
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => '2',
                'message' => $validator->errors()->first()
            ];
            return response()->json($response, 200);
        }

        try {
            $detail_user = [
                'id_user' => $request->id_user,
                'id_ujian' => $request->id_ujian,
                'nip' => $request->nip,
                'id_golongan' => $request->id_golongan,
                'jabatan' => $request->jabatan,
                'id_skpd' => $request->id_skpd
            ];

            $item = Detail_user::create($detail_user);

            $registrasi = [
                'no_registrasi' => Str::random(12),
                'id_detail_user' => $item->id
            ];

            Registrasi::create($registrasi);

            $response = [
                'code' => '1',
                'status' => 'success'
            ];

            return response()->json($response, 201);
        } catch (QueryException $e) {
            $error = "";
            if (is_array($e->errorInfo)) {
                foreach ($e->errorInfo as $f) {
                    $error .= $f . " ";
                }
            } else {
                $error = $e->errorInfo;
            }
            $response = [
                'code' => '2',
                'status' => false,
                'message' => 'Failed. ' . $error
            ];
            return response()->json($response);
        }
    }
}
