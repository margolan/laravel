@extends('layout.app')

@section('title', 'Главная Страница')

@section('content')

  @if (isset($complete_data['names']))
    <h1 class="p-3 my-3 text-2xl">
      {{ $complete_data['month'][0] }}</h1>
    <div class="wrap w-full inline-flex">
      <div class="names_column"> <!-- names start -->
        <div
          class="names_header w-32 h-16 flex items-center pl-5 rounded-tl-lg dark:text-gray-700 font-semibold dark:bg-gray-200">
          Имя
        </div>
        @for ($a = 0; $a < count($complete_data['names']); $a++)
          <div
            class="names w-32 h-8 flex items-center pl-5 dark:text-gray-700 last:rounded-bl-lg odd:dark:bg-gray-100 even:dark:bg-white">
            {{ explode(' ', $complete_data['names'][$a])[1] }}
          </div>
        @endfor
      </div> <!-- names finish -->
      <div class="data_column w-min overflow-x-auto rounded-r-lg font-semibold">
        <div class="dates_row">
          <div class="day_row inline-flex dark:bg-gray-200 dark:text-gray-700">
            @foreach ($complete_data['dates'][0] as $day)
              <div class="w-8 h-8 flex justify-center items-center border-l-1 border-white">
                {{ $day }} <!-- days -->
              </div>
            @endforeach
          </div>
          <div class="date_row inline-flex dark:bg-gray-200 dark:text-gray-700">
            @foreach ($complete_data['dates'][1] as $date)
              <div class="w-8 h-8 flex justify-center items-center border-l-1 border-white">
                {{ $date }} <!-- dates -->
              </div>
            @endforeach
          </div>
        </div>
        @for ($a = 0; $a < count($complete_data['names']); $a++)
          <div class="data_row inline-flex dark:text-gray-700 odd:dark:bg-gray-100 even:dark:bg-white">
            @for ($b = 0; $b < count($complete_data['dates'][0]); $b++)
              <div class="w-8 h-8 flex justify-center items-center border-l-1 cell">
                {{ $complete_data['data'][$a][$b] }} <!-- data -->
              </div>
            @endfor
          </div>
        @endfor
      </div>
    </div>
  @else
    <p class="my-3">
      {{ $complete_data[0] }}
    </p>
  @endif

  @if (isset($complete_key[1]['Город']))
    <div class="wrap w-full flex-col mt-12">
      @for ($a = 1; $a < 7; $a++)
        @foreach ($complete_key[$a] as $city => $data)
          <div class="column w-full flex-wrap overflow-x-auto mt-7">
            <h2 class="city text-xl px-4 pb-3 pt-2 rounded-t-lg border-1 border-b-0 w-max">{{ $city }}</h2>
            <div class="row inline-flex w-full">
              @for ($b = 0; $b < 2; $b++)
                <div class="flex-col min-w-max first:w-48 last:w-full">
                  @for ($c = 0; $c < count($data[$b]); $c++)
                    <div class="border-1 flex px-2 h-8 items-center w-full">
                      {{ $data[$b][$c] }}
                      @if ($b == 0 && $c != 0)
                        <span
                          class="box ml-3 w-4 h-4 block border-1 border-gray-300
                        {{ $data[2][$c] == 'желтый' ? 'bg-yellow-400' : '' }}
                        {{ $data[2][$c] == 'синий' ? 'bg-blue-500' : '' }}
                        {{ $data[2][$c] == 'зеленый' ? 'bg-green-600' : '' }}
                        {{ $data[2][$c] == 'красный' ? 'bg-red-800' : '' }}
                        {{ $data[2][$c] === 'черный' ? 'bg-black' : '' }}
                        "></span>
                      @endif
                    </div>
                  @endfor
                </div>
              @endfor
            </div>
          </div>
        @endforeach
      @endfor
    </div>
  @else
    <p class="my-3">
      {{ $complete_key }}
    </p>
  @endif

  @php

    echo '<hr>';
    echo '<pre>';
    // print_r($complete_data);
    echo '</pre>';

  @endphp

@endsection
