<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    public function password_request(Request $request)
    {
        if (request()->isMethod('get')) {

            return view('auth.password_request');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('status', 'Пользователь с таким email не найден');
        }

        Password::broker()->sendResetLink(['email' => $user->email]);

        return redirect()->back()->with('status', 'Ссылка на сброс пароля отправлена на ваш email');

    }

    public function password_reset(Request $request) {

        if (request()->isMethod('get')) {

            return view('auth.password_reset', ['request' => $request->token]);
        }

    }
}
