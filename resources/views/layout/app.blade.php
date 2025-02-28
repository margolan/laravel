<!DOCTYPE html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <title>@yield('title')</title>
</head>

<body class="main_bg dark:text-white">

  @if (session('status'))
    <div
      class="status w-max p-1 absolute right-2 top-2 border-1 rounded-full flex justify-center text-sm font-semibold">
      <div class="w-max pl-5 p-1 bg-emerald-900 text-white rounded-full flex justify-center items-center">
        {{ session('status') }}
        <div
          class="cross w-5 h-5 ml-2 cursor-pointer rounded-full bg-white text-white flex justify-center items-center">
          <svg class="w-2 h-2 fill-emerald-800" fill="#000000" version="1.1" id="Layer_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
            xml:space="preserve">
            <polygon
              points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512 
             512,452.922 315.076,256 		" />
          </svg>
        </div>
      </div>
    </div>
  @endif

  <div class="wrap min-h-screen px-3">

    @if (Auth::check())
      @include('layout.header')
    @endif

    @yield('content')

  </div>

  @if (Route::currentRouteName() != 'index')
    @include('layout.footer')
  @endif

</body>

</html>
