<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $cred =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($cred)) {
        } else {
            $user = Auth::user();
            $json = [
                'status' => [
                    'status' => true,
                    'message' => 'User Loged',
                    'http_code' => 200
                ],
                'data' => ['token' => $user->createToken('myapp')->accessToken]
            ];
            return response()->json($json);

            $json = [
                'status' => [
                    'status' => false,
                    'message' => 'No user of this credintials.',
                    'http_code' => 402
                ],
                'data' => []
            ];
            return response()->json($json);
        }
    }
}
