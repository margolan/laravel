@extends('layout.app')

@section('title', 'Забыли пароль')

@section('content')

  <div class="h-screen flex items-center justify-center">
    <div class="w-80 shadow-2xl shadow-black py-5 px-10 bg-white text-gray-800">
      <h1 class="w-max mx-auto text-lg mb-5 font-bold">Сброс пароля</h1>
      <form action="{{ route('password.request') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="email" class="w-full font-semibold">Email адрес</label>
          <input type="email" name="email" id="email"
            class="border-1 w-full py-1 px-3 my-3 rounded-sm border-gray-300">
        </div>
        <button type="submit" class="w-full py-1 px-3 text-white font-semibold bg-emerald-500 rounded-sm">Сбросить
          пароль</button>
      </form>
    </div>
  </div>

@endsection
