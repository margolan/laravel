@extends('layout.app')

@section('title', 'Kanban')

@section('content')


  @if (isset($data))
    @php
      echo '<pre>';
      print_r($data);
      echo '</pre>';
    @endphp
  @endif

  <div class="wrap min-h-screen flex flex-wrap justify-center gap-5 text-neutral-900 py-5">

    <div class="todo w-85 border-t-6 border-orange-300 bg-white px-3">

      <div class="header h-18 flex flex-col justify-center items-center">
        <span class="font-semibold text-lg">To Do</span>
        <span class="text-sm">5 cards</span>
      </div>

      <div class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-rose-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-end cursor-pointer">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

      <div
        class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-emerald-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-end">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

      <div
        class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-emerald-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-end">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

      <div class="border-1 border-neutral-300 bg-neutral-100 border-t-4 px-3 p-4 text-sm text-neutral-700">
        <form action="{{ route('kanban') }}" method="post">
          @csrf
          <p class="py-3 font-semibold">New Sticker</p>
          <input type="text" name="title" class="w-full bg-white border-1 border-neutral-300 p-2 mb-3"
            placeholder="Title">
          <textarea name="text" rows="4" class="w-full bg-white border-1 border-neutral-300 p-2 mb-3" placeholder="Text"></textarea>
          <select name="priority" class="w-full bg-white border-1 border-neutral-300 p-2 mb-3">
            <option value="1" class="text-red-500">High Priority</option>
            <option value="2" class="text-emerald-500" selected>No Priority</option>
            <option value="3" class="text-green-500">Low Priority</option>
          </select>
          <button type="submit" class="bg-neutral-800 text-white py-2 px-5 ">Add</button>
        </form>
      </div>
    </div>

    {{-- Divider --}}

    <div class="inProcess w-85 border-t-6 border-red-400 bg-white px-3">

      <div class="header h-18 flex flex-col justify-center items-center">
        <span class="font-semibold text-lg">In Process</span>
        <span class="text-sm">2 cards</span>
      </div>

      <div class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-rose-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-between">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Left</div>
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

    </div>

    {{-- Divider --}}

    <div class="testing w-85 border-t-6 border-yellow-300 bg-white px-3">

      <div class="header h-18 flex flex-col justify-center items-center">
        <span class="font-semibold text-lg">Testing</span>
        <span class="text-sm">3 cards</span>
      </div>

      <div class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-rose-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-between">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Left</div>
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

    </div>

    {{-- Divider --}}

    <div class="ready w-85 border-t-6 border-green-300 bg-white px-3">

      <div class="header h-18 flex flex-col justify-center items-center">
        <span class="font-semibold text-lg">Ready</span>
        <span class="text-sm">2 cards</span>
      </div>

      <div class="border-1 border-neutral-300 bg-neutral-100 text-sm text-neutral-700 border-t-4 border-t-rose-300 mb-5">
        <p class="indent-3 px-3 my-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure perferendis
          consectetur,
          sunt, eum delectus
          alias facere natus harum iusto quasi voluptatum ut eius aspernatur, quibusdam veritatis qui quo itaque illo.
        </p>
        <div class="flex justify-between">
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Left</div>
          <div class="bg-neutral-800 text-white px-5 cursor-pointer">To the Right</div>
        </div>
      </div>

    </div>




  </div>

@endsection
