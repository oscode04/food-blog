<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('tittle')</title>
    <link rel="icon" href="../aset/icon/logo-crop.jpg" />

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.vendor-style')
    @include('includes.css-selector')
    @include('includes.icon')
    @stack('addon-style')
  </head>
  <body>
    {{-- navbar --}}
    @include('includes.navbar-detail')

    {{-- content --}}
    @yield('content')
    
    {{-- footer --}}
    @include('includes.footer-detail')

    {{-- script --}}
    @stack('prepend-script')
    @include('includes.vendor-script')
    @stack('addon-script')
  </body>
</html>
