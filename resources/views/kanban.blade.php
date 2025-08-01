@extends('layout.app')

@section('title', 'Kanban')

@vite('resources/js/kanban.js')

@section('content')

  @if ($errors->any())
    @php
      echo '<pre>';
      print_r($errors->any());
      echo '</pre>';
    @endphp
  @endif

  <div class="flex flex-col my-3 text-neutral-200">

    <h1 class="w-85 text-lg rounded-2xl my-3 py-3 font-bold bg-neutral-800 px-5"><a href="/kanban">Канбан</a></h1>

    <div class="flex flex-wrap rounded-2xl gap-3">

      @if (isset($processed_data))
        @foreach ($processed_data as $status => $item)
          <div
            class="todo w-85 {{ $status === 'Завершено' ? 'h-100 overflow-hidden relative' : 'h-max' }} bg-neutral-800 rounded-2xl">
            <div class="header h-18 flex flex-col justify-center">
              <span class="font-semibold text-lg ml-5">{{ $status }} ({{ count($item) }})</span>
            </div>

            @if (count($item))
              @foreach ($item as $task)
                <div class="sticker w-78 mx-auto border-1 border-neutral-300 rounded-2xl mb-5">
                  <div class="p-4">
                    <div class="mb-2 flex justify-between">
                      <h2
                        class="w-max rounded-lg px-4 {{ match ($task['priority']) {
                            'high' => 'bg-rose-700',
                            'low' => 'bg-emerald-700',
                            'medium' => 'bg-neutral-600',
                        } }}">
                        {{ $task['title'] }}</h2>
                      <span title="Удалить запись" id={{ $task['id'] }}
                        class="text-neutral-400 cursor-pointer hover:text-white">&#x2715;</span>
                    </div>

                    <p class="indent-3">
                      {{ $task['text'] }}
                    </p>
                  </div>

                  <div class="flex p-3 justify-between items-center">
                    @if ($task['status'] != 'Запланировано')
                      <a href="/kanban/move?id={{ $task['id'] }}&move=back" title="Переместить влево"
                        class="cursor-pointer hover:border-r-white w-0 h-0 border-transparent border-6 border-r-10 border-r-neutral-500 block"></a>
                    @endif
                    <span class="w-full text-sm text-center">
                      [ <span title="Редактировать запись"
                        class="edit hover:text-white text-neutral-400 cursor-pointer">изменить</span>
                      ]
                    </span>
                    @if ($task['status'] != 'Завершено')
                      <a href="/kanban/move?id={{ $task['id'] }}&move=forward" title="Переместить вправо"
                        class="cursor-pointer hover:border-l-white w-0 h-0 border-transparent border-6 border-l-10 border-l-neutral-500 block"></a>
                    @endif
                  </div>

                </div>
              @endforeach
            @else
              <div class="p-4">Задач нет</div>
            @endif

            @if ($status == 'Запланировано')
              <div class="w-78 border-1 border-neutral-300 rounded-2xl mb-5 px-3 p-4 mx-auto">
                <form action="{{ route('kanban_add') }}" method="post">
                  @csrf
                  <p class="py-3 font-semibold">Новый Стикер</p>
                  <input type="text" name="title" class="w-full rounded-md border-1 p-2 mb-3"
                    placeholder="Заголовок">
                  <textarea name="text" rows="4" class="w-full rounded-md border-1 p-2 mb-3" placeholder="Текст"></textarea>
                  <select name="priority" class="w-full bg-neutral-800 rounded-md border-1 p-2 mb-3">
                    <option value="high" class="text-red-500">Высокий приоритет</option>
                    <option value="medium" class="text-neutral-300" selected>Без приоритета</option>
                    <option value="low" class="text-green-500">Низкий приоритет</option>
                  </select>
                  <button type="submit" class="py-1 px-5 border-1 rounded-md">Добавить</button>
                </form>
              </div>
            @endif
            @if ($status == 'Завершено')
              <div
                class="box w-full h-15 bg-linear-to-b to-black absolute bottom-0 flex justify-center items-end">
                <div class="btn_expand w-5 h-5 border-b-2 border-r-2 rotate-45 cursor-pointer mb-4 hover:mb-3 transition-all"></div>
              </div>
            @endif
          </div>
        @endforeach
      @endif


    </div>

  </div>

  <div class="data_edit hidden">
    <div class="w-full h-screen fixed top-0 left-0 flex items-center justify-center backdrop-blur-lg">
      <div
        class="w-85 border-1 border-neutral-300 bg-neutral-200 text-neutral-900 rounded-2xl shadow-2xl shadow-black px-5 py-4">
        <form action="{{ route('kanban_edit') }}" method="post">
          @csrf
          <div class="flex justify-between items-center">
            <p class="py-3 font-semibold">Редактировать Стикер</p>
            <span class="sticker_close cursor-pointer text-neutral-600 hover:text-black">&#x2715;</span>
          </div>
          <input type="text" name="title" class="w-full rounded-md border-1 p-2 mb-3" placeholder="Заголовок">
          <textarea name="text" rows="4" class="w-full rounded-md border-1 p-2 mb-3" placeholder="Текст"></textarea>
          <select name="priority" class="w-full rounded-md border-1 p-2 mb-3">
            <option value="high" class="text-red-500">Высокий приоритет</option>
            <option value="medium" selected>Без приоритета</option>
            <option value="low" class="text-green-500">Низкий приоритет</option>
          </select>
          <input type="text" name="id" hidden>
          <button type="submit" class="py-1 px-5 border-1 rounded-md">Добавить</button>
        </form>
      </div>
    </div>
  </div>

@endsection
