@extends('layout.blank')

@section('title', 'Путевой лист')

@section('content')

  <div class="container border-1">
    <form action="#">
      @csrf
      <input type="date" name="date">
      <input type="text" name="order_number">
      <input type="text" name="from_address">
      <input type="text" name="to_address">
      <input type="text" name="trip_purpose">
      <input type="text" name="trip_result">
      <input type="text" name="start_end_mileage">
      <input type="text" name="daily_mileage">
      <input type="text" name="fuel_amount">
      <input type="text" name="parking_fee">
      <input type="text" name="mileage_at_fueling">
      <input type="submit" value="Записать">
    </form>
  </div>


@endsection
