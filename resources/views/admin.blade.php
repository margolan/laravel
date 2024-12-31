@extends('layout.app')

@section('title', 'Где-то')
@section('content')

  @isset($data)

    {{-- {{ $data->city }} --}}

    <h2 class="text-xl my-2">Schedules</h2>
    <div class="mb-5">
      @foreach ($data['schedule'] as $cell)
        <p class="w-max h-7 flex items-center bg-emerald-950 my-1 rounded-full pl-5">{{ $cell->id }} :
          {{ $cell->city }} {{ $cell->depart }} {{ $cell->date }}<a href="{{ route('s_delete') }}?id={{ $cell['id'] }}"
            class="w-max h-7 ml-5 flex items-center bg-red-950 rounded-full text-white text-sm px-4">Удалить</a>
        </p>
      @endforeach
    </div>

    <h2 class="text-xl my-2">Keys</h2>
    <div class="mb-5">
      @foreach ($data['key'] as $cell)
        <p class="w-max h-7 flex items-center bg-emerald-950 my-1 rounded-full pl-5">{{ $cell->id }} :
          {{ $cell->created_at }}<a href="{{ route('k_delete') }}?id={{ $cell['id'] }}"
            class="w-max h-7 ml-5 flex items-center bg-red-950 rounded-full text-white text-sm px-4">Удалить</a>
        </p>
      @endforeach
    </div>

    @php

      echo '<pre>';
      // print_r($data);
      echo '</pre>';

    @endphp

  @endisset

@endsection
