@extends('layout.blank')

@section('title', 'Путевой лист')

@section('content')


  @isset($data)
    <div class="wrap w-full p-3">

      <div class="wrap2 w-full flex flex-col gap-3 ">

        @foreach ($data as $item)
          <div class="shadow-lg shadow-black p-3 bg-neutral-950/75">
            <div class="text-lg font-bold py-2">Заявка: {{ $item->order_number }}</div>
            <div class=""><span class="text-xs">Дата:</span> {{ $item->date }}</div>
            <div class=""><span class="text-xs">Откуда:</span> {{ $item->from_address }}</div>
            <div class=""><span class="text-xs">Куда:</span> {{ $item->to_address }}</div>
            <div class=""><span class="text-xs">Причина:</span> {{ $item->trip_purpose }}</div>
            <div class=""><span class="text-xs">Результат:</span> {{ $item->trip_result }}</div>
            <div class=""><span class="text-xs">Километраж:</span>
              {{ $item->start_end_mileage }}
            </div>
            <div class=""><span class="text-xs">Пробег за день:</span>
              {{ $item->daily_mileage }}
            </div>
            <div class=""><span class="text-xs">Заправка (Л):</span> {{ $item->fuel_amount }}
            </div>
            <div class=""><span class="text-xs">Парковка:</span> {{ $item->parking_fee }}
            </div>
            <div class=""><span class="text-xs">Пробег на момент заправки:</span>
              {{ $item->mileage_at_fueling }}</div>
          </div>
        @endforeach

      </div>

    </div>

    @php
      echo '<pre>';
      // print_r($data);
      echo '</pre>';
    @endphp
  @endisset



@endsection
