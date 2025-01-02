@extends('layout.app')

@section('title', 'График')

@section('content')

  <div class="w-full h-screen flex items-center justify-center">

    <div class="container w-80 h-[450px] rounded-lg bg-white text-neutral-900">
      <div class="header w-80 h-full flex items-center flex-col justify-center">
        <div
          class="w-36 h-36 rounded-full border-1 before:absolute before:block before:border-2 before:rounded-full overflow-hidden before:border-neutral-900 before:w-[150px] before:h-[150px] flex justify-center items-center">
          <img src="{{ asset('/assets/person.jpg') }}" alt="person" class=" grayscale">
        </div>
        <div class="flex flex-col items-center mt-8 mb-14">
          <h1 class="font-semisolid text-xl">МАРГУЛАН</h1>
          <h1 class="font-semisolid text-xl">КУРМАНГАЛИЕВ</h1>
          <p class="border-2 border-neutral-900 px-6 text-sm mt-2 rounded-full">ВЕБ-РАЗРАБОТЧИК</p>
        </div>
        <div class="w-full h-8 text-neutral-200 flex justify-center items-center bg-neutral-900">
          <div id="section1"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            ГЛАВНАЯ</div>
          <div id="section2"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            РЕЗЮМЕ</div>
          <div id="section3"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            ОПЫТ</div>
          <div id="section4"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            КОНТАКТЫ</div>
        </div>
      </div>
      <div class="content bg-white overflow-hidden">
        <div style="height: 0px" class="section1 accordion transition-all">Consectetur adipisicing elit. Quod, omnis ut? Deleniti rem sit quod accusamus, non amet dolor! Assumenda rerum numquam adipisci sint saepe ab amet tenetur labore ipsam!</div>
        <div style="height: 0px" class="section2 accordion transition-all">Quod accusamus, non amet dolor! Assumenda rerum numquam adipisci sint saepe ab amet tenetur labore ipsam!</div>
        <div style="height: 0px" class="section3 accordion transition-all">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, omnis ut? Deleniti rem sit quod accusamus, non amet dolor! Assumenda rerum numquam adipisci sint saepe ab amet tenetur labore ipsam!</div>
      </div>
    </div>

  </div>

@endsection
