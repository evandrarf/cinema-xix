@extends('layouts.dashboard')

@section('page')
<div class="w-full justify-between flex items-center">
  <h2 class="text-black text-3xl font-medium">All Studio</h2>
  <a href="{{ route('studio.create') }}" class="px-4 py-2 bg-blue-500 rounded-md text-white">Create studio</a>
</div>
<div class="h-[550px] overflow-y-auto mt-12">
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Name
          </th>
          <th scope="col" class="px-6 py-3">
            Branch Name
          </th>
          <th scope="col" class="px-6 py-3">
            Price
          </th>
          <th scope="col" class="px-6 py-3">
            Basic Price
          </th>
          <th scope="col" class="px-6 py-3">
            Additional Friday Price
          </th>
          <th scope="col" class="px-6 py-3">
            Additional Saturday Price
          </th>
          <th scope="col" class="px-6 py-3">
            Additional Sunday Price
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($studios as $studio)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $studio->name }}
          </th>
          <td class="px-6 py-4">
            {{ $studio->branch->name }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($studio->price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($studio->basic_price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($studio->additional_friday_price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($studio->additional_saturday_price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($studio->additional_sunday_price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4 flex">
            <a href="{{ route('studio.edit', $studio->id) }}"
              class="font-medium text-blue-600 mr-4 dark:text-blue-500 hover:underline">
              @include('components.icons.edit-icon')
            </a>
            <form action="{{ route('studio.destroy', $studio->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a onclick="this.closest('form').submit()" class="text-red-600 cursor-pointer">
                @include('components.icons.transh-icon')
              </a>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
