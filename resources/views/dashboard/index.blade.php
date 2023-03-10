@extends('layouts.dashboard')

@section('page')
<h2 class="text-3xl mt-5">Hello, Welcome <span class="font-bold">{{ auth()->user()->name }}</span></h2>
@endsection
