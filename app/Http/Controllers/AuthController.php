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

    public function auth()
    {
        return view('auth');
    }

    public function login(Request $request)
    {

        $user = User::where('login', $request->login)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('auth_admin')->with('status', 'Успешная авторизация.');
        } else {
            return redirect()->route('auth_index')->with('status', 'Неудачная авторизация. Проверьте логин и\или пароль.');
        }
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

    public function admin(Request $request)
    {
        $data['schedule'] = Schedule::select('id', 'city', 'depart', 'date')->get();

        $data['key'] = Key::select('id', 'created_at')->get();

        return view('admin', ['data' => $data]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth_index')->with('status', 'Выполнен выход.');
    }
}
