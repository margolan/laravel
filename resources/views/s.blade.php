@extends('layout.app')

@section('title', 'График работы')

@section('content')

  @include('layout.schedule_header')

  @php

    // echo '<pre>';
    // print_r($processed_data);
    // echo '</pre>';
  @endphp

  @if (isset($available_links))
    @if ($available_links->isEmpty())
      <p>Нет графиков работ для отображения</p>
    @else
      <div class="links my-4 flex flex-wrap">
        @foreach ($available_links as $city => $dates)
          <div class="links__group my-1 border-1 border-stone-400 rounded-lg flex">
            <div class="links__group__city w-min bg-stone-900 rounded-l-lg px-3 py-1">{{ ucfirst($city) }}:</div>
            <div class="links__group__date rounded-r-lg px-3 py-1">
              @foreach ($dates->pluck('date') as $date)
                <a href="?city={{ $city }}&date={{ $date }}"
                  class="hover:text-blue-300">{{ str_replace(substr($date, 2, 2), '/', $date) }}</a>
              @endforeach
            </div>
          </div>
          <div class="spacer w-5"></div>
        @endforeach
      </div>
    @endif
  @endif



  @if (empty($processed_data))
    <p>Не найден график работ для текущего месяца</p>
  @else
    @foreach ($processed_data as $depart)
      <div class="wrap mt-5 mb-10">
        <div class="w-max my-3 dark:text-stone-800 font-semibold">
          <span class="bg-stone-200 px-6 mx-1 rounded-md inline-flex -skew-x-12"><span
              class="skew-x-12">{{ strtoupper($depart['depart']) }}</span></span>
          <span class="bg-stone-200 px-6 mx-1 rounded-md inline-flex -skew-x-12"><span
              class="skew-x-12">{{ ucfirst($depart['city']) }}</span></span>
          <span class="bg-stone-200 px-6 mx-1 rounded-md inline-flex -skew-x-12"><span
              class="skew-x-12">{{ str_replace(substr($depart['date'], 2, 2), '/', $depart['date']) }}</span></span>
          @if (Auth::check())
            <span class="w-6 h-6 border-1 inline-flex justify-center items-center text-white rounded-full text-sm font-semibold"><a
                href="{{ route('s_delete') }}?id={{ $depart['id'] }}" class="w-5 h-5 flex justify-center items-center bg-red-600 rounded-full" title="Удалить запись">X</a></span>
          @endif
        </div>
        <div class="w-full inline-flex">
          <div class="names_column"> <!-- names -->
            <div
              class="names_header w-32 h-16 flex items-center pl-5 rounded-tl-lg dark:text-gray-700 font-semibold dark:bg-gray-200">
              Имя
            </div>
            @for ($a = 0; $a < count($depart['names']); $a++)
              <div
                class="names w-32 h-8 flex items-center pl-5 dark:text-gray-700 last:rounded-bl-lg odd:dark:bg-gray-200 even:dark:bg-white">
                {{ explode(' ', $depart['names'][$a])[1] }}
              </div>
            @endfor
          </div> <!-- names -->
          <div class="data_column w-min overflow-x-auto rounded-r-lg font-semibold">
            <div class="dates_row">
              <div class="day_row inline-flex dark:bg-gray-200 dark:text-gray-700">
                @foreach ($depart['dates']['day'] as $index => $day)
                  <div
                    class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-red-500 shadow-lg border-r-1 border-l-1 border-red-400 today' : 'w-8 border-l-1 border-white' }}">
                    {{ $day }} <!-- days -->
                  </div>
                @endforeach
              </div>
              <div class="date_row inline-flex dark:bg-gray-200 dark:text-gray-700">
                @foreach ($depart['dates']['date'] as $index => $date)
                  <div
                    class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-red-500 shadow-lg border-r-1 border-l-1 border-red-400 today' : 'w-8 border-l-1 border-white' }}">
                    {{ $date }} <!-- dates -->
                  </div>
                @endforeach
              </div>
            </div>
            @foreach ($depart['data'] as $data_rows)
              <div class="data_row inline-flex dark:text-gray-700 odd:dark:bg-gray-200 even:dark:bg-white">
                @foreach ($data_rows as $index => $cell)
                  <div
                    class="h-8 flex justify-center items-center cell {{ $index == ltrim(date('d'), '0') - 1 ? 'w-9 text-red-500 bg-gray-200 shadow-red-500 shadow-lg border-r-1 border-l-1 border-red-400 today' : 'w-8 border-l-1 border-white' }}">
                    {{ $cell }}
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>
        <div class="devider w-1/2 md:w-1/4 rounded-sm mx-auto h-1 backdrop-brightness-200 mt-8"></div>
      </div>
    @endforeach
  @endif

@endsection
