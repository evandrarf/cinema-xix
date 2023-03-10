@extends('layouts.dashboard')

@section('page')
<div class="flex flex-col items-center">
  <h2 class="text-black text-3xl font-medium ">Create Schedule</h2>
  <form action="{{ route('schedule.store') }}" class="w-1/3 mt-16" method="POST">
    @csrf
    <div class="mb-6">
      <label for="movie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
        Movie</label>
      <select name="movie_id" id="movie_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        @foreach ($movies as $movie)
        <option value="{{ $movie->id }}">{{ $movie->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-6">
      <label for="studio_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
        Movie</label>
      <select name="studio_id" id="studio_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        @foreach ($studios as $studio)
        <option value="{{ $studio->id }}">{{ $studio->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-6">
      <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time</label>
      <input type="datetime-local" name="start" id="start"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
    </div>
    <div class="mb-6">
      <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wnd time</label>
      <input type="datetime-local" name="end" id="end"
        class="bg-gray-50 border cursor-pointer border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
    </div>

    <button type="submit"
      class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
      schedule</button>
  </form>
</div>

@endsection
