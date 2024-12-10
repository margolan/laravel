@extends('layout.app')

@section('title', 'Главная Страница')

@section('content')

  @php

    echo '<hr>';
    echo '<pre>';
    // print_r($complete_key);
    echo '</pre>';

  @endphp

  @if (isset($complete_data[1]['Город']))
    <div class="wrap_search w-full">
      <input type="search" class="search w-full sm:w-96 mt-9 dark:bg-gray-200 dark:text-black py-3 px-6 rounded-2xl">
      <span class="found w-8 inline-block relative -left-11 text-green-800 font-bold"></span>
    </div>
    <div class="wrap w-full flex-col mt-12">
      @for ($a = 1; $a < 7; $a++)
        @foreach ($complete_data[$a] as $city => $data)
          <h2 class="city text-xl px-4 pb-3 pt-2 rounded-t-lg border-1 border-b-0 w-max mt-7">{{ $city }}</h2>
          <div class="column w-full flex-wrap overflow-x-auto border-l-1">
            <div class="row inline-flex w-full">
              @for ($b = 0; $b < 2; $b++)
                {{-- <div class="flex-col min-w-max first:w-48 last:w-max"> --}}
                <div class="flex-col min-w-max">
                  @for ($c = 0; $c < count($data[$b]); $c++)
                    <div class="cell border-t-1 border-r-1 border-b-1 flex px-4 h-8 items-center w-full">
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
      {{ $complete_data }}
    </p>
  @endif



@endsection
