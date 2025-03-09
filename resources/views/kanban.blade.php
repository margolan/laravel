@extends('layout.app')

@section('title', 'Kanban')

@section('content')

  @php
    $temp = ['todo', 'ready', 'test'];
    echo '<pre>';
    // print_r($temp);
    echo '</pre>';
    // echo array_values('ready', $temp);
  @endphp

  @if (isset($kanban))

    {{-- @if (isset($kanban['Выполняется'])) --}}
    {{-- @foreach ($kanban as $column => $item) --}}
    {{-- <p>{{ $item[0]->count() }} </p> --}}
    @php
        echo '<pre>';
        // print_r($kanban);
        echo '</pre>';
    @endphp

      {{-- @foreach ($item as $task) --}}
        {{-- <p>{{ $item[0]->count() }} </p> --}}
      {{-- @endforeach --}}
    {{-- @endforeach --}}
    {{-- @else --}}
    {{-- No Data --}}
    {{-- @endif --}}

    @php
      echo '<pre>';
      // print_r($kanban['Запланировано']->count());
      // print_r(count($kanban['Выполняется']));
      // print_r($kanban['Запланировано'][0]->title);
      echo '</pre>';

    @endphp
  @endif

  @if (session('test_data'))
    @php
      echo '<pre>';
      // print_r(session('test_data'));
      echo '</pre>';
    @endphp
  @endif
  @if ($errors->any())
    @php
      echo '<pre>';
      print_r($errors->any());
      echo '</pre>';
    @endphp
  @endif

  <div class="flex flex-col my-3 text-neutral-200">

    <h1 class="w-85 text-lg rounded-2xl my-3 py-3 bg-neutral-800 px-5"><a href="/kanban">Канбан (в разработке...)</a></h1>

    <div class="flex flex-wrap rounded-2xl gap-3">

      @if (isset($kanban))
        @foreach ($kanban as $status => $item)
          <div class="todo w-85 h-max px-3 bg-neutral-800 rounded-2xl">
            <div class="header h-18 flex flex-col justify-center">
              <span class="font-semibold text-lg ml-5">{{ $status }} ({{ count($item) }})</span>
            </div>

            @if (count($item))
              @foreach ($item as $task)
                <div class="border-1 border-neutral-300 rounded-2xl mb-5">
                  <div class="p-4">
                    <h2
                      class="w-max mb-2 rounded-full px-4 py-1 {{ match ($task['priority']) {
                          'high' => 'bg-rose-700',
                          'low' => 'bg-emerald-700',
                          'medium' => 'bg-fuchsia-700',
                      } }}">
                      {{ $task['title'] }}</h2>
                    <p class="indent-3">
                      {{ $task['text'] }}
                    </p>
                  </div>

                  <div class="flex px-2 pb-2 justify-between">
                    @if ($task['status'] != 'Запланировано')
                      <a href="/kanban/move?id={{ $task['id'] }}&move=back"
                        class="cursor-pointer hover:text-neutral-500 border-1 rounded-full px-[6px]">&#11164</a>
                    @endif
                    <span class="w-full"></span>
                    @if ($task['status'] != 'Завершено')
                      <a href="/kanban/move?id={{ $task['id'] }}&move=forward"
                        class="text-center cursor-pointer hover:text-neutral-500 border-1 rounded-full px-[6px]">&#11166</a>
                    @endif
                  </div>

                </div>
              @endforeach
            @else
            <div class="p-4">Задач нет</div>
            @endif

            @if ($status == 'Запланировано')
              <div class="border-1 border-neutral-300 rounded-2xl mb-5 px-3 p-4">
                <form action="{{ route('kanban') }}" method="post">
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
          </div>
        @endforeach
      @endif


    </div>

  </div>

@endsection
