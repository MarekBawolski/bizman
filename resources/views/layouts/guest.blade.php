<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" onload="this.media='all'" rel="stylesheet" media="print">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <div class="font-sans antialiased text-gray-900">
    {{ $slot }}
  </div>
</body>

</html>
