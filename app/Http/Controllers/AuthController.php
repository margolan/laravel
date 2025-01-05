<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Schedule;
use App\Models\Key;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required',],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->with('status', 'Неудачная авторизация. Проверьте логин и\или пароль.');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        $valid = $request->validate(
            [
                'login' => ['required', 'min:3', 'alpha_num', 'unique:users,login'],
                'email' => ['required', 'email', 'unique:users,email'],
                'token' => ['required', 'alpha_num'],
                'password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', 'confirmed'],
            ],
            [
                'login.required' => 'Логин не заполнен',
                'login.min' => 'Логин: мин 3 символа',
                'login.alpha_num' => 'Логин: только латинские символы и цифры',
                'login.unique' => 'Логин уже занят',
                'email.required' => 'Email не заполнен',
                'email.unique' => 'Email уже занят',
                'token.required' => 'Token не заполнен',
                'token.alpha_num' => 'Token: только латинские символы и цифры',
                'password.required' => 'Пароль не заполнен',
                'password.min' => 'Пароль: мин 8 символов',
                'password.max' => 'Пароль: макс 255 символов',
                'password.regex' => 'Пароль: A-Z, a-z, 0-9, !@#$%^&*()-_=+[]{};:"|,.<>/?',
                'password.confirmed' => 'Пароли не совпадают',
            ]
        );


        // return redirect()->back()->with('status', $processed_data);

    }

    public function admin(Request $request)
    {
        $data['schedule'] = Schedule::select('id', 'city', 'depart', 'date')->get();

        $data['key'] = Key::select('id', 'created_at')->get();

        return view('admin', ['data' => $data]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back()->with('status', 'Выполнен выход.');
    }
}
