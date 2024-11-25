<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="bg-gray-100 dark:bg-gray-800 dark:text-white text-sm">

  @include('layout.head')

  @yield('content')



</body>

</html>