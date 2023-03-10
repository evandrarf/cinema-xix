@extends('layouts.dashboard')

@section('page')
<div class="flex flex-col items-center">
  <h2 class="text-black text-3xl font-medium ">Create Movie</h2>
  <form enctype="multipart/form-data" action="{{ route('movie.store') }}" class="w-1/3 mt-16" method="POST">
    @csrf
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie Name</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="The Avengers" required>
    </div>
    <div class="mb-6">
      <label for="minute_length" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minute
        Length</label>
      <input type="number" min="1" max="999" name="minute_length" id="minute_length"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="153" required>
    </div>
    <div class="mb-6">

      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload image</label>
      <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="file_input_help" id="file_input" name="picture" type="file">
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, JPEG, WEBP or GIF.
      </p>
    </div>
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
      movie</button>
  </form>
</div>

@endsection
