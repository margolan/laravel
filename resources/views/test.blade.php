@extends('layout.app')

@section('title', 'Excel import')

@section('content')


  @if (isset($processed_data))
    @if (empty($processed_data))
      No data
    @else
      @php
        echo '<pre>';
        // print_r($processed_data);
        echo '</pre>';
      @endphp
    @endif
  @endif

  @php
    $lol = [[1, 2, 3, 4, 5, 0, 5, 4, 3, 2, 0, 1], [1, 2, 3, 4, 5, 0, 5, 4, 3, 2, 0, 1]];
    echo '<pre>';
    $lol1 = array_map(function ($subarray) {
        return array_values(
            array_filter($subarray, function ($value) {
                return $value !== 0;
            }),
        );
    }, $lol);
    print_r($lol1);
    echo '</pre>';
  @endphp

@endsection

?> ?>
