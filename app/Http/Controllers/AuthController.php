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

        return redirect()->back();

        // return view('/', ['processed_data' => $processed_data, 'auth' => $auth]);
    }

    public function register(Request $request)
    {

        $inputs = $request->validate(
            [
                'login' => ['required', 'min:3', 'alpha_num', 'unique:users,login'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', 'confirmed']
            ],
            [
                'login.required' => 'Поле логин обязательное',
                'login.min' => 'Минимальное значение логина 3 символа',
                'login.alpha_num' => 'Только латинские символы и цифры',
                'login.unique' => 'Логин уже занят',
                'email.required' => 'Поле email обязательное',
                'email.unique' => 'Email уже занят',
                'password.required' => 'Пароль обязательное',
                'password.min' => 'Минимальная длина пароля 8 символов',
                'password.max' => 'Максимальная длина пароля 255 символов',
                'password.regex' => 'Пароль должен содержать минимум одну строчную букву, одну заглавную букву, одну цифру и один специальный символ',
            ]
        );

        $processed_data = [];
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
