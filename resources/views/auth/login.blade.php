@extends('layout.app')

@section('title', 'Авторизация')

@section('content')


  <div class="flex justify-center">
    @if (!Auth::check())
      <div class="w-72 h-full overflow-hidden flex items-center">
        <div class="auth_form w-max h-max relative flex items-center">
          <form action="{{ route('login') }}" method="post"
            class="w-72 h-max py-10 px-9 border-l-4 border-emerald-600 justify-center rounded-lg flex flex-col dark:text-neutral-700 dark:bg-neutral-200">
            @csrf
            <div class="mb-6 flex justify-between text-xl font-semibold">
              <h1 class="underline underline-offset-8 decoration-2 decoration-emerald-600">
                ВХОД</h1>
            </div>
            <label for="name" class="text-sm py-1 font-semibold">Логин</label><input type="text" name="name"
              class="px-4 py-1 rounded-md bg-white">
            <label for="password" class="mt-4 py-1 font-semibold text-sm">Пароль</label><input type="password"
              name="password" class="px-4 py-1 bg-white rounded-md">
            <div class="my-2"><input type="checkbox" name="rememberme" class=" accent-emerald-700 mr-3"><span
                class="text-sm">Запомни меня</span>
            </div>
            <input type="submit" value="Войти"
              class="mt-1 px-8 py-1 dark:bg-emerald-700 rounded-md hover:dark:bg-emerald-600 text-neutral-200">
            <a href="#" class="text-sm mt-4 text-right">Забыл пароль?</a>
          </form>
        </div>
      </div>
    @endif
  </div>

  @if ($errors->any())
    @php
      echo '<pre>';
      print_r($errors);
      echo '</pre>';
    @endphp
  @endif

@endsection
