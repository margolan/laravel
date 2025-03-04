<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KanbanController extends Controller
{

    public function index(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->validate(
                [
                    'title' => 'required|string',
                    'text' => 'required|string',
                    'priority' => 'required|string',
                    // 'va1' => 'required|string',
                    // 'va2' => 'required|string',
                    // 'va3' => 'required|string',
                ],
                [
                    'title.required' => 'Title is required',
                    'text.required' => 'Text is required',
                    'priority.required' => 'Priority is required',
                    // 'va1.required' => 'Va1 is required',
                    // 'va2.required' => 'Va2 is required',
                    // 'va3.required' => 'Va3 is required',
                ]
            );

            $data['column'] = 'todo';

            if (Auth::check()) {
                $data['author'] = Auth::user()->name;
            } else {
                $data['author'] = 'Guest';
            }

            Kanban::create($data);

        }

        $kanban = Kanban::all();

        return view('kanban', compact('kanban'));
    }

    public function interact(Request $request) {

        $columns = ['todo', 'inprocess', 'testing', 'ready'];

        $current_sticker = Kanban::where('id', $request->id)->first();

        return redirect()->back()->with('test_data', $current_sticker);

    }
}
