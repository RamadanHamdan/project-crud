<!DOCTYPE html>
<html class="class="h-full bg-gray-100 lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="h=full">

<div class="min-h-full">
  <x-navbar></x-navbar>
  <x-header>{{ $title }}</x-header>
  
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      {{ $slot }}
    </div>
  </main>
</div>

</body>
</html>