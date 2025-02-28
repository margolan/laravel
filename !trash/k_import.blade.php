@extends('layout.app')

@section('title', 'Загрузка Excel')

@section('content')


  <form action="{{ route('k_import') }}" enctype="multipart/form-data" method="post" class="max-w-full w-96 my-5">
    @csrf
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

  @if (isset($processed_data))
    @php
      echo '<pre>';
      print_r($processed_data);
      echo '</pre>';
    @endphp
  @endif






@endsection
