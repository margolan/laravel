@extends('layout.app')

@section('title', 'Отправка письма')

@section('content')

  <div class="w-70 mx-auto p-10 rounded-lg bg-gray-100 text-gray-700">
    <h1 class="text-2xl mb-5"><a href="/sendmail">Почта</a></h1>
    <form action="/sendmail" method="POST" class="flex flex-col text-sm">
      @csrf
      <label for="mailAddress">Адрес</label><input type="text" class="border-1 border-black mb-3 px-4 py-1 rounded-md"
        name="mailAddress">
      <label for="mailSubject">Тема</label><input type="text" class="border-1 border-black mb-3 px-4 py-1 rounded-md"
        name="mailSubject">
      <label for="mailText">Текст</label>
      <textarea rows="5" class="border-1 border-black mb-3 px-4 py-1 rounded-md" name="mailText"></textarea>
      <input type="submit" value="Send Email" class="border-1 border-black mb-3 rounded-md py-1">
      <div class="errors">
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        @endif
      </div>
    </form>
  </div>

@endsection
