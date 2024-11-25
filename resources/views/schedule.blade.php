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
  <div class="row">
    <div class="names">Имя</div>
    @foreach($days as $day)
    <div class="cell">{{ $day }}</div>
    @endforeach
  </div>
  @for($a = 0; $a < count($complete_data['names']); $a++)
    <div class="row">
    <div class="names">{{ explode(" ", $complete_data['names'][$a])[1] }}</div>
    @for($b = 0; $b < count($days); $b++)
      <div class="cell">{{ $complete_data['data'][$a][$b] }}</div>
    @endfor
    </div>
  @endfor
</div>




@php




echo '
<pre>';
print_r($dates);
echo '</pre>';

echo '
<pre>';
print_r($days);
echo '</pre>';


@endphp




@endif

@endsection