@extends('layout.app')

@section('title', 'Забыли пароль')

@section('content')

  <div class="h-screen flex items-center justify-center">
    <div class="w-80 shadow-2xl shadow-black py-5 px-10 bg-white text-gray-800">
      <h1 class="w-max mx-auto text-lg mb-5 font-bold">Новый пароль</h1>
      <form action="#" method="post">
        @csrf
        <div class="form-group">
          <label for="token" class="w-full ">Токен</label>
          <input type="test" name="token" class="border-1 w-full py-1 px-3 mb-3 rounded-sm border-gray-300"
            value="{{ $request ?? '' }}">
          <label for="password" class="w-full ">Новый пароль</label>
          <input type="password" name="password" class="border-1 w-full py-1 px-3 mb-3 rounded-sm border-gray-300">
          <label for="password_confirm" class="w-full">Повторите пароль</label>
          <input type="password_confirm" name="password_confirm"
            class="border-1 w-full py-1 px-3 mb-3 rounded-sm border-gray-300">
        </div>
        <button type="submit" class="w-full py-1 px-3 text-white bg-emerald-500 rounded-sm">Обновить
          пароль</button>
      </form>
    </div>
  </div>

@endsection
