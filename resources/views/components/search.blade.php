<form method="GET" class="-mt-2 mb-6">
  <div class="flex items-center">
    <div class="mr-3">
      <select id="countries" name="branch"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>Choose a branch</option>
        @foreach ($branches as $branch)
        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mr-3">
      <input type="date" name="date" id="date"
        class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    </div>
    <div>
      <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md">Search</button>
    </div>
    <a href="{{ route('schedule.index') }}" class="ml-4 text-blue-500">Clear search</a>
  </div>

</form>
