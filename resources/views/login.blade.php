@extends('layout.app')

@section('title', 'Авторизация')

@section('content')


  <div class="h-full flex items-center justify-center">
    @if (!Auth::check())
      <div class="w-72 h-[470px] overflow-hidden flex items-center">
        <div class="auth_form w-max h-max relative flex items-center">
          <form action="{{ route('login') }}" method="post"
            class="w-72 h-max py-10 px-9 border-l-4 border-emerald-600 justify-center rounded-lg flex flex-col dark:text-neutral-700 dark:bg-neutral-200">
            @csrf
            <div class="mb-6 flex justify-between text-xl font-semibold">
              <h3 class="cursor-pointer underline underline-offset-8 decoration-2 decoration-emerald-600">
                ВХОД</h3>
              <h3 class="register cursor-pointer">РЕГИСТРАЦИЯ</h3>
            </div>
            <label for="login" class="text-sm py-1 font-semibold">Логин</label><input type="text" name="login"
              class="px-4 py-1 rounded-md">
            <label for="password" class="mt-4 py-1 font-semibold text-sm">Пароль</label><input type="password"
              name="password" class="px-4 py-1 rounded-md">
            <div class="my-2"><input type="checkbox" name="rememberme" class=" accent-emerald-700 mr-3"><span
                class="text-sm">Запомни меня</span>
            </div>
            <input type="submit" value="Войти"
              class="mt-1 px-8 py-1 dark:bg-emerald-700 rounded-md hover:dark:bg-emerald-600 text-neutral-200">
            <a href="#" class="text-sm mt-4 text-right">Забыл пароль?</a>
          </form>
          <form action="{{ route('register') }}" method="post"
            class="w-72 h-max py-10 px-9 border-r-4 border-emerald-600 justify-center rounded-lg flex flex-col dark:text-neutral-700 dark:bg-neutral-200">
            @csrf
            <div class="mb-6 flex justify-between text-xl font-semibold">
              <h3 class="login cursor-pointer">
                ВХОД</h3>
              <h3 class="cursor-pointer underline underline-offset-8 decoration-2 decoration-emerald-600">РЕГИСТРАЦИЯ</h3>
            </div>
            <label for="login" class="text-sm py-1 font-semibold">Логин</label><input type="text" name="login"
              class="px-4 py-1 rounded-md">
            <label for="email" class="mt-4 text-sm py-1 font-semibold">Email</label><input type="email"
              name="email" class="px-4 py-1 rounded-md">
            <label for="password" class="mt-4 py-1 font-semibold text-sm">Пароль</label><input type="password"
              name="password" class="px-4 py-1 rounded-md">
            <label for="password_confirmation" class="mt-4 py-1 font-semibold text-sm">Повторите Пароль</label><input
              type="password" name="password_confirmation" class="px-4 py-1 rounded-md">
            <input type="submit" value="Регистрация"
              class="mt-8 px-8 py-1 dark:bg-emerald-700 rounded-md hover:dark:bg-emerald-600 text-neutral-200">
          </form>
        </div>
      </div>
    @endif
  </div>


@endsection
