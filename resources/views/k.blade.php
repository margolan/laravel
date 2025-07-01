@extends('layout.app')

@section('title', 'Ключи')

@section('content')

{{-- Test! --}}

@if(isset($test))

@dump($test)

@endif
    
{{-- Test! --}}

  @if ($available_links->isEmpty())
    <p>Нет вариантов ключей</p>
  @else
    <div class="links w-max my-4 flex flex-wrap border-1 border-stone-400 rounded-lg">
      <div class="links__header w-min bg-stone-900 rounded-l-lg px-4 py-1">Дата:</div>
      @foreach ($available_links as $link)
        <a href="?id={{ $link->id }}"
          class="px-3 py-1 hover:text-blue-300">{{ str_replace($link->created_at, substr($link->created_at, 5, 2) . '/' . substr($link->created_at, 8, 2), $link->created_at) }}</a>
      @endforeach
    </div>
  @endif


  @if (empty($processed_data))
    <p>Нет загруженных ключей</p>
  @else
    <div class="wrap_search w-full flex items-center">
      <div class="found w-12 translate-x-1 border-r-1 text-center text-black absolute">0</div>
      <input type="search"
        class="search w-full max-w-[500px] pl-16 dark:bg-gray-200 dark:text-black py-2 px-5 rounded-lg">
    </div>
    <div
      class="scroll_up w-14 h-14 border-1 bg-white fixed bottom-5 right-5 shadow-2xl invisible flex justify-center cursor-pointer">
      <div class="arrow w-6 h-6 border-t-8 border-l-8 border-t-emerald-800 border-l-sky-700 rotate-45 mt-5">
      </div>
    </div>

    <div class="wrap w-full flex-col mt-5">
      @foreach ($processed_data as $city => $block)
        <h2 class="city text-xl px-4 pb-3 pt-2 rounded-t-lg border-1 border-b-0 w-max mt-7">{{ $city }}</h2>
        <div class="w-full border-1 overflow-x-auto no-scrollbar">
          @foreach ($block as $row)
            <div
              class="w-max flex last:border-0 [border-image:linear-gradient(to_right,#ffffffff,#ffffff00)_1] border-b-1 border-solid border-transparent">

              @if (!isset($row[2]))
                @php
                  $row[2] = 'notFound';
                @endphp
              @endif

              @if (!$loop->first)
                <div class="w-5 h-5 flex pl-2 justify-center items-center">
                  <div
                    class="w-3 h-3 border-1 
              {{ $row[2] == 'желтый' ? 'bg-yellow-400' : '' }}
              {{ $row[2] == 'синий' ? 'bg-blue-500' : '' }}
              {{ $row[2] == 'зеленый' ? 'bg-green-600' : '' }}
              {{ $row[2] == 'красный' ? 'bg-red-800' : '' }}
              {{ $row[2] === 'черный' ? 'bg-black' : '' }}
              {{ $row[2] === 'notFound' ? 'bg-white' : '' }}
              ">
                  </div>
                </div>
              @endif

              <div class="@if ($loop->index == 0) header font-semibold py-2  @else cell @endif px-2 w-full">

                @foreach ($row as $item)
                  @if ($loop->index == 2)
                    @continue
                  @endif
                  <span class="first:pr-1 last:pl-1">{{ $item }}</span>
                @endforeach

              </div>

            </div>
          @endforeach
        </div>
      @endforeach

    </div>

  @endif

@endsection
