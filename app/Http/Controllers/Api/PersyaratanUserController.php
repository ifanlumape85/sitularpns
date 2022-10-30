<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persyaratan_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersyaratanUserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_persyaratan' => ['required', 'exists:persyaratan,id'],
            'id_registrasi' => ['required', 'exists:registrasi,id'],
            'berkas' => ['required']
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => '2',
                'message' => $validator->errors()->first()
            ];
            return response()->json($response, 200);
        }

        try {

            $data = [
                'id_registrasi' => $request->id_registrasi,
                'id_persyaratan' => $request->id_persyaratan
            ];

            // if ($request->file('berkas')) {
            //     $data['berkas'] = $request->file('berkas')->store(
            //         'assets/berkas',
            //         'public'
            //     );
            // }

            $pdf = $request->berkas;
            // $base = base64_decode($pdf);
            // $pdfName = time() . '.' . explode('/', explode(':', substr($pdf, 0, strpos($pdf, ';')))[1])[1];
            $pdf = str_replace('data:application/pdf;base64,', '', $pdf);
            $pdf = str_replace(' ', '+', $pdf);
            $pdfName = Str::random(60) . '.pdf';
            Storage::disk('local')->put('/public/assets/berkas/' . $pdfName, base64_decode($pdf));

            $data['berkas'] = 'assets/berkas/' . $pdfName ?? "";
            $item = Persyaratan_user::create($data);

            $response = [
                'code' => '1',
                'message' => 'Success',
                'persyaratan_user' => $item
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
