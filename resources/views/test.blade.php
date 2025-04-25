@extends('layout.app')

@section('title', 'Excel import')

@section('content')

  <form action="{{ 'sendmail' }}">
    <input type="text" name="mailSubject">
    <input type="text" name="mailBody">
    <input type="submit" value="Send Email">
  </form>

@endsection
