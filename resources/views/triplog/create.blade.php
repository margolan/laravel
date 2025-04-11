@extends('layout.blank')

@section('title', 'Новая запись')

@section('content')

  <div class="container w-full flex justify-center p-3">
    <div class="w-96 shadow-lg shadow-black py-4 px-6 bg-neutral-950/50">
      <h1 class="py-8 text-3xl">Новая запись</h1>
      <form action="{{ route('max.store') }}" method="POST" class="flex flex-col">
        @csrf
        <label for="date">Дата</label><input type="date" name="date" class="border-1 mb-3">
        <label for="order_number">Номер Заявки</label><input type="text" name="order_number" class="border-1 mb-3">
        <label for="from_address">Откуда</label>
        <textarea name="from_address" rows="2" class="border-1 mb-3"></textarea>
        <label for="to_address">Куда</label>
        <textarea name="to_address" rows="2" class="border-1 mb-3"></textarea>
        <label for="trip_purpose">Цель</label><input type="text" name="trip_purpose" class="border-1 mb-3">
        <label for="trip_result">Результат</label><input type="text" name="trip_result" class="border-1 mb-3">
        <label for="start_end_mileage">Километраж</label><input type="text" name="start_end_mileage"
          class="border-1 mb-3">
        <label for="daily_mileage">Пробег за день</label><input type="text" name="daily_mileage" class="border-1 mb-3">
        <label for="fuel_amount">Заправка (Л)</label><input type="text" name="fuel_amount" class="border-1 mb-3">
        <label for="parking_fee">Платные парковки</label><input type="text" name="parking_fee" class="border-1 mb-3">
        <label for="mileage_at_fueling">Пробег на момент заправки</label><input type="text" name="mileage_at_fueling"
          class="border-1 mb-3">
        <div class="flex flex-col items-center pt-5 gap-3">
          <input type="submit" value="Добавить" class="w-32 border-1">
          <a href="{{ route('max.index') }}" class="w-32 text-center border-1">Назад</a>
        </div>
      </form>
    </div>
  </div>

@endsection
