@extends('layout.blank')

@section('title', 'Путевой лист')

@section('content')

  @isset($data)
    <div class="wrap w-full px-2 py-5">
      <h1 class="w-max text-3xl font-mono p-3"><a href="/max">Путевой Лист</a></h1>
      <p class="px-3 pb-3"><a href="{{ route('max.create') }}">[ Добавить ]</a></p>
      <div class="wrap2 flex">
        <div class="date_column flex flex-col pb-2">
          <table class="w-max">
            <tr class="bg-neutral-600">
              <td class="w-max px-2 py-2">Дата</td>
            </tr>
            @foreach ($data as $item)
              <tr class="odd:bg-neutral-600/50">
                <td class="w-max px-2">{{ $item->created_at->format('d.m.Y') }}</td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="data_column w-full overflow-x-auto pb-2">
          <table class="w-max">
            <tr class="bg-neutral-600">
              <td class="p-2">Заявка #</td>
              <td class="p-2">Откуда</td>
              <td class="p-2">Куда</td>
              <td class="p-2">Причина</td>
              <td class="p-2">Результат</td>
              <td class="p-2">Километраж</td>
              <td class="p-2">Пробег за день</td>
              <td class="p-2">Заправка (л)</td>
              <td class="p-2">Парковка</td>
              <td class="p-2">Пробег при заправке</td>
            </tr>
            @foreach ($data as $item)
              <tr class="odd:bg-neutral-600/50 hover:bg-neutral-400/50">
                <td class="px-2"><a href="/max/{{ $item->order_number }}/edit"
                    class="border-dashed border-b">{{ $item->order_number }}</a></td>
                <td class="px-2">{{ $item->from_address }}</td>
                <td class="px-2">{{ $item->to_address }}</td>
                <td class="px-2">{{ $item->trip_purpose }}</td>
                <td class="px-2">{{ $item->trip_result }}</td>
                <td class="px-2">{{ $item->start_end_mileage }}</td>
                <td class="px-2">{{ $item->daily_mileage }}</td>
                <td class="px-2">{{ $item->fuel_amount }}</td>
                <td class="px-2">{{ $item->parking_fee }}</td>
                <td class="px-2">{{ $item->mileage_at_fueling }}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  @endisset
@endsection
