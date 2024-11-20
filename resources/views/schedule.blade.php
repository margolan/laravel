@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

<form action="{{ route('import') }}" enctype="multipart/form-data" method="post">
  <input type="file" name="file">
  <input type="submit" value="Submit">
  @csrf
</form>

@if(session('error'))
{{ session('error') }}
<hr>
@endif
@if(session('success'))
{{ session('success') }}
<hr>
@endif

@if(isset($row_data))


<!-- @foreach($anchor as $cell) -->
<!-- <pre> -->
<!-- {{ $cell }} -->
<!-- </pre> -->
<!-- @endforeach -->
@php

echo '
<pre>';
print_r($anchor);
echo '</pre>';

echo '
<pre>';
print_r($complete_data);
echo '</pre>';


@endphp




@endif

@endsection