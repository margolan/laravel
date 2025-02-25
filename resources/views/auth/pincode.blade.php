@extends('layout.app')

@section('title', 'Pincode')

@section('content')

  <div class="h-screen flex justify-center items-center">
    <div
      class="w-64 text-white shadow-2xl shadow-black mx-auto flex flex-col bg-radial-[at_50%_25%] from-stone-700 to-stone-900 to-100% rounded-lg p-4">
      <div class="display w-full h-26 flex justify-center items-center text-3xl gap-3 text-emerald-500">
        <div class="cell">_</div>
        <div class="cell">_</div>
        <div class="cell">_</div>
        <div class="cell">_</div>
      </div>
      <div class="flex flex-wrap gap-3 justify-center">
        <div class="key">1</div>
        <div class="key">2</div>
        <div class="key">3</div>
        <div class="key">4</div>
        <div class="key">5</div>
        <div class="key">6</div>
        <div class="key">7</div>
        <div class="key">8</div>
        <div class="key">9</div>
        <div class="w-16 h-16"></div>
        <div class="key">0</div>
        <div class="key">C</div>
        <form action="{{ route('auth_pincode') }}" method="post">
          @csrf
          <input type="text" name="pincode" hidden class="pincode border-1 text-white">
        </form>
      </div>
    </div>
  </div>

  <script>
    const cell = document.querySelectorAll('.cell');
    const key = document.querySelectorAll('.key');
    const pincode = document.querySelector('.pincode');

    key.forEach(function(key_el) {
      key_el.addEventListener('click', function() {

        if (this.textContent === 'C') {
          cell.forEach(function(cell_el) {
            cell_el.textContent = '_';
          });
          pincode.value = '';
        } else {
          if (pincode.value.length < 4) {
            pincode.value += this.textContent;
            for (let i = 0; i < 4; i++) {
              if (cell[i].textContent === '_') {
                cell[i].textContent = '*';
                break;
              }
            }
            if (pincode.value.length === 4) {
              document.querySelector('form').submit();
            }
          }
        }

      });
    });
  </script>

@endsection
