@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($data))
    @php
      echo '<pre>';
      print_r($data);
      print_r($keys);
      echo '</pre>';
    @endphp
  @else
    <p>no data</p>
  @endif


@endsection
