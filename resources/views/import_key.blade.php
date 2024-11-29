@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

  <form action="{{ route('getKey') }}" enctype="multipart/form-data" method="post" class="px-3 py-5">
    <input type="file" name="file">
    <input type="submit" value="Submit" class="bg-gray-500 px-5 rounded-md">
    @csrf
  </form>

  @php

  @endphp

  @if (session('error'))
    <p class="p-3">{{ session('error') }}</p>
  @endif

  @if (isset($complete_data))
    @php
      echo '<pre>';
      print_r($complete_data);
      echo '</pre>';
    @endphp
  @endif

  @if (isset($lol))
    @php
      echo '<pre>';
      print_r($lol);
      echo '</pre>';
    @endphp
  @endif



@endsection
