<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $item = Profile::first();

        $response = [
            'code' => 1,
            'message' => 'Sukses',
            'profile' => $item
        ];
        return response()->json($response, 200);
    }
}
