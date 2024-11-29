@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($lol))
    @php

      if ($lol['type'] === 'schedule') {
          echo "It's schedule!";
      } else {
          echo "It's key!";
      }

      echo '<pre>';
      print_r($lol);
      echo '</pre>';

    @endphp
  @endif

@endsection
