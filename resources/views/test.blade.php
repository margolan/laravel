@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($data))
    {{-- @if ($all->isEmpty())
      No data
    @else
      Has data
    @endif --}}

    {{-- @foreach ($data->pluck('city') as $city)
      {{ $city }}
    @endforeach --}}

    @foreach ($available_links as $item)
      <a href="?city={{ $item->city }}&date={{ $item->date }}">{{ $item->city }} /
        {{ \Carbon\Carbon::parse($item->date)->format('m.Y') }}</a> <span class=" last-of-type:hidden">|</span>
    @endforeach

    {{-- <a href="?city={{ $cell }}&date={{ $cell }}"></a> --}}

    @php

      echo '<pre>';
      // print_r($available_links);
      // print_r($requests);
      print_r($data);
      echo '</pre>';

    @endphp
  @endif

@endsection
