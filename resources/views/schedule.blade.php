@extends('layout.app')

@section('title', 'Excel Import')

@section('content')

<form action="{{ route('import') }}" enctype="multipart/form-data" method="post" class="px-3 py-5">
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

@if(isset($complete_data))

<div class="px-3 py-12">
  <div class="inline-flex">
    <div class="w-28 dark:border-1 dark:border-white border-1 border-black px-1">Имя</div>
    @foreach($complete_data['dates'][0] as $day)
    <div class="dark:border-1 dark:border-white border-1 border-black w-6 flex justify-center items-center">{{ $day }}
    </div>
    @endforeach
  </div>
  @for($a = 0; $a < count($complete_data['names']); $a++) <div class="inline-flex">
    <div class="w-28 dark:border-1 dark:border-white border-1 border-black px-1">{{ explode(" ",
      $complete_data['names'][$a])[1] }}</div>
    @for($b = 0; $b < count($complete_data['dates'][0]); $b++) <div
      class="dark:border-1 dark:border-white border-1 border-black w-6 flex justify-center items-center">{{
      $complete_data['data'][$a][$b] }}
</div>
@endfor
</div>
@endfor
</div>




@php




echo '
<pre>';
print_r($complete_data['dates']);
echo '</pre>';

echo '
<pre>';
// print_r();
echo '</pre>';


@endphp




@endif

@endsection