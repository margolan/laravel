@extends('layout.app')

@section('title', 'Kanban')

@section('content')


  @if (isset($kanban))
    @php
      echo '<pre>';
      // print_r($kanban->count());
      // print_r($kanban);
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

    <h1 class="w-85 text-lg rounded-2xl my-3 py-3 bg-neutral-800 px-5">Канбан (в разработке...)</h1>

    <div class="flex flex-wrap rounded-2xl gap-3">
      <div class="todo w-85 h-max px-3 bg-neutral-800 rounded-2xl">
        <div class="header h-18 flex flex-col justify-center">
          <span class="font-semibold text-lg ml-5">План ({{ $kanban->count() }})</span>
        </div>
        @if (isset($kanban))
          @foreach ($kanban as $item)
            <div class="border-1 border-neutral-300 rounded-2xl mb-5">
              <div class="p-4">
                <h2
                  class="w-max mb-2 rounded-full px-4 py-1 {{ match ($item->priority) {
                      'high' => 'bg-rose-700',
                      'low' => 'bg-emerald-700',
                      'medium' => 'bg-fuchsia-700',
                  } }}">
                  {{ $item->title }}</h2>
                <p class="indent-3">
                  {{ $item->text }}
                </p>
              </div>
              <div class="flex justify-end cursor-pointer">
                <div class="px-5 cursor-pointer rounded-br-full">To the Right</div>
              </div>
            </div>
          @endforeach
        @endif

        {{-- Input Form --}}

        <div class="border-1 border-neutral-300 rounded-2xl mb-5 px-3 p-4">
          <form action="{{ route('kanban') }}" method="post">
            @csrf
            <p class="py-3 font-semibold">Новый Стикер</p>
            <input type="text" name="title" class="w-full rounded-md border-1 p-2 mb-3" placeholder="Заголовок">
            <textarea name="text" rows="4" class="w-full rounded-md border-1 p-2 mb-3" placeholder="Текст"></textarea>
            <select name="priority" class="w-full bg-neutral-800 rounded-md border-1 p-2 mb-3">
              <option value="high" class="text-red-500">Высокий приоритет</option>
              <option value="medium" class="text-neutral-300" selected>Без приоритета</option>
              <option value="low" class="text-green-500">Низкий приоритет</option>
            </select>
            <button type="submit" class="py-1 px-5 border-1 rounded-md">Добавить</button>
          </form>
        </div>
      </div>

      {{-- Divider --}}

      <div class="todo w-85 h-max px-3 bg-neutral-800 rounded-2xl">
        <div class="header h-18 flex flex-col justify-center">
          <span class="font-semibold text-lg ml-5">В Процессе ({{ $kanban->count() }})</span>
        </div>
        @if (isset($kanban))
          @foreach ($kanban as $item)
            <div class="border-1 border-neutral-300 rounded-2xl mb-5">
              <div class="p-4">
                <h2
                  class="w-max mb-2 rounded-full px-4 py-1 {{ match ($item->priority) {
                      'high' => 'bg-rose-700',
                      'low' => 'bg-emerald-700',
                      'medium' => 'bg-fuchsia-700',
                  } }}">
                  {{ $item->title }}</h2>
                <p class="indent-3">
                  {{ $item->text }}
                </p>
              </div>
              <div class="flex justify-end cursor-pointer">
                <div class="px-5 cursor-pointer rounded-br-full">To the Right</div>
              </div>
            </div>
          @endforeach
        @endif
      </div>

      {{-- Divider --}}

      <div class="todo w-85 h-max px-3 bg-neutral-800 rounded-2xl">
        <div class="header h-18 flex flex-col justify-center">
          <span class="font-semibold text-lg ml-5">Тест ({{ $kanban->count() }})</span>
        </div>
        @if (isset($kanban))
          @foreach ($kanban as $item)
            <div class="border-1 border-neutral-300 rounded-2xl mb-5">
              <div class="p-4">
                <h2
                  class="w-max mb-2 rounded-full px-4 py-1 {{ match ($item->priority) {
                      'high' => 'bg-rose-700',
                      'low' => 'bg-emerald-700',
                      'medium' => 'bg-fuchsia-700',
                  } }}">
                  {{ $item->title }}</h2>
                <p class="indent-3">
                  {{ $item->text }}
                </p>
              </div>
              <div class="flex justify-end cursor-pointer">
                <div class="px-5 cursor-pointer rounded-br-full">To the Right</div>
              </div>
            </div>
          @endforeach
        @endif
      </div>

    </div>

  </div>

@endsection
