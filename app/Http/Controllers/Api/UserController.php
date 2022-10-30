<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => '2',
                'message' => $validator->errors()->first()
            ];
            return response()->json($response, 200);
        }

        try {
            $credentials = request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                $response = [
                    'code' => '2',
                    'status' => false,
                    'message' => 'Unauthorized.'
                ];
                return response()->json($response, 200);
            }

            $user = User::where('username', $request->username)
                ->first();

            if (!Hash::check($request->password, $user->password, [])) {
                $response = [
                    'code' => '2',
                    'status' => false,
                    'message' => 'Invalid Credentials.'
                ];
                return response()->json($response, 200);
            }

            if (!$user->hasVerifiedEmail()) {
                $response = [
                    'code' => '2',
                    'status' => false,
                    'message' => 'You must verify your email address.'
                ];
                return response()->json($response, 200);
            }

            // $user->getRoleNames();

            $response = [
                'code' => '1',
                'message' => 'Sukses',
                'status' => true,
                'user' => $user->toArray()
            ];
            return response()->json($response, 200);
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

    public function lupaPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'exists:users,email']
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = [
                'code' => '2',
                'status' => false,
                'message' => $error
            ];
            return response()->json($response, 200);
        }

        try {

            $status = Password::sendResetLink(
                $request->only('email')
            );

            if ($status === Password::RESET_LINK_SENT) {
                $response = [
                    'code' => '1',
                    'status' => true,
                    'message' => 'Password reset link has been sent'
                ];
            } else {
                $response = [
                    'code' => '2',
                    'status' => true,
                    'message' => $status
                ];
            }
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

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:users,id'],
            'password_lama' => ['required'],
            'ketik_ulang' => ['required'],
            'password_baru' => ['required']
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = [
                'code' => '2',
                'status' => false,
                'message' => $error
            ];
            return response()->json($response, 200);
        }

        try {
            if ($request->password_baru != $request->ketik_ulang) {
                $response = [
                    'code' => '2',
                    'status' => false,
                    'message' => 'Password tidak sama'
                ];
                return response()->json($response, 200);
            }

            $user = User::findOrFail($request->id);

            $user->password = Hash::make($request->password_baru);
            $user->update();

            $response = [
                'code' => '1',
                'status' => true,
                'message' => 'Sukses'
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = [
                'code' => '2',
                'status' => false,
                'message' => $error
            ];
            return response()->json($response, 200);
        }

        try {
            $user = User::findOrFail($request->id);

            $profile_photo_path = '';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();

            $response = [
                'code' => '1',
                'status' => true,
                'message' => 'Sukses',
                'profile_photo_path' => $profile_photo_path
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'konfirmasi_password' => ['required', 'min:6']
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => '2',
                'message' => $validator->errors()->first()
            ];
            return response()->json($response, 200);
        }

        try {
            $user = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];

            $item = User::create($user);
            $item->assignRole("User");

            $item->sendEmailVerificationNotification();

            $response = [
                'code' => '1',
                'message' => 'Email verification link sent on your email id',
                'user' => $item
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
