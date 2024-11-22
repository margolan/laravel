@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

<form action="{{ route('import') }}" enctype="multipart/form-data" method="post">
  <input type="file" name="file">
  <input type="submit" value="Submit">
  @csrf
</form>

@php



@endphp

@if(session('error'))
{{ session('error') }}
<hr>
@endif
@if(session('success'))
{{ session('success') }}
<hr>
@endif

@if(isset($row_data))

<div class="wrap">
  @for($a = 0; $a < count($complete_data['names']); $a++)

  <div class="row">
    <div class="names">{{ $complete_data['names'][$a] }}</div>
      @for($b = 0; $b < $days; $b++)
        <div class="cell">{{ $complete_data['data'][$a][$b] }}</div>
      @endfor
  </div>

  @endfor
</div>

@php




echo '
<pre>';
print_r($complete_data['data']);
echo '</pre>';

echo '
<pre>';
print_r($complete_data);
echo '</pre>';


@endphp




@endif

@endsection