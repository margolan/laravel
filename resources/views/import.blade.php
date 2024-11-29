@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

  <form action="{{ route('import') }}" enctype="multipart/form-data" method="post" class="px-3 py-5">
    <input type="file" name="file">
    <input type="submit" value="Submit" class="bg-gray-500 px-5 rounded-md">
    @csrf
  </form>

  @php

  @endphp

  @if (session('error'))
    <p class="p-3">{{ session('error') }}</p>
  @endif

  @if (isset($complete_data))
    @if (isset($complete_data['names']) == 1)

      <p class="bg-gradient-to-br from-red-900 to-blue-900 rounded-lg text-white p-4 m-3">Таблица загружена за
        {{ $complete_data['month'][0] }}. <a href="#">Подтвердить</a></p>
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
    @elseif(isset($complete_data['names']) == 0)
      @php
        echo '<pre>';
        print_r($complete_data);
        echo '</pre>';
      @endphp

    @endif
  @endif

  @if (isset($lol))
    @php
      echo '<pre>';
      print_r($lol);
      echo '</pre>';
    @endphp
  @endif



@endsection
