@extends('layout.blank')

@section('title', 'Новая запись')

@section('content')

  <div class="container w-full flex justify-center p-3">
    <div class="w-96 shadow-lg shadow-black py-4 px-6 bg-neutral-950/50">
      <h1 class="py-8 text-3xl">Новая запись</h1>
      <form action="{{ route('max.store') }}" method="POST" class="flex flex-col">
        @csrf

        <label for="order_number" class="text-sm">Номер Заявки</label><input type="text" name="order_number"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
        <label for="from_address" class="text-sm">Откуда</label><input type="text" name="from_address"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" value="{{ $data['from_address'] ?? '' }}">
        <label for="to_address" class="text-sm">Куда</label><input type="text" name="to_address"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
        <label for="trip_purpose" class="text-sm">Цель</label><input type="text" name="trip_purpose"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
        <label for="trip_result" class="text-sm">Результат</label><input type="text" name="trip_result"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
        <label for="start_end_mileage" class="text-sm">Километраж</label><input type="text" name="start_end_mileage"
          class="px-3 py-2 rounded-lg border-1 mt-1 mb-3" class="text-sm">
        <details class="w-full">
          <summary class="cursor-pointer">Подробнее</summary>
          <div class="flex flex-col mt-3">
            <label for="daily_mileage" class="text-sm">Пробег за день</label><input type="text" name="daily_mileage"
              class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
            <label for="fuel_amount" class="text-sm">Заправка (Л)</label><input type="text" name="fuel_amount"
              class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
            <label for="parking_fee" class="text-sm">Платные парковки</label><input type="text" name="parking_fee"
              class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
            <label for="mileage_at_fueling" class="text-sm">Пробег на момент заправки</label><input type="text"
              name="mileage_at_fueling" class="px-3 py-2 rounded-lg border-1 mt-1 mb-3">
          </div>
        </details>
        <div class="flex flex-col items-center pt-5 gap-3">
          <input type="submit" value="Добавить" class="w-32 border-1">
          <a href="{{ route('max.index') }}" class="w-32 text-center border-1">Назад</a>
        </div>
      </form>
    </div>
  </div>

@endsection
