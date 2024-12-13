@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  <form action="{{ route('test') }}" method="get" class="text-black mt-10">
    @csrf
    <input type="text" name="input_text">
    {{-- <button type="submit">Enter</button> --}}
  </form>


  @if (isset($data))
    @php

      echo '<pre>';
      print_r($data);
      echo '</pre>';

    @endphp
  @endif

@endsection
