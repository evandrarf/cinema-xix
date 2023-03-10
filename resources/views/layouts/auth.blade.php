@extends('templates.default')

@section('content')
<div class="w-screen h-screen flex justify-center items-center">
  <div class="w-1/3 rounded-lg shadow-lg bg-white px-8 py-6">
    @yield('form')
  </div>
</div>
@endsection
