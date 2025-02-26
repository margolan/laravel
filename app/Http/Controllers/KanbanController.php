<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KanbanController extends Controller
{

    public function interact(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('kanban');
        }

        $data = $request->validate(
            [
                'title' => 'required|string',
                'text' => 'required|string',
                'priority' => 'required|string',
                // 'column' => 'required|string',
                // 'author' => 'required|string',
                // 'va1' => 'required|string',
                // 'va2' => 'required|string',
                // 'va3' => 'required|string',
            ],
            [
                'title.required' => 'Title is required',
                'text.required' => 'Text is required',
                'priority.required' => 'Priority is required',
                // 'column.required' => 'Column is required',
                // 'author.required' => 'Author is required',
                // 'va1.required' => 'Va1 is required',
                // 'va2.required' => 'Va2 is required',
                // 'va3.required' => 'Va3 is required',
            ]
        );

        if(Auth::check()) {
            $data['author'] = Auth::user()->name;
        } else {
            $data['author'] = 'Guest';
        }

        $data['column'] = '2';

        // $data = $request->all();

        Kanban::create($data);

        return view('kanban', compact('data'));
    }
}
