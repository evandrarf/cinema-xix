@extends('layouts.dashboard')

@section('page')
<div class="w-full justify-between flex items-center">
  <h2 class="text-black text-3xl font-medium">All Movie</h2>
  <a href="{{ route('movie.create') }}" class="px-4 py-2 bg-blue-500 rounded-md text-white">Create movie</a>
</div>
<div class="h-[550px] overflow-y-auto mt-12 grid gap-6 grid-cols-3">
  @foreach ($movies as $movie)
  <div class=" bg-white border max-h-max border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
      <img class="rounded-t-lg" src="{{ asset($movie->picture_url) }}" alt="" />
    </a>
    <div class="p-5">
      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $movie->name }}</h5>
      </a>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        {{ $movie->duration }} <span class="font-bold">({{ $movie->minute_length }}minutes)</span>
      </p>
      <div class="w-full flex justify-end">
        <a href="{{ route('movie.edit', $movie) }}" class="mr-4">
          @include('components.icons.edit-icon')
        </a>
        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <a onclick="this.closest('form').submit()" class="text-red-600 cursor-pointer">
            @include('components.icons.transh-icon')
          </a>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
