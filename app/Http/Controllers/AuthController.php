<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(Request $request)
    {

        $processed_data = [];

        $user = User::where('login', $request->login)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $processed_data['pass'] = 'Auth Success!';
        } else {
            $processed_data['wrong'] = 'User not fount or password mismatch!';
        }

        $auth = Auth::id();

        return view('login', ['processed_data' => $processed_data, 'auth' => $auth]);
    }
}
