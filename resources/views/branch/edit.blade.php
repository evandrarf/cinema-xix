@extends('layouts.dashboard')

@section('page')
<div class="flex flex-col items-center">
  <h2 class="text-black text-3xl font-medium ">Update Branch</h2>
  <form action="{{ route('branch.update', $branch->id) }}" class="w-1/3 mt-16" method="POST">
    @csrf
    @method("PATCH")
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Branch Name</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Semarang" value="{{ $branch->name }}" required>
    </div>

    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
      branch</button>
  </form>
</div>

@endsection
