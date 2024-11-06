<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($input);

        $data = [
            'message' => 'user is created succesfully'
        ];

        return response() -> json ($data, 200);
    }
    # Membuat fitur Login
    public function login(Request $request) {
        # Menangkap input user
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        # Mengambil data user dari database berdasarkan email
        $user = User::where('email', $input['email'])->first();

        # Membandingkan input user dengan data user di database
        $isLoginSuccessfully = (
            $input['email'] == $user->email
            && Hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
            # Membuat token autentikasi
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login successfully',
                'token' => $token->plainTextToken
            ];

            # Mengembalikan response JSON dengan status 200 OK
            return response()->json($data, 200);
        } else {
            # Jika login gagal, mengembalikan pesan error
            $data = [
                'message' => 'Username or Password is wrong'
            ];

            return response()->json($data, 401);
        }
    }

}
