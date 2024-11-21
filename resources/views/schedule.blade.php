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