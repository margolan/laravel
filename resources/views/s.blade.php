@extends('layout.app')

@section('title', 'Главная Страница')

@section('content')

  @if (isset($complete_data['names']))
    <h1 class="p-3 my-3 text-2xl">
      {{ $complete_data['month'][0] }}</h1>
    <div class="wrap w-full inline-flex overflow-x-auto"> <!-- names -->
      <div class="names_column bg-gray-700 rounded-l-lg">
        <div class="names_header w-32 h-16 flex items-center pl-5 rounded-tl-lg bg-gray-300 text-gray-900 font-semibold">
          Имя
        </div>
        @for ($a = 0; $a < count($complete_data['names']); $a++)
          <div class="names w-32 h-8 flex items-center pl-5 ">
            {{ explode(' ', $complete_data['names'][$a])[1] }}
          </div>
        @endfor
      </div> <!-- names -->
      <div class="data_column w-min overflow-x-auto bg-gray-700 rounded-r-lg font-semibold">
        <div class="dates_row">
          <div class="day_row inline-flex bg-gray-300 text-gray-900">
            @foreach ($complete_data['dates'][0] as $day)
              <div class="w-8 h-8 flex justify-center items-center ">
                {{ $day }}
              </div>
            @endforeach
          </div>
          <div class="date_row inline-flex bg-gray-300 text-gray-900">
            @foreach ($complete_data['dates'][1] as $date)
              <div class="w-8 h-8 flex justify-center items-center ">
                {{ $date }}
              </div>
            @endforeach
          </div>
        </div>
        @for ($a = 0; $a < count($complete_data['names']); $a++)
          <div class="data_row inline-flex">
            @for ($b = 0; $b < count($complete_data['dates'][0]); $b++)
              <div class="w-8 h-8 flex justify-center items-center ">
                {{ $complete_data['data'][$a][$b] }}
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

  @if (isset($key))
    <p class="my-3">
      @php

        echo '<pre>';
        print_r($key);
        echo '</pre>';

      @endphp
    </p>
  @endif

  @php

    echo '<hr>';
    echo '<pre>';
    print_r($complete_data);
    echo '</pre>';

  @endphp

@endsection
