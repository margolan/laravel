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

            $data['status'] = 'Запланировано';

            if (Auth::check()) {
                $data['author'] = Auth::user()->name;
            } else {
                $data['author'] = 'Guest';
            }

            Kanban::create($data);
        }

        $statuses = ['Запланировано', 'Выполняется', 'Проверка', 'Завершено'];

        $kanban = Kanban::get()->groupBy('status')->toArray();

        $data0 = [];

        foreach ($statuses as $status) {
            $data0[$status] = $kanban[$status] ?? [];
        }

        return view('kanban', ['kanban' => $data0]);
    }

    public function interact(Request $request)
    {

        $statuses = ['Запланировано', 'Выполняется', 'Проверка', 'Завершено'];

        $current_sticker = Kanban::where('id', $request->id)->first();

        $sticker_position = array_search($current_sticker->status, $statuses);

        if ($request->move === 'forward') {

            if ($sticker_position != 3) {

                $current_sticker->status = $statuses[$sticker_position + 1];
            } else {
                return back()->with('status', 'Ошибка');
            }
        } else if ($request->move === 'back') {

            if ($sticker_position != 0) {

                $current_sticker->status = $statuses[$sticker_position - 1];
            } else {
                return back()->with('status', 'Ошибка');
            }
        }

        $current_sticker->save();

        return redirect()->back()->with('test_data', 'done');
    }
}
