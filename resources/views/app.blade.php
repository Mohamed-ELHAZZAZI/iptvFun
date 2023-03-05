<!doctype html>
<html id="html-tag" lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Looking for high-quality IPTV services? Look no further than our professional IPTV selling website! With a wide range of channels from around the world, including sports, news, and entertainment, our IPTV services are perfect for anyone looking to experience top-notch streaming quality. Plus, our user-friendly interface makes it easy to navigate and find the content you want. Don't settle for subpar IPTV services - choose our website for the best in the business!">
  <title>IPTV-Fun</title>
  <link rel="shortcut icon" href="{{ asset('/storage/icons/logo.svg') }}" type="image/x-icon">
  @vite('resources/css/app.css')
  @stack('styles')
</head>
<body class="overflow-x-hidden bg-white dark:bg-gray-900">
  
  <x-navigation.nav />

  @yield('content')

  <x-navigation.footer />

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  @stack('scripts')
  @vite('resources/js/app.js')
</body>
</html>