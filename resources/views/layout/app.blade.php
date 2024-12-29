<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="bg-gray-100 bg-gradient-to-r dark:from-cyan-950 dark:to-emerald-950 dark:text-white">

  <div class="wrap h-screen px-3">

    @if (Auth::check())
      @include('layout.head')
    @endif
    @yield('content')

  </div>

</body>

</html>
