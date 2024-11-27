@extends('layout.app')

@section('title', 'Главная Страница')

@section('content')

  @if (isset($complete_data))

    <h1 class="bg-gradient-to-br from-red-900 to-blue-900 rounded-lg dark:text-white p-3 my-3 text-2xl">
      {{ $complete_data['month'][0] }}</h3>
      <div class="wrap w-full inline-flex">
        <div class="names_column">
          <div class="names w-28 h-12 flex items-center dark:border-1 dark:border-white border-1 border-black px-1">
            Имя
          </div>
          @for ($a = 0; $a < count($complete_data['names']); $a++)
            <div class="w-28 h-6 flex items-center dark:border-1 dark:border-white border-1 border-black px-1">
              {{ explode(' ', $complete_data['names'][$a])[1] }}
            </div>
          @endfor
        </div>
        <div class="data_column w-min overflow-x-auto">
          <div class="dates_row">
            <div class="day_row inline-flex">
              @foreach ($complete_data['dates'][0] as $day)
                <div
                  class="dark:border-1 dark:border-white border-1 border-black w-6 h-6 flex justify-center items-center">
                  {{ $day }}
                </div>
              @endforeach
            </div>
            <div class="date_row inline-flex">
              @foreach ($complete_data['dates'][1] as $date)
                <div
                  class="dark:border-1 dark:border-white border-1 border-black w-6 h-6 flex justify-center items-center">
                  {{ $date }}
                </div>
              @endforeach
            </div>
          </div>
          @for ($a = 0; $a < count($complete_data['names']); $a++)
            <div class="data_row inline-flex">
              @for ($b = 0; $b < count($complete_data['dates'][0]); $b++)
                <div
                  class="dark:border-1 dark:border-white border-1 border-black w-6 h-6 flex justify-center items-center">
                  {{ $complete_data['data'][$a][$b] }}
                </div>
              @endfor
            </div>
          @endfor
        </div>
      </div>


      <div class="wrap w-full inline-flex px-3">

        @php

          echo '<pre>';
          // print_r($complete_data);
          echo '</pre>';

        @endphp

      </div>
  @endif

@endsection
