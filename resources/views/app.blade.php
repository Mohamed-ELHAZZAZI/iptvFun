<!doctype html>
<html id="html-tag" class="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @stack('styles')
</head>
<body class="overflow-x-hidden bg-white dark:bg-gray-900">
  
  <x-navigation.nav />

  @yield('content')

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  @stack('scripts')
  @vite('resources/js/app.js')
</body>
</html>