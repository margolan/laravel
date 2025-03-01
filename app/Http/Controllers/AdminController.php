<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Token;
use App\Models\Schedule;
use App\Models\Key;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $data['schedule'] = Schedule::select('id', 'city', 'depart', 'date')->get();

        $data['key'] = Key::select('id', 'created_at')->get();

        $data['token'] = Token::all();

        return view('admin', ['data' => $data]);
    }

    public function token_create()
    {

        $token = Str::random(40);

        Token::create([
            'token' => $token,
        ]);

        return redirect()->route('admin_index')->with('status', 'Токен выпущен');
    }

    public function token_delete(Request $request) {

        Token::where('id', $request->id)->delete();

        return redirect()->route('admin_index')->with('status', 'Токен удален');
        
    }
}
