@extends('layout.app')

@section('title', 'Где-то')

@section('content')

  @isset($data)
    <div class="wrap_admin flex justify-center md:justify-normal flex-wrap gap-4 mt-5 mb-10">
      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/schedule.webp') }}" alt="schedule" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">
          <h2 class="text-xl mb-4 font-semibold">График работы</h2>
          @foreach ($data['schedule'] as $cellIndex => $cell)
            <div class="flex py-1 justify-between">
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
              <div class="left w-24 border-r-1 justify-center py-3 pr-3 items-end flex flex-col bg-red-800 rounded-l-lg">
                <div class="w-max">Город:</div>
                <div class="w-max my-3">Дата:</div>
                <div class="w-max">Отдел:</div>
              </div>
              <div class="right w-full pl-3 pr-5 flex flex-col justify-center">
                <select name="city" class="w-max bg-red-900">
                  <option class="bg-gray-800">Выбрать</option>
                  <option value="aktau" class="bg-red-900">Актау</option>
                  <option value="aktobe" class="bg-red-900">Актобе</option>
                  <option value="atyrau" class="bg-red-900">Атырау</option>
                  <option value="oral" class="bg-red-900">Уральск</option>
                </select>
                <div class="date w-max my-3">
                  <select name="month" class="bg-red-900">
                    <option class="bg-gray-800">Выбрать</option>
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
                    <option class="bg-gray-800">Выбрать</option>
                    <option value="2024" class="bg-red-900">2024</option>
                    <option value="2025" class="bg-red-900">2025</option>
                    <option value="2026" class="bg-red-900">2026</option>
                  </select>
                </div>
                <select name="depart" class="bg-red-900">
                  <option class="bg-gray-800">Выбрать</option>
                  <option value="pos" class="bg-red-900">Постамат и ПОС</option>
                  <option value="atm" class="bg-red-900">Банкомат и ТС</option>
                </select>
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

      <div class="w-96 h-max border-1 border-neutral-500 rounded-xl">
        <img src="{{ asset('assets/keys.webp') }}" alt="keys" class="w-full h-52 object-cover rounded-t-xl">
        <div class="bg-neutral-900 rounded-b-xl px-5 pt-5 pb-16">
          <h2 class="text-xl mb-4 font-semibold">Ключи</h2>
          @foreach ($data['key'] as $cellIndex => $cell)
            <div class="flex py-1 justify-between">
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
      @else
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
