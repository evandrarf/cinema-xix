@extends('layouts.dashboard')

@section('page')
<div class="flex flex-col items-center">
  <h2 class="text-black text-3xl font-medium ">Update Studio</h2>
  <form action="{{ route('studio.update', $studio->id) }}" class="w-1/3 mt-16" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studio Name</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Cinepolis" required value="{{ $studio->name }}">
    </div>
    <div class="mb-6">
      <label for="basic_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Basic Price</label>
      <input type="number" min="1" max="10000000" name="basic_price" id="basic_price"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="10000000" required value="{{ $studio->basic_price }}">
    </div>
    <div class="mb-6">
      <label for="additional_friday_price"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional
        Friday Price</label>
      <input type="number" min="1" max="1000000" name="additional_friday_price" id="additional_friday_price"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="15000" required value="{{ $studio->additional_friday_price }}">
    </div>
    <div class="mb-6">
      <label for="additional_saturday_price"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional
        Saturday Price</label>
      <input type="number" min="1" max="1000000" name="additional_saturday_price" id="additional_saturday_price"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="21000" required value="{{ $studio->additional_saturday_price }}">
    </div>
    <div class="mb-6">
      <label for="additional_sunday_price"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional
        Sunday Price</label>
      <input type="number" min="1" max="1000000" name="additional_sunday_price" id="additional_sunday_price"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="14000" required value="{{ $studio->additional_sunday_price }}">
    </div>

    <div class="mb-6">
      <label for="branch_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
        Branch</label>
      <select name="branch_id" id="branch_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="10000000" required>
        @foreach ($branches as $branch)
        <option value="{{ $branch->id }}" @if ($branch->id == $studio->branch_id)
          selected
          @endif>{{ $branch->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
      branch</button>
  </form>
</div>

@endsection
