<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ isset($title) ? $title : 'CINEMA XIX' }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
  <div class="w-screen h-screen relative">
    @include('components.alert')
    @include('components.navbar')
    @yield('content')
  </div>
</body>

</html>
