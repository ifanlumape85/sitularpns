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
        $items = Registrasi::with('detail_user', 'detail_user.ujian', 'jenjang_pendidikan')->where(function ($query) use ($request) {
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
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'id_jenjang_pendidikan' => ['required', 'integer', 'exists:jenjang_pendidikan,id'],
            'id_golongan' => ['required', 'integer', 'exists:golongan,id'],
            'jabatan' => ['required'],
            'id_skpd' => ['required', 'integer', 'exists:skpd,id'],
            'jenjang_pendidikan_diambil' => ['required', 'integer', 'exists:jenjang_pendidikan,id'],
            'program_studi' => ['required'],
            'fakultas' => ['required'],
            'universitas' => ['required'],
            'tgl_diterima' => ['required'],
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
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
                'id_jenjang_pendidikan' => $request->id_jenjang_pendidikan,
                'id_golongan' => $request->id_golongan,
                'jabatan' => $request->jabatan,
                'id_skpd' => $request->id_skpd
            ];

            $item = Detail_user::create($detail_user);

            $registrasi = [
                'no_registrasi' => Str::random(12),
                'id_jenjang_pendidikan' => $request->jenjang_pendidikan_diambil,
                'program_studi' => $request->program_studi,
                'fakultas' => $request->fakultas,
                'universitas' => $request->universitas,
                'tgl_diterima' => date('Y-m-d', strtotime($request->tgl_diterima)),
                'biaya' => 1,
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
