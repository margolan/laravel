@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

  <form action="{{ route('import') }}" enctype="multipart/form-data" method="post" class="w-96 my-5">
    @csrf
    <div class="details flex bg-red-900 rounded-lg">
      <div class="left w-28 border-r-1 justify-center pr-3 items-end flex flex-col bg-red-800 rounded-l-lg">
        <div class="w-max mt-5">Город:</div>
        <div class="w-max my-3">Дата:</div>
        <div class="w-max mb-5">Отдел:</div>
      </div>
      <div class="right w-full pl-3 pr-5 flex flex-col">
        <select name="city" class="w-max mt-5 bg-red-900">
          <option class="bg-gray-800">Выбрать</option>
          <option value="aktau" class="bg-red-900">Актау</option>
          <option value="aktobe" class="bg-red-900">Актобе</option>
          <option value="atyrau" class="bg-red-900">Атырау</option>
          <option value="oral" class="bg-red-900">Уральск</option>
        </select>
        <div class="date w-max my-3">
          <select name="month" class="bg-red-900">
            <option class="bg-gray-800">Выбрать</option>
            <option value="01" class="bg-red-900">Январь</option>
            <option value="02" class="bg-red-900">Февраль</option>
            <option value="03" class="bg-red-900">Март</option>
            <option value="04" class="bg-red-900">Апрель</option>
            <option value="05" class="bg-red-900">Май</option>
            <option value="06" class="bg-red-900">Июнь</option>
            <option value="07" class="bg-red-900">Июль</option>
            <option value="08" class="bg-red-900">Август</option>
            <option value="09" class="bg-red-900">Сентябрь</option>
            <option value="10" class="bg-red-900">Октябрь</option>
            <option value="11" class="bg-red-900">Ноябрь</option>
            <option value="12" class="bg-red-900">Декабрь</option>
          </select>
          <select name="year" class="bg-red-900">
            <option class="bg-gray-800">Выбрать</option>
            <option value="24" class="bg-red-900">2024</option>
            <option value="25" class="bg-red-900">2025</option>
            <option value="26" class="bg-red-900">2026</option>
          </select>
        </div>
        <select name="depart" class="bg-red-900">
          <option class="bg-gray-800">Select Depart</option>
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
        <button type="submit"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
          </svg></button>
      </div>
    </div>
  </form>

  @php

  @endphp

  @if (session('error'))
    <p class="p-3">{{ session('error') }}</p>
  @endif

  @if (isset($complete_data))
    @php
      echo '<pre>';
      print_r($complete_data);
      echo '</pre>';
    @endphp
  @endif






@endsection
