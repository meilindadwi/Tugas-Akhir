<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  {{-- Style.css --}}
  @stack('prepend-style')
  @include('partials.style')
  @stack('addon-style')

  <title>Rumi Foundation Training</title>
</head>

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <div class="untree_co-hero overlay" style="background-image: url('images/hero-img-1-min.jpg');">
  @include('partials.navbar')

    <div class="container">
      <div class="row align-items-center justify-content-center">

        <div class="col-12">

          <div class="row justify-content-center ">

            <div class="col-lg-6 text-center ">
            @yield('container')
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div> 

  @yield('content')
  @include('partials.footer')

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

  {{-- Script --}}
  @stack('prepend-script')
  @include('partials.script')
  @stack('addon-script')

  </body>

  </html>