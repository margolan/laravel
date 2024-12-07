@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($lol))
    @php

      // if ($lol['type'] === 'schedule') {
      //     echo "It's schedule!";
      // } else {
      //     echo "It's key!";
      // }

      // $bla = $lol->get(0)?->get(0)?->get(4);

      // echo $bla;

      echo '<pre>';
      print_r($lol->get(0)?->get(4));
      echo '</pre>';

    @endphp
  @endif

@endsection
