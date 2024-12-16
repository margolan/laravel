@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

  <form action="{{ route('s_import') }}" enctype="multipart/form-data" method="post" class="max-w-full w-96 my-5">
    @csrf
    <div class="details flex bg-red-900 rounded-lg">
      <div class="left w-28 border-r-1 justify-center py-3 pr-3 items-end flex flex-col bg-red-800 rounded-l-lg">
        <div class="w-max">Город:</div>
        <div class="w-max my-3">Дата:</div>
        <div class="w-max">Отдел:</div>
      </div>
      <div class="right w-full pl-3 pr-5 flex flex-col justify-center">
        <select name="city" class="w-max bg-red-900">
          <option class="bg-gray-800">Выбрать</option>
          <option value="aktau" class="bg-red-900">Актау</option>
          <option value="aktobe" class="bg-red-900">Актобе</option>
          <option value="atyrau" class="bg-red-900">Атырау</option>
          <option value="oral" class="bg-red-900">Уральск</option>
        </select>
        <div class="date w-max my-3">
          <select name="month" class="bg-red-900">
            <option class="bg-gray-800">Выбрать</option>
            <option value="1" class="bg-red-900">Январь</option>
            <option value="2" class="bg-red-900">Февраль</option>
            <option value="3" class="bg-red-900">Март</option>
            <option value="4" class="bg-red-900">Апрель</option>
            <option value="5" class="bg-red-900">Май</option>
            <option value="6" class="bg-red-900">Июнь</option>
            <option value="7" class="bg-red-900">Июль</option>
            <option value="8" class="bg-red-900">Август</option>
            <option value="9" class="bg-red-900">Сентябрь</option>
            <option value="10" class="bg-red-900">Октябрь</option>
            <option value="11" class="bg-red-900">Ноябрь</option>
            <option value="12" class="bg-red-900">Декабрь</option>
          </select>
          <select name="year" class="bg-red-900">
            <option class="bg-gray-800">Выбрать</option>
            <option value="2024" class="bg-red-900">2024</option>
            <option value="2025" class="bg-red-900">2025</option>
            <option value="2026" class="bg-red-900">2026</option>
          </select>
        </div>
        <select name="depart" class="bg-red-900">
          <option class="bg-gray-800">Выбрать</option>
          <option value="pos" class="bg-red-900">Постамат и ПОС</option>
          <option value="atm" class="bg-red-900">Банкомат и ТС</option>
        </select>
      </div>
    </div>
    <div class="file w-full mt-5 flex">
      <div class="left w-28 border-r-1 bg-red-800 rounded-l-lg flex justify-end items-center pr-3">Файл:</div>
      <div class="right w-full h-14 bg-red-900 flex justify-around items-center pr-3 rounded-r-lg">
        <label for="file-upload" class="custom-label">Выберите файл</label>
        <input type="file" id="file-upload" name="file" hidden>
        <button type="submit">
          <div
            class="arrow w-4 h-4 rotate-45 border-white border-t-4 border-r-4 border-b-transparent border-l-transparent ">
          </div>
        </button>
      </div>
    </div>
  </form>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach
  @endif

  @php

  @endphp

  @if (session('error'))
    <p class="p-3">{{ session('error') }}</p>
  @endif
  @if (isset($processed_data))
    @php
      echo '<pre>';
      print_r($processed_data);
      echo '</pre>';
    @endphp
  @endif






@endsection
