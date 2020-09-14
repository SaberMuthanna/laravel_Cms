<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
      content="No page can go online without having an eye catching cover to keep your visitors in the page.">
    <meta name="keywords" content="cover, header, block, html code">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @if (config('app.locale')=='ar')
    <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet">
    @endif


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
  </head>
  <!-- Favicons -->
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">
        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="font-weight-bold" href="{{route('welcome')}}" >
          {{-- <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
            <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
          </a> --}}
          {{ __('lang.Home') }}
        </div>
        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
          <ul class="nav nav-navbar">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{__('lang.language')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                      </a>
                  @endforeach
              </div>
            </li>
          </ul>
        </section>
      <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">{{ __('lang.Login') }}</a>
      </div>
    </nav>
    <!-- /.navbar -->

    <!--start Header -->
    @yield('header')
    <!-- /. end header -->
    <!-- Start Main Content -->
    @yield('content')
    <!--end  Main Content -->
    <!-- Footer -->
    <footer class="footer text-white bg-dark py-7">
      <div class="container">
        <div class="row gap-y align-items-center">
          <div class="col-md-6">
            <div class="nav nav-bold nav-uppercase justify-content-center justify-content-md-end">
             <a  class="nav-link" href="/">{{ __('lang.Home') }}</a>
              <a class="nav-link" href="#">{{ __('lang.About') }}
              <a class="nav-link" href="#">{{ __('lang.Contact') }}</a>
            </div>
          </div>
          <div class="col-md-6 text-center text-md-left mt-5 mt-md-0">
            <div class="social social-bg-dark">
              <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
              <a class="social-youtube" href="#"><i class="fa fa-youtube"></i></a>
              <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-12 text-center">
            <br>
            <small>© TheThemeio 2019, All rights reserved.</small>
          </div>

        </div>
      </div>
    </footer>
    <!-- /.footer -->
    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
     <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f44d05a34553fb6"></script>
  </body>
</html>
