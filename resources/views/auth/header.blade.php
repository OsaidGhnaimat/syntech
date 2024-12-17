<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

  <title>SynTech</title>
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



  <nav class="site-nav mb-5">
    <div class="pb-2 top-bar mb-3">
      <div class="container">
        <div class="row align-items-center">

          {{-- <div class="col-6 col-lg-9">
            <a href="#" class="small mr-3 text-dark"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block">Have a questions?</span></a>
            <a href="#" class="small mr-3 text-dark"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block">10 20 123 456</span></a>
            <a href="#" class="small mr-3 text-dark"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block">info@mydomain.com</span></a>
          </div> --}}
{{--
          <div class="col-6 col-lg-3 text-right">
            <a href="{{ route('login') }}" class="small mr-3 text-dark">
              <span class="icon-lock"></span>
              Log In
            </a>
            <a href="{{ route('register') }}" class="small text-dark">
              <span class="icon-person"></span>
              Register
            </a>
          </div> --}}

        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center ">
          <a href="index.html" class="logo menu-absolute m-0 text-dark" >SynTech<span class="text-primary"></span></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li><a class="text-primary" href="{{ route('home') }}">Home</a></li>
            {{-- <li class="has-children">
              <a href="#">Dropdown</a>
              <ul class="dropdown">
                <li><a href="elements.html">Elements</a></li>
                <li class="has-children">
                  <a href="#">Menu Two</a>
                  <ul class="dropdown">
                    <li><a href="#">Sub Menu One</a></li>
                    <li><a href="#">Sub Menu Two</a></li>
                    <li><a href="#">Sub Menu Three</a></li>
                  </ul>
                </li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li> --}}
            <li><a  class="text-primary" href="{{ route('staff') }}">Our Staff</a></li>
            <li><a class="text-primary" href="{{ route('news') }}">News</a></li>
            <li><a class="text-primary" href="{{ route('gallery') }}">Gallery</a></li>
            <li><a class="text-primary" href="{{ route('about') }}">About</a></li>
            <li><a class="text-primary" href="{{ route('contact') }}">Contact</a></li>
          </ul>

          {{-- <a href="#" class="btn-book btn btn-secondary btn-sm menu-absolute">Enroll Now</a> --}}

          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none  text-dark" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>
