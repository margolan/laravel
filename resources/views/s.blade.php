@extends('layout.app')

@section('title', 'Главная Страница')

@section('content')

  @php

    echo substr($complete_data['date'], 0, 2);
    echo '<pre>';
    print_r($complete_data);
    echo '</pre>';

  @endphp
  @if (isset($complete_data['names']))
    <h1 class="p-3 my-3 text-2xl"></h1>
    <div class="wrap w-full inline-flex">
      <div class="names_column"> <!-- names start -->
        <div
          class="names_header w-32 h-16 flex items-center pl-5 rounded-tl-lg dark:text-gray-700 font-semibold dark:bg-gray-200">
          Имя
        </div>
        @for ($a = 0; $a < count($complete_data['names']); $a++)
          <div
            class="names w-32 h-8 flex items-center pl-5 dark:text-gray-700 last:rounded-bl-lg odd:dark:bg-gray-200 even:dark:bg-white">
            {{ explode(' ', $complete_data['names'][$a])[1] }}
          </div>
        @endfor
      </div> <!-- names finish -->
      <div class="data_column w-min overflow-x-auto rounded-r-lg font-semibold">
        <div class="dates_row">
          <div class="day_row inline-flex dark:bg-gray-200 dark:text-gray-700">
            @foreach ($complete_data['dates'][0] as $index => $day)
              <div
                class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-gray-500 shadow-lg border-r-1 border-l-2 border-gray-100 today' : 'w-8 border-l-1 border-white' }}">
                {{ $day }} <!-- days -->
              </div>
            @endforeach
          </div>
          <div class="date_row inline-flex dark:bg-gray-200 dark:text-gray-700">
            @foreach ($complete_data['dates'][1] as $index => $date)
              <div
                class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-gray-500 shadow-lg border-r-1 border-l-2 border-gray-100 today' : 'w-8 border-l-1 border-white' }}">
                {{ $date }} <!-- dates -->
              </div>
            @endforeach
          </div>
        </div>
        @foreach ($complete_data['data'] as $data_rows)
          <div class="data_row inline-flex dark:text-gray-700 odd:dark:bg-gray-200 even:dark:bg-white">
            @foreach ($data_rows as $index => $cell)
              <div
                class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-gray-500 shadow-lg border-r-1 border-l-1 border-gray-100 today' : 'w-8 border-l-1 border-white' }}">
                {{ $cell }}
              </div>
            @endforeach
          </div>
        @endforeach

      </div>
    </div>
  @else
    <p class="my-3">
      {{ $complete_data[0] }}
    </p>
  @endif

@endsection
