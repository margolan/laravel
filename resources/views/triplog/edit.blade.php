@extends('layout.blank')

@section('title', 'Редактировать запись')

@section('content')

  @isset($data)
    <div class="container w-full flex justify-center p-3">
      <div class="w-96 shadow-lg shadow-black py-4 px-6 bg-neutral-950/50">
        <h1 class="py-8 text-3xl">Изменить запись</h1>
        <form action="{{ route('max.update', $data->id) }}" method="POST" class="flex flex-col">
          @csrf
          @method('PUT')
          <label for="order_number" class="text-sm">Заявка: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="order_number" value="{{ $data->order_number }}">
          <label for="from_address" class="text-sm">Откуда: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="from_address" value="{{ $data->from_address }}">
          <label for="to_address" class="text-sm">Куда: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="to_address" value="{{ $data->to_address }}">
          <label for="trip_purpose" class="text-sm">Причина: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="trip_purpose" value="{{ $data->trip_purpose }}">
          <label for="trip_result" class="text-sm">Результат: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="trip_result" value="{{ $data->trip_result }}">
          <label for="start_end_mileage" class="text-sm">Километраж: </label><input type="text"
            class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="start_end_mileage" title="Только цифры"
            placeholder="Только цифры" value="{{ $data->start_end_mileage }}">
          <details class="w-full">
            <summary class="cursor-pointer">Подробнее</summary>
            <div class="flex flex-col mt-3">
              <label for="daily_mileage" class="text-sm">Пробег за день: </label><input type="text"
                class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="daily_mileage" title="Только цифры"
                placeholder="Только цифры" value="{{ $data->daily_mileage }}">
              <label for="fuel_amount" class="text-sm">Заправка (Л): </label><input type="text"
                class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="fuel_amount" value="{{ $data->fuel_amount }}">
              <label for="parking_fee" class="text-sm">Парковка: </label><input type="text"
                class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="parking_fee" value="{{ $data->parking_fee }}">
              <label for="mileage_at_fueling" class="text-sm">Заправка (Км): </label><input type="text"
                class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" name="mileage_at_fueling" title="Только цифры"
                placeholder="Только цифры" value="{{ $data->mileage_at_fueling }}">
            </div>
          </details>
          <div class="flex justify-center pt-5">
            <input type="submit" value="Изменить" class="w-32 border-1">
          </div>
        </form>
        <form action="{{ route('max.destroy', $data->id) }}" method="POST" class="flex flex-col items-center pt-3 gap-3">
          @csrf
          @method('DELETE')
          <input type="submit" value="Удалить" class="w-32 border-1 bg-red-700">
          <a href="{{ route('max.index') }}" class="w-32 text-center border-1">Назад</a>
        </form>
      </div>
    </div>
  @endisset
@endsection
