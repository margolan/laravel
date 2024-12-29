@extends('layout.app')

@section('title', 'Регистрация')

@section('content')


  <div class=" h-5/6 flex flex-col items-center justify-center">
    <form action="{{ route('login') }}" method="post"
      class="w-72 py-8 shadow-xl mx-auto justify-center items-center rounded-lg border-1 flex flex-col dark:text-black">
      @csrf
      <h3 class="mb-5 text-2xl text-white font-semibold">Вход</h3>
      <input type="text" name="login" placeholder="Логин" class="my-2 px-4 py-1 rounded-md">
      <input type="text" name="email" placeholder="Email" class="my-2 px-4 py-1 rounded-md">
      <input type="password" name="password" placeholder="Пароль" class="my-2 px-4 py-1 rounded-md">
      <input type="password" name="password_confirm" placeholder="Пароль" class="my-2 px-4 py-1 rounded-md">
      <input type="submit" value="Регистрация"
        class="my-2 px-8 py-1 dark:bg-stone-100 rounded-md hover:dark:bg-stone-300">
    </form>


    @if (isset($processed_data))
      <div class="pt-5">
        @if (empty($processed_data))
          No data
        @else
          @php
            echo '<pre>';
            print_r($processed_data);
            echo '</pre>';
          @endphp
      </div>
    @endif
  </div>
  @endif

@endsection
