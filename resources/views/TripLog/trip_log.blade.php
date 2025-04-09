@extends('layout.blank')

@section('title', 'Путевой лист')

@section('content')


    @isset($data)
      <div class="wrap w-full">

        <div class="wrap2 w-full flex">

          <div class="date border-1">
            <div class="border-1">Date</div>
            @foreach ($data as $item)
              <div class="border-1">{{ $item->date }}</div>
            @endforeach
          </div>

          <div class="content overflow-x-scroll">
            <div class="flex">
              <div class="min-w-20 border-1">Номер заявки</div>
              <div class="min-w-max p-3 border-1">Откуда</div>
              <div class="min-w-max p-3 border-1">Куда</div>
              <div class="min-w-max p-3 border-1">Цель</div>
              <div class="min-w-max p-3 border-1">Результат</div>
              <div class="min-w-max p-3 border-1">Километраж</div>
              <div class="min-w-max p-3 border-1">Пробег за день</div>
              <div class="min-w-max p-3 border-1">Заправка (Л)</div>
              <div class="min-w-max p-3 border-1">Платные парковки</div>
              <div class="min-w-max p-3 border-1">Пробег на момент заправки</div>
            </div>
            @foreach ($data as $item)
              <div class="flex">
                <div class="min-w-20 border-1">{{ $item->order_number }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->from_address }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->to_address }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->trip_purpose }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->trip_result }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->start_end_mileage }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->daily_mileage }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->fuel_amount }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->parking_fee }}</div>
                <div class="in-w-max p-3 border-1">{{ $item->mileage_at_fueling }}</div>
              </div>
            @endforeach
          </div>

        </div>

      </div>

      @php
        echo '<pre>';
        // print_r($data);
        echo '</pre>';
      @endphp
    @endisset



@endsection
