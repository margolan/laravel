<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public function pincode(Request $request)
    {

        $hashed_pincode = User::where('name', 'pincode')->first()->password;

        if ($request->isMethod('get')) {

            $cookie = Cookie::get('pincode');

            if ($cookie == $hashed_pincode) {

                return redirect()->route('k_index')->with('status', 'Вы авторизованы.');
            }

            return view('auth.pincode');
        }

        $user = User::where('name', 'pincode')->first();

        if (Hash::check($request->pincode, $user->password)) {
            return redirect()->back()->with('status', 'Вы вошли.')->cookie('pincode', $hashed_pincode, 60 * 24 * 7);
        } else {
            return redirect()->back()->with('status', 'Неверный пинкод.');
        }
    }

    public function pincode_reset(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('auth.pincode_reset', ['token' => $request->token]);
        }

        $token = $request->token;

        if (empty($token)) {
            return redirect()->route('auth_pincode_reset')->with('status', 'У вас нет права на смену пин-кода.');
        }

        $user = User::where('name', 'pincode')->first();

        $user->password = Hash::make($request->pincode);

        $user->save();

        return redirect()->route('auth_pincode_reset')->with('status', 'Пинкод изменен.');
    }

    public function login(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required',],
        ]);

        if (Auth::attempt($credentials, $request->rememberme)) {

            $request->session()->regenerate();

            return redirect()->route('admin_index')->with('status', 'Вы вошли.');
        }

        return back()->with('status', 'Неудачная авторизация. Проверьте логин и\или пароль.');
    }

    public function register_proccess(Request $request)
    {

        $token = Token::where('token', request('token'))->first();

        $valid = $request->validate(
            [
                'name' => ['required', 'min:3', 'alpha_num'],
                'email' => ['required', 'email', 'unique:users,email'],
                'token' => ['required', function ($attr, $val, $fail) use ($token) {
                    if (!$token || $token->used !== null) {
                        $fail('Токен не найден или уже занят');
                    }
                }],
                'password' => ['required', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
            ],
            [
                'name.required' => 'Логин не заполнен',
                'name.min' => 'Логин: мин 3 символа',
                'name.alpha_num' => 'Логин: только латинские символы и цифры',
                'email.required' => 'Email не заполнен',
                'email.unique' => 'Email уже занят',
                'token.required' => 'Token не заполнен',
                'token.alpha_num' => 'Token: только латинские символы и цифры',
                'password.required' => 'Пароль не заполнен',
                'password.min' => 'Пароль: мин 6 символов',
                'password.max' => 'Пароль: макс 255 символов',
                'password.regex' => 'Пароль: A-Z, a-z, 0-9',
                'password.confirmed' => 'Пароли не совпадают',
            ]
        );

        $token->used = 'Регистрация ' . $request->email;
        $token->save();

        unset($valid['token']);
        $valid['role'] = 'user';
        $valid['depart'] = '-';
        $valid['city'] = '-';

        $user = User::create($valid);

        if ($user) {
            $status = 'Регистрация выполнена';
            Auth::login($user);
        } else {
            $status = 'Что-то пошло не так';
        }

        return redirect()->route('admin_index')->with('status', $status);
    }

    public function register_index(Request $request)
    {
        return view('auth.register', ['token' => $request->token]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back()->with('status', 'Вы вышли.');
    }
}
