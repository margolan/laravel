@extends('layout.app')

@section('title', 'График')

@section('content')

  <div class="w-full h-screen flex items-center justify-center">

    <div class="container w-80  rounded-lg bg-white text-neutral-900">
      <div class="header w-80 h-[450px] flex items-center flex-col justify-center">
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
          <div id="one"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            ГЛАВНАЯ</div>
          <div id="two"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            РЕЗЮМЕ</div>
          <div id="three"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            ОПЫТ</div>
          <div id="four"
            class="link text-sm cursor-pointer h-full flex items-center px-2 font-semibold transition-all hover:bg-white hover:text-neutral-900">
            КОНТАКТЫ</div>
        </div>
      </div>
      <div class="content bg-white overflow-hidden rounded-b-lg text-sm">
        <div class="one accordion transition-all overflow-hidden">
          <section class="px-5 pb-10 rounded-b-lg">
            <div class="flex items-center mb-5">
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <path
                  d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z" />
                <path
                  d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z" />
                <path
                  d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z" />
                <path
                  d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z" />
              </svg>
              <span class="px-6 rounded-full bg-neutral-900 text-white flex items-center ml-4">О себе</span>
            </div>
            <p>Я <b>веб-разработчик</b>, развивающийся по обеим <b>frond-end</b> и <b>back-end</b> направлениям. Ищу
              команду
              для повышения навыков,
              предоставляя свои услуги для развития компании. Я мотивирован, нацелен на результат и слежу за последними
              достижениями в сфере современных технологий.
            </p>
          </section>
        </div>
        <div style="height: 0px;" class="two accordion transition-all overflow-hidden">
          <section class="px-5 pb-10 rounded-b-lg">
            <div class="flex items-center mb-5">
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <path
                  d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                  fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <path
                  d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                  fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              </svg>
              <span class="px-6 rounded-full bg-neutral-900 text-white flex items-center ml-4">Резюме</span>
            </div>
            <p class="mb-3"><b>Опыт работы</b></p>
            <ul class="ml-4 mb-5 list-disc list-outside">
              <li>Фрилансер: 2008 – 2013, веб-разработчик, графический дизайнер;</li>
              <li>СП АО London-Almaty: 2013 – 2014, системный администратор, оператор;</li>
              <li>ТОО Neo Service: 2014.05 – 08, сервис-инженер;</li>
              <li>АО Kaspi Bank: 2015 – по настоящее время, сервис-инженер;</li>
            </ul>
            <p class="mb-3"><b>Образование</b></p>
            <ul class="ml-4 mb-5 list-disc list-outside">
              <li>Образование высшее: 2006, Университет им.К.Жубанова. Переводчик английского;</li>
              <li>Владение языков: Казахский, Русский, Английский;</li>
            </ul>
            <p class="mb-3"><b>Ссылки</b></p>
            <ul class="ml-4 list-disc list-outside">
              <li>Резюме на <a href="https://aktobe.hh.kz/applicant/resumes/view?resume=8caa6c69ff01f0a1860039ed1f4533597a4b74"
                  target="_blank"
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold">Head
                  Hunter</a></li>
              <li>Скачать можно в виде <a
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold"
                  href="{{ asset('/assets/dcv.pdf') }}">PDF-файла</a></li>
            </ul>
          </section>
        </div>
        <div style="height: 0px" class="three accordion transition-all overflow-hidden">
          <section class="px-5 pb-10 rounded-b-lg">
            <div class="flex items-center mb-5">
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <rect x="64" y="320" width="48" height="160" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="288" y="224" width="48" height="256" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="400" y="112" width="48" height="368" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="176" y="32" width="48" height="448" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="64" y="320" width="48" height="160" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="288" y="224" width="48" height="256" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="400" y="112" width="48" height="368" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                <rect x="176" y="32" width="48" height="448" rx="8" ry="8" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              </svg>
              <span class="px-6 rounded-full bg-neutral-900 text-white flex items-center ml-4">Опыт</span>
            </div>
            <p class="mb-3"><b>Уже использую</b></p>
            <ul class="ml-4 mb-5 list-disc list-outside">
              <li><b>HTML</b>, <b>CSS</b> - уверенные знания верстки;</li>
              <li><b>JS</b> – опыт в создании аниммированного "бургер" меню, "выпадающего" меню, слайдера, поиска и
                фильтраций, и других работ;</li>
              <li><b>PostgreSQL</b> + <b>PHP</b> – использую для проекта <a href="https://margolan.kz/g" target="_blank"
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold">График
                  Работ</a>. В нем я на PHP реализовал Админ Панель, форму регистрации пользователей, отчет посещения и
                прочее без,
                фреймворков и CMS;</li>
              <li><b>Laravel</b> + <b>Tailwind CSS</b>– текущий сайт реализован на основе этих продуктов. Кроме текущей
                лэндинг-страницы имеются <a href="https://0x0.kz/s" target="_blank"
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold">График
                  работ</a> в открытом доступе и скрытые Админ панель, и Ключница для коллег;
              </li>
            </ul>
            <p class="mb-3"><b>Буду использовать</b></p>
            <ul class="ml-4 list-disc list-outside">
              <li>На момент 01.2024 изучаю и применяю на практике <b>Laravel</b> и <b>Bootstrap</b>;<br>
                <p class="italic my-1"><b>UPD:</b> на момент 01.2024 продолжаю изучать и использую <b>Laravel</b> и
                  <b>Tailwind CSS</b>;</p>
              </li>
              <li>В перспективе изучение <b>Vue</b>, <b>Bitrex</b>, и старый, но актульаный <b>jQuery</b>.</li>
              <li>PHP &lt;3 </span> </li>
            </ul>
          </section>
        </div>
        <div style="height: 0px" class="four accordion transition-all overflow-hidden">
          <section class="px-5 pb-10 rounded-b-lg">
            <div class="flex items-center mb-5">
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <path
                  d="M441.6 171.61L266.87 85.37a24.57 24.57 0 00-21.74 0L70.4 171.61A40 40 0 0048 207.39V392c0 22.09 18.14 40 40.52 40h335c22.38 0 40.52-17.91 40.52-40V207.39a40 40 0 00-22.44-35.78z"
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="32" />
                <path d="M397.33 368L268.07 267.46a24 24 0 00-29.47 0L109.33 368M309.33 295l136-103M61.33 192l139 105"
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="32" />
                <path
                  d="M441.6 171.61L266.87 85.37a24.57 24.57 0 00-21.74 0L70.4 171.61A40 40 0 0048 207.39V392c0 22.09 18.14 40 40.52 40h335c22.38 0 40.52-17.91 40.52-40V207.39a40 40 0 00-22.44-35.78z"
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="32" />
                <path d="M397.33 368L268.07 267.46a24 24 0 00-29.47 0L109.33 368M309.33 295l136-103M61.33 192l139 105"
                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="32" />
              </svg>
              <span class="px-6 rounded-full bg-neutral-900 text-white flex items-center ml-4">Контакты</span>
            </div>
            <p class="mb-3"><b>Курмангалиев Маргулан</b></p>
            <ul class="ml-4 list-disc list-outside">
              <li>Казахстан, Актобе</li>
              <li>Письма: margolan@0x0.kz</li>
              <li>Звонки: <a href="tel:+77775051522">+7 777 505 1522</a></li>
              <li><a href="https://t.me/+77775051522" target="_blank"
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold">Telegram</a>
              </li>
              <li><a href="https://wa.me/+77775051522" target="_blank"
                  class="text-emerald-900 decoration-emerald-800 decoration-1 underline-offset-4 decoration-dashed hover:bg-gradient-to-r hover:from-emerald-700 hover:to-sky-700 hover:text-white px-1 underline font-semibold">WhatsApp</a>
              </li>
            </ul>
          </section>
        </div>
      </div>
    </div>

  </div>

@endsection
