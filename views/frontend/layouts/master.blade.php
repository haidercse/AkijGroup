<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- styles here  --}}
    @include('frontend.layouts.partials.styles')
    <title>@yield('title')</title>
  </head>
  <body>
   {{-- Nav Start here --}}
   @include('frontend.layouts.partials.nav')
    {{-- Nav bar End Here  --}}

     {{-- sidebar + show product  --}}
           @yield('content')
     {{-- sidebar + show product end here  --}}

     {{-- footer start here  --}}
        @include('frontend.layouts.partials.footer')
     {{-- footer end here  --}}

      {{-- scripts here  --}}
      @include('frontend.layouts.partials.scripts')
  </body>
</html>
