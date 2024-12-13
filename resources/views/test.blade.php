@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  <form action="{{ route('test') }}" method="post" class="text-black mt-10">
    @csrf
    <input type="text" name="input_text">
    <input type="radio" name="name_radio" value="first">1
    <input type="radio" name="name_radio" checked value="second">2
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
