<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Token;
use App\Models\Schedule;
use App\Models\Key;
use App\Models\User;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $data['users'] = User::all();

        $data['schedule'] = Schedule::select('id', 'city', 'depart', 'date')->get();

        $data['key'] = Key::select('id', 'created_at')->get();

        $data['token'] = Token::all();

        return view('admin', ['data' => $data]);
    }

    public function token_create()
    {

        $token = Str::random(25);

        Token::create([
            'token' => $token,
        ]);

        return redirect()->route('admin_index')->with('status', 'Токен выпущен');
    }

    public function token_delete(Request $request)
    {

        Token::where('id', $request->id)->delete();

        return redirect()->route('admin_index')->with('status', 'Токен удален');
    }

    public function admin_pincode_reset(Request $request)
    {

        $user = User::where('name', 'pincode')->first();

        $user->password = Hash::make($request->pincode);

        $user->save();

        return redirect()->route('admin_index')->with('status', 'Пинкод сменён.');
    }

    public function user_edit(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        return redirect()->back()->with('processed_data', $user);
    }
}
