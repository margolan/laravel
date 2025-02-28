<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Schedule;
use App\Models\Key;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public function pincode(Request $request)
    {
        if ($request->isMethod('get')) {

            $cookie = Cookie::get('pincode');

            if ($cookie == true) {
                return redirect()->route('k_index')->with('status', 'Вы авторизованы.');
            }

            return view('auth.pincode');
        }


        $user = User::where('name', 'pincode')->first();

        if (Hash::check($request->pincode, $user->password)) {
            return redirect()->back()->with('status', 'Вы вошли.')->cookie('pincode', true, 60 * 24 * 7);
        } else {
            return redirect()->back()->with('status', 'Неудачная авторизация. Проверьте пинкод.');
        }
    }

    public function pincode_reset(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('auth.pincode_reset', ['token' => $request->token]);
        }

        $token = $request->token;

        $user = User::where('name', 'pincode')->first();

        // $user->password = Hash::make($request->pincode);

        // $user->save();

        // return redirect()->route('auth_pincode_reset')->with('status', 'Пинкод изменен.');

        $data = $request->all();

        return view('auth.pincode_reset', compact('data'));
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

            return redirect()->intended('admin')->with('status', 'Вы вошли.');
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
                'name' => ['required', 'min:3', 'alpha_num'],
                'email' => ['required', 'email', 'unique:users,email'],
                'token' => ['required', 'alpha_num'],
                'password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', 'confirmed'],
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Вы вышли.');
    }
}
