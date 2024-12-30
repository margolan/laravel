@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  @if (isset($processed_data))
    @if (empty($processed_data))
      No data
    @else
      Has Data
      <hr>
      @php
        echo '<pre>';
        print_r($processed_data);
        echo '</pre>';
      @endphp
    @endif
  @endif

@endsection
