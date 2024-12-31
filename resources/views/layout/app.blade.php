<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="bg-gray-100 bg-gradient-to-r dark:from-cyan-950 dark:to-emerald-950 dark:text-white">

  @if (session('status'))
    <div class="status w-max p-1 absolute right-2 top-2 border-1 rounded-full flex justify-center text-sm font-semibold">
      <div class="w-max pl-5 p-1 bg-stone-300 text-emerald-800 rounded-full flex">{{ session('status') }}
        <div class="cross w-6 ml-2 cursor-pointer rounded-full bg-red-600 text-white flex justify-center">X</div>
      </div>
    </div>
  @endif

  <div class="wrap h-screen px-3">

    @if (Auth::check())
      @include('layout.head')
    @endif
    @yield('content')

  </div>

</body>

</html>
