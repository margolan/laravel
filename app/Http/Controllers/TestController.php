<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test(Request $request)
    {

        if ($request->isMethod('get')) {

            if (!empty($request->id)) {
                $query = Key::query();

                $query->where('id', $request->id);

                $keys = $query->get()->toArray();
            } else {
                $keys = 'no data';
            }

            return view('test', ['data' => $request->all(), 'keys' => $keys]);
        }
    }
}
