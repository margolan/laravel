<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KanbanController extends Controller
{

    public function kanban_index()
    {

        $statuses = ['Запланировано', 'Выполняется', 'Проверка', 'Завершено'];

        $kanban = Kanban::get()->groupBy('status')->toArray();

        $processed_data = [];

        foreach ($statuses as $status) {
            $processed_data[$status] = $kanban[$status] ?? [];
        }

        return view('kanban', ['processed_data' => $processed_data]);
    }

    public function kanban_move(Request $request)
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

        return redirect()->back()->with('status', 'Выполнено');
    }

    public function kanban_remove(Request $request) {

        $kanban = Kanban::where('id', $request->id)->first();

        $kanban->delete();

        return redirect()->back()->with('status','Запись удалена');

    }

    public function kanban_add(Request $request)
    {

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

        return redirect()->back()->with('status', 'Новая запись добавлена');
    }

    public function kanban_edit(Request $request) {

        $kanban = Kanban::where('id', $request->id)->first();

        $kanban->title = $request->title;
        $kanban->text = $request->text;
        $kanban->priority = $request->priority;
        if (Auth::check()) {
            $kanban['author'] = Auth::user()->name;
        } else {
            $kanban['author'] = 'Guest';
        }

        $kanban->save();
        
        return redirect()->back()->with('status', 'Ззапись редактирована');


    }
}
