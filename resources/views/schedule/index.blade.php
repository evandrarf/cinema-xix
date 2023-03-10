@extends('layouts.dashboard')

@section('page')
<div class="w-full justify-between flex items-center">
  <h2 class="text-black text-3xl font-medium">All Schedules</h2>
  @admin
  <a href="{{ route('schedule.create') }}" class="px-4 py-2 bg-blue-500 rounded-md text-white">Create schedule</a>
  @endadmin
</div>
<div class="w-full mt-6">
  @include('components.search')
</div>
<div class="h-[550px] overflow-y-auto mt-12">
  @if ($groups->count() == 0)
  <h3 class="text-xl">No result for your search</h3>
  @else
  @admin
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Studio Name
          </th>
          <th scope="col" class="px-6 py-3">
            Movie
          </th>
          <th scope="col" class="px-6 py-3">
            Price
          </th>
          <th scope="col" class="px-6 py-3">
            Start
          </th>
          <th scope="col" class="px-6 py-3">
            End
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>

        @foreach ($groups as $group)
        @foreach ($group as $movie)
        @foreach ($movie as $schedule)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $schedule->studio->name }}
          </th>
          <td class="px-6 py-4">
            {{ $schedule->movie->name }}
          </td>
          <td class="px-6 py-4">
            {{ number_format($schedule->price, 0, ',', '.') }}
          </td>
          <td class="px-6 py-4">
            {{ $schedule->start }}
          </td>
          <td class="px-6 py-4">
            {{ $schedule->end }}
          </td>

          <td class="px-6 py-4 flex">
            <a href="{{ route('schedule.edit', $schedule->id) }}"
              class="font-medium text-blue-600 mr-4 dark:text-blue-500 hover:underline">
              @include('components.icons.edit-icon')
            </a>
            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a onclick="this.closest('form').submit()" class="text-red-600 cursor-pointer">
                @include('components.icons.transh-icon')
              </a>
            </form>
          </td>
        </tr>
        @endforeach
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
  @else
  @foreach ($groups as $group)
  <div class="mb-10 ">
    <h3 class="text-2xl text-black font-semibold">{{ $group->first()->first()->studio->name }}</h3>
    @foreach ($group as $movie)

    <a
      class="flex my-4 items-center bg-white border border-gray-200 rounded-lg shadow flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[600px]">
      <img class="object-cover  rounded-t-lg h-96 md:h-auto w-48 md:rounded-none md:rounded-l-lg"
        src="{{ $movie->first()->movie->picture_url }}" alt="{{ $movie->first()->movie->name }} ">
      <div class="flex flex-col justify-between h-72 w-full p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ $movie->first()->movie->name }}</h5>
        <div class="h-96 overflow-y-auto grid grid-rows-5  w-full">
          @foreach ($movie as $schedule)
          <div class="rounded-sm px-4 py-1 my-2 text-white bg-green-600">
            <div class="flex justify-between">
              <p class="text-sm ">
                {{ $schedule->start }} - {{ $schedule->end }}
              </p>
              <p class="text-sm ">
                {{ number_format($schedule->price, 0, ',','.') }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </a>

    @endforeach
  </div>
  @endforeach
  @endadmin
  @endif
</div>
@endsection
