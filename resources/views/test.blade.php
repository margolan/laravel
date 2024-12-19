@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($available_links))

    @foreach ($available_links as $item)
      <a href="?city={{ $item->city }}&date={{ $item->date }}">{{ $item->city }} /
        {{ \Carbon\Carbon::parse($item->date)->format('m.Y') }}</a> <span class=" last-of-type:hidden">|</span>
    @endforeach
  @endif


  @if ($data)
    @if (empty($data))
      No data
    @else
      @php

        echo '<pre>';
        // print_r($available_links);
        // print_r($requests);
        print_r($data);
        echo '</pre>';

      @endphp
    @endif
  @endif

@endsection
