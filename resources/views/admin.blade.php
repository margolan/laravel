@extends('layout.app')

@section('title', 'Где-то')

@section('content')

  @isset($data)
    <div class="wrap_admin flex justify-center md:justify-normal flex-wrap gap-4 mt-5 mb-10">

      {{-- Schedules --}}

      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/schedule.jpg') }}" alt="schedule" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">
          <h2 class="text-xl mb-4 font-semibold">График работы</h2>
          @foreach ($data['schedule'] as $cellIndex => $cell)
            <div class="flex mb-2 justify-between">
              <span
                class="w-full bg-gradient-to-r dark:from-lime-700 dark:to-green-700 px-3 mr-1 flex items-center">{{ $cellIndex + 1 }}.
                {{ str_replace(substr($cell->date, 2, 4), '.' . substr($cell->date, 2, 4), $cell->date) }}
                {{ $cell->city }} {{ $cell->depart }}
              </span>
              <a href="{{ route('s_delete') }}?id={{ $cell['id'] }}"
                class="bg-gradient-to-r dark:from-red-700 dark:to-rose-700 text-white text-sm px-4 flex items-center">Удалить</a>
            </div>
          @endforeach

          <div class="v_separator w-5/6 h-1 bg-gradient-to-r from-sky-800 to-teal-600 rounded-full mx-auto my-7"></div>
          <h2 class="text-xl mb-4 font-semibold">Загрузить график</h2>
          <form action="{{ route('s_import') }}" enctype="multipart/form-data" method="post"
            class="max-w-full min-w-full my-5">
            @csrf
            <div class="details flex bg-red-900 rounded-lg">
              <div class="right w-full px-6 py-5 gap-1 flex flex-col">
                <select name="city" class="w-full bg-red-900">
                  <option class="bg-gray-800">Город</option>
                  <option value="aktau" class="bg-red-900">Актау</option>
                  <option value="aktobe" class="bg-red-900">Актобе</option>
                  <option value="atyrau" class="bg-red-900">Атырау</option>
                  <option value="oral" class="bg-red-900">Уральск</option>
                </select>
                <select name="month" class="bg-red-900">
                  <option class="bg-gray-800">Месяц</option>
                  <option value="01" class="bg-red-900">Январь</option>
                  <option value="02" class="bg-red-900">Февраль</option>
                  <option value="03" class="bg-red-900">Март</option>
                  <option value="04" class="bg-red-900">Апрель</option>
                  <option value="05" class="bg-red-900">Май</option>
                  <option value="06" class="bg-red-900">Июнь</option>
                  <option value="07" class="bg-red-900">Июль</option>
                  <option value="08" class="bg-red-900">Август</option>
                  <option value="09" class="bg-red-900">Сентябрь</option>
                  <option value="10" class="bg-red-900">Октябрь</option>
                  <option value="11" class="bg-red-900">Ноябрь</option>
                  <option value="12" class="bg-red-900">Декабрь</option>
                </select>
                <select name="year" class="bg-red-900">
                  <option class="bg-gray-800">Год</option>
                  <option value="2024" class="bg-red-900">2024</option>
                  <option value="2025" class="bg-red-900">2025</option>
                  <option value="2026" class="bg-red-900">2026</option>
                </select>
                <select name="depart" class="bg-red-900">
                  <option class="bg-gray-800">Подразделение</option>
                  <option value="pos" class="bg-red-900">Постамат и ПОС</option>
                  <option value="atm" class="bg-red-900">Банкомат и ТС</option>
                </select>
                <div class="flex justify-between">
                  <span>Excel:</span>
                  <input type="checkbox" name="excel">
                </div>
              </div>
            </div>
            <div class="w-full mt-5 flex flex-col rounded-lg">
              <div class="file_picker h-12 bg-red-700 rounded-t-lg py-3 text-center">
                <span class="file_text">Выберите файл</span>
                <input type="file" name="file" hidden>
              </div>
              <input type="submit" value="Загрузить" class="bg-red-900 rounded-b-lg py-3">
            </div>
          </form>
        </div>
      </div>

      {{-- Keys --}}

      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/keys.jpg') }}" alt="keys" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">
          <h2 class="text-xl mb-4 font-semibold">Ключи</h2>
          @foreach ($data['key'] as $cellIndex => $cell)
            <div class="flex mb-2 justify-between">
              <span
                class="w-full bg-gradient-to-r dark:from-lime-700 dark:to-green-700 px-3 mr-1 flex items-center">{{ $cellIndex + 1 }}.
                {{ $cell->created_at }}
              </span>
              <a href="{{ route('k_delete') }}?id={{ $cell['id'] }}"
                class="bg-gradient-to-r dark:from-red-700 dark:to-rose-700 text-white text-sm px-4 flex items-center">Удалить</a>
            </div>
          @endforeach

          <div class="v_separator w-5/6 h-1 bg-gradient-to-r from-sky-800 to-teal-600 rounded-full mx-auto my-7"></div>
          <h2 class="text-xl mb-4 font-semibold">Загрузить ключи</h2>
          <form action="{{ route('k_import') }}" enctype="multipart/form-data" method="post"
            class="max-w-full w-full my-5">
            @csrf
            <div class="w-full mt-5 flex flex-col rounded-lg">
              <div class="file_picker h-12 bg-red-700 rounded-t-lg py-3 text-center">
                <span class="file_text">Выберите файл</span>
                <input type="file" name="file" hidden>
              </div>
              <input type="submit" value="Загрузить" class="bg-red-900 rounded-b-lg py-3">
            </div>
          </form>
        </div>
      </div>

      {{-- Tokens --}}

      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/token.jpg') }}" alt="token" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">
          <h2 class="text-xl mb-4 font-semibold">Токены</h2>

          @if ($data['token']->count() == 0)
            <p class="text-center">Токенов нет</p>
          @else
            @foreach ($data['token'] as $cellIndex => $cell)
              <div class="w-full border-1 rounded-md bg-neutral-800 mb-2">
                <p class="break-all px-3">Токен: {{ $cell->token }}</p>
                <p class="px-3">Занят: {{ $cell->used ?? '(нет)' }}</p>
                <p class="px-3">Дата: {{ $cell->created_at->format('d.m.Y H:i') }} </p>
                <p
                  class="bg-gradient-to-r dark:from-red-700 dark:to-rose-700 text-white text-sm px-3 py-[2px] text-center mt-2 rounded-b-md">
                  <a href="{{ route('token_delete') }}?id={{ $cell['id'] }}">Удалить</a>
                </p>
              </div>
            @endforeach
          @endif

          <div class="v_separator w-5/6 h-1 bg-gradient-to-r from-sky-800 to-teal-600 rounded-full mx-auto my-7"></div>

          <h2 class="text-xl mb-4 font-semibold">Создать токен</h2>
          <form action="{{ route('token_create') }}" method="POST">
            @csrf
            <input type="submit"
              class="bg-gradient-to-r dark:from-red-700 dark:to-rose-700 text-white px-4 text-center my-1 cursor-pointer"
              value="Создать">
          </form>

        </div>
      </div>

      {{-- Pin change --}}

      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/pincode.jpg') }}" alt="pincode" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">

          <h2 class="text-xl mb-4 font-semibold">Пин-код</h2>
          <form action="{{ route('admin_pincode_reset') }}" method="POST">
            @csrf
            <input type="text" name="pincode" maxlength="4" class="w-20 border-1 rounded-md px-3 mr-3">
            <input type="submit"
              class="bg-gradient-to-r dark:from-red-700 dark:to-rose-700 text-white px-4 text-center my-1 cursor-pointer"
              value="Сменить">
          </form>

        </div>
      </div>

      @if (session('processed_data'))
        <div class="min-w-80 h-max border-1 border-neutral-500 rounded-xl">
          <div class="bg-neutral-900 rounded-xl px-5 pt-5 pb-16 overflow-scroll">
            <h2 class="text-xl mb-4 font-semibold">Полученные данные</h2>
            @php
              echo '<pre>';
              print_r(session('processed_data'));
              echo '</pre>';
            @endphp
          </div>
        </div>
      @endif

      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

    </div>

    <script>
      const file = document.querySelectorAll('.file_picker');

      file.forEach((file_el) => {
        file_el.addEventListener('click', () => {
          file_el.querySelector('input[type="file"]').click();
        });
        file_el.querySelector('input[type="file"]').addEventListener('change', (e) => {
          file_el.querySelector('.file_text').textContent = e.target.files[0].name;
        });
      });
    </script>

  @endisset

@endsection
