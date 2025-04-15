<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="main_bg dark:text-white">

  @if (session('status'))
    <div
      class="status max-w-64 fixed bottom-3 right-3 bg-black transition-all px-5 rounded-md py-1 text-sm text-right hover:bg-neutral-800 cursor-pointer">
      <p>{{ session('status') }}</p>
    </div>
  @endif

  @yield('content')

</body>

</html>
