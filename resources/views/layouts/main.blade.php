<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link rel="stylesheet" href="{{ env('APP_URL') . '/css/bootstrap.css' }}">
  </head>
  <body>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>
    <script src="{{ env('APP_URL') . '/js/bootstrap.js' }}" ></script>

  </body>
</html>
