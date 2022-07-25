<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Webdevforus | Micko Widi J</title>
    <meta content="Micko Widi" name="author">
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- Bootstrap 5.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- Nice Admin --}}
    <link href="{{ asset('library/niceadmin/style.css') }}" rel="stylesheet">
    {{-- Bootstrap Icon 1.9.1 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    @stack('head')
  </head>

  <body>
    @yield('body')

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- Nice Admin --}}
    <script src="{{ asset('library/niceadmin/main.js') }}"></script>
    @stack('script')
  </body>
</html>