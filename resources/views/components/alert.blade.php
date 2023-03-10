@if ($errors->any())
@foreach ($errors->all() as $error)
<div
  class="p-4 w-full absolute top-0 left-0 right-0 mb-4 alert text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
  role="alert">
  <span class="font-medium">Danger!</span> {{ $error }}
</div>

@endforeach

@endif

@if (session('error'))
<div
  class="p-4 mb-4 text-sm absolute top-0 alert left-0 right-0 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
  role="alert">
  <span class="font-medium">Danger!</span> {{ session('error') }}
</div>
@endif

@if (session('success'))
<div
  class="p-4 mb-4 text-sm absolute w-full alert text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 z-20"
  role="alert">
  <span class="font-medium">Success!</span> {{ session('success') }}
</div>
@endif
