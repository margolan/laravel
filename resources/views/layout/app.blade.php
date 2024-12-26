<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="bg-gray-100 bg-gradient-to-r dark:from-teal-950  dark:via-rose-950 dark:to-cyan-950 dark:text-white">

  <div class="wrap p-3">

    @yield('content')

  </div>

</body>

</html>
