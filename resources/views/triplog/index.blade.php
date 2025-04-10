@extends('layout.blank')

@section('title', 'Путевой лист')

@section('content')

  @if (session('test'))
    @php
      echo '<pre>';
      print_r(session('test'));
      echo '</pre>';
    @endphp
  @endif

  <h1 class="w-max mx-auto text-2xl"><a href="/max">Путевой Лист</a></h1>

  @isset($data)
    <div class="wrap w-full p-3">

      <div class="wrap2 w-full flex flex-col gap-3 items-center">

        @foreach ($data as $item)
          <div class="sticker w-full sm:w-110 shadow-lg shadow-black p-3 bg-neutral-950/75">
            <div class="flex py-2 justify-between">
              <div class="text-lg font-bold">Заявка: <span class="order_number">{{ $item->order_number }}</span> </div>
              <div><span class="edit_button cursor-pointer">&#x27f3;</span><span
                  class="delete_button cursor-pointer text-sm ml-3">&#x2715;</span></div>
            </div>
            <div><span class="text-xs">Дата:</span> <span class="date">{{ $item->date }}</span></div>
            <div><span class="text-xs">Откуда:</span> <span class="from_address">{{ $item->from_address }}</span></div>
            <div><span class="text-xs">Куда:</span> <span class="to_address">{{ $item->to_address }}</span></div>
            <div><span class="text-xs">Причина:</span> <span class="trip_purpose">{{ $item->trip_purpose }}</span></div>
            <div><span class="text-xs">Результат:</span> <span class="trip_result">{{ $item->trip_result }}</span></div>
            @if ($item->start_end_mileage)
              <div><span class="text-xs">Километраж:</span>
                <span class="start_end_mileage">{{ $item->start_end_mileage }}</span>
              </div>
            @endif
            @if ($item->daily_mileage)
              <div><span class="text-xs">Пробег за день:</span>
                <span class="daily_mileage">{{ $item->daily_mileage }}</span>
              </div>
            @else
            @endif
            @if ($item->fuel_amount)
              <div><span class="text-xs">Заправка (Л):</span>
                <span class="fuel_amount">{{ $item->fuel_amount }}</span>
              </div>
            @endif
            @if ($item->parking_fee)
              <div>
                <span class="text-xs">Парковка:</span> <span class="parking_fee">{{ $item->parking_fee }}</span>
              </div>
            @endif
            @if ($item->mileage_at_fueling)
              <div>
                <span class="text-xs">Пробег на момент заправки:</span> <span
                  class="mileage_at_fueling">{{ $item->mileage_at_fueling }}</span>
              </div>
            @endif
          </div>
        @endforeach

        {{-- {{ $data->links() }} --}}

      </div>

      <div class="edit_form hidden">
        <div class="w-full h-screen flex justify-center items-center backdrop-blur-md fixed top-0 left-0">
          <div class="w-full sm:w-110 shadow-lg shadow-black bg-neutral-950/75">
            <form action="{{ route('triplog_edit') }}" method="POST" class="flex flex-col gap-1 px-3 py-10">
              @csrf
              <div class="flex justify-center"><label for="order_number" class="w-32">Заявка: </label><input
                  type="text" class="border-1" name="order_number"></div>
              <div class="flex justify-center"><label for="date" class="w-32">Дата: </label><input type="text"
                  class="border-1" name="date"></div>
              <div class="flex justify-center"><label for="from_address" class="w-32">Откуда: </label><input
                  type="text" class="border-1" name="from_address"></div>
              <div class="flex justify-center"><label for="to_address" class="w-32">Куда: </label><input type="text"
                  class="border-1" name="to_address">
              </div>
              <div class="flex justify-center"><label for="trip_purpose" class="w-32">Причина: </label><input
                  type="text" class="border-1" name="trip_purpose">
              </div>
              <div class="flex justify-center"><label for="trip_result" class="w-32">Результат: </label><input
                  type="text" class="border-1" name="trip_result">
              </div>
              <div class="flex justify-center"><label for="start_end_mileage" class="w-32">Километраж: </label><input
                  type="text" class="border-1" name="start_end_mileage" title="Только цифры" placeholder="Только цифры">
              </div>
              <div class="flex justify-center"><label for="daily_mileage" class="w-32">Пробег за день: </label><input
                  type="text" class="border-1" name="daily_mileage" title="Только цифры" placeholder="Только цифры">
              </div>
              <div class="flex justify-center"><label for="fuel_amount" class="w-32">Заправка (Л): </label><input
                  type="text" class="border-1" name="fuel_amount"></div>
              <div class="flex justify-center"><label for="parking_fee" class="w-32">Парковка: </label><input
                  type="text" class="border-1" name="parking_fee">
              </div>
              <div class="flex justify-center"><label for="mileage_at_fueling" class="w-32">Заправка (Км):
                </label><input type="text" class="border-1" name="mileage_at_fueling" title="Только цифры"
                  placeholder="Только цифры">
              </div>
              <input type="text" name="order_hidden" hidden>
              <div class="flex justify-center pt-5 gap-3">
                <input type="submit" value="Изменить" class="w-32 border-1">
                <div class="edit_cancel w-32 border-1 text-center cursor-default bg-red-700">Отмена</div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="delete_form hidden">
        <div class="w-full h-screen flex justify-center items-center backdrop-blur-md fixed top-0 left-0">
          <div class="w-full sm:w-110 shadow-lg shadow-black bg-neutral-950/75 p-10">
            <span>Удалить заявку </span><span class="delete_order"></span>?
            <div class="flex justify-center pt-5 gap-3">
              <a href="" class="delete_confirm w-32 border-1 text-center cursor-default">Удалить</a>
              <div class="delete_cancel w-32 border-1 text-center cursor-default bg-red-700">Отмена</div>
            </div>
          </div>
        </div>
      </div>

    </div>

    @php
      echo '<pre>';
      // print_r($data);
      echo '</pre>';
    @endphp
  @endisset

  <script>
    const edit_form = document.querySelector('.edit_form');
    const delete_form = document.querySelector('.delete_form');

    document.querySelector('.edit_cancel').addEventListener('click', () => {
      edit_form.classList.add('hidden')
    });

    document.querySelector('.delete_cancel').addEventListener('click', () => {
      delete_form.classList.add('hidden')
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        edit_form.classList.add('hidden')
        delete_form.classList.add('hidden')
      }
    });

    document.querySelectorAll('.delete_button').forEach((el) => {
      el.addEventListener('click', () => {
        delete_form.classList.remove('hidden')
        // document.querySelector('.delete_confirm').href = `?deleteOrder=${}`
        console.log(el.closest('.sticker').querySelector);
      })
    })


    document.querySelectorAll('.edit_button').forEach(el => {
      el.addEventListener('click', () => {

        const form_names = ['order_number', 'date', 'from_address', 'to_address', 'trip_purpose',
          'trip_result', 'start_end_mileage', 'daily_mileage', 'fuel_amount', 'parking_fee',
          'mileage_at_fueling'
        ]

        edit_form.classList.remove('hidden')

        for (let i = 0; i < form_names.length; i++) {
          edit_form.querySelector(`input[name=${form_names[i]}]`).value = el.closest('.sticker').querySelector(
            `.${form_names[i]}`)?.textContent || '';
        }

        edit_form.querySelector('input[name=order_hidden]').value = el.closest('.sticker')
          .querySelector('.order_number').textContent;
      })
    });
  </script>



@endsection
