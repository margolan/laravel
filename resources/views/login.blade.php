@extends('layout.app')

@section('title', 'Авторизация')

@section('content')

  @session('status')
    <div class="p-4 bg-green-100">
      {{ $value }}
    </div>
  @endsession

  @if (isset($auth))
    @php
      echo '<pre>';
      print_r($auth);
      echo '</pre>';
    @endphp
  @else
    No Auth data
  @endif



  <div class="py-5">
    <form action="{{ route('login') }}" method="post"
      class="w-80 h-56 justify-center items-center rounded-lg border-1 flex flex-col dark:text-black">
      @csrf
      <input type="text" name="login" placeholder="Login" class="my-1 px-4 py-1 rounded-md">
      <input type="password" name="password" placeholder="Password" class="my-1 px-4 py-1 rounded-md">
      <input type="submit" value="Submit" class="my-1 px-8 py-1 dark:bg-stone-100 rounded-md hover:dark:bg-stone-300">
    </form>
  </div>
  <div class="py-5">
    @if (isset($processed_data))
      @if (empty($processed_data))
        No data
      @else
        @php
          echo '<pre>';
          print_r($processed_data);
          echo '</pre>';
        @endphp
      @endif
    @endif
  </div>

@endsection
