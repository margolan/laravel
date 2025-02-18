<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        if (request()->isMethod('get')) {

            return view('auth.forgot_password');
        }


    }
}
