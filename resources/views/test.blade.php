@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (session('data'))
    {{ session('data') }}
  @endif

  @isset($data)
    @php
      echo '<pre>';
      print_r($data);
      echo '</pre>';
    @endphp
  @endisset


@endsection
