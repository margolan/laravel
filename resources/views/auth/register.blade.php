@extends('layout.app')

@section('title', 'Авторизация')

@section('content')


  <div class="min-h-screen flex items-center justify-center">
    @if (!Auth::check())
      <div class="w-72 h-full overflow-hidden flex items-center">
        <div class="auth_form w-max h-max relative flex items-center">
          <form action="{{ route('register') }}" method="post"
            class="w-72 h-max py-10 px-9 border-r-4 border-emerald-600 justify-center rounded-lg flex flex-col dark:text-neutral-700 dark:bg-neutral-200">
            @csrf
            <div class="mb-6 flex justify-between text-xl font-semibold">
              <h1 class="underline underline-offset-8 decoration-2 decoration-emerald-600">РЕГИСТРАЦИЯ</h1>
            </div>
            <label for="login" class="text-sm py-1 font-semibold">Логин</label><input type="text" name="login"
              class="px-4 py-1 rounded-md {{ $errors->has('login') ? 'border-red-600 border-1' : ''}}">
            <label for="email" class="mt-4 text-sm py-1 font-semibol">Email</label><input type="email"
              name="email" class="px-4 py-1 rounded-mdd {{ $errors->has('email') ? 'border-red-600 border-1' : ''}}">
            <label for="token" class="mt-4 text-sm py-1 font-semibold">Token</label><input type="text"
              name="token" class="px-4 py-1 rounded-md {{ $errors->has('token') ? 'border-red-600 border-1' : ''}}">
            <label for="password" class="mt-4 py-1 font-semibold text-sm">Пароль</label><input type="password"
              name="password" class="px-4 py-1 rounded-md {{ $errors->has('password') ? 'border-red-600 border-1' : ''}}">
            <label for="password_confirmation" class="mt-4 py-1 font-semibold text-sm">Повторите Пароль</label><input
              type="password" name="password_confirmation" class="px-4 py-1 rounded-md {{ $errors->has('password') ? 'border-red-600 border-1' : ''}}">
            <input type="submit" value="Регистрация"
              class="mt-8 px-8 py-1 dark:bg-emerald-700 rounded-md hover:dark:bg-emerald-600 text-neutral-200">
            @if ($errors->any())
              <div class="mt-5 text-sm rounded-lg py-3">
                <ul class="list-disc">
                  @foreach ($errors->all() as $error)
                    <li class="text-rose-600">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </form>
        </div>
      </div>
    @endif
  </div>

@endsection
