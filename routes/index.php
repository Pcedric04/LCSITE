@extends('layouts.frontapplayouts')
@section('title','Accueil-Labo Citoyennetés')
@section('content')
<div class="banner-carousel banner-carousel-1 mb-0">
    <div class="banner-carousel-item" style="background-image:url({{ asset('front/public/images/slider/01.jpg')}})">
      <div class="slider-content">
          <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-12 text-center">
                  <h2 class="slide-title" data-animation-in="slideInLeft"><span style="font-weight: 600;">Bienvenue sur le</span></h2>
                  <h3 class="slide-sub-title" data-animation-in="slideInRight"><span style="color: #ff6902;">Laboratoire</span> Citoyennétés</h3>
                  {{-- <p data-animation-in="slideInLeft" data-duration-in="1.2">
                      <a href="services.html" class="slider btn btn-primary">Our Services</a>
                      <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                  </p> --}}
                </div>
            </div>
          </div>
      </div>
    </div>
@foreach ($slides as $items)
    <div class="banner-carousel-item" style="background-image:url({{ asset('front/admin/slides/'.$items->image)}})">
      <div class="slider-content text-left">
          <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-12">
                  {{-- <h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2> --}}
                  <h3 class="slide-title" data-animation-in="fadeIn">{{ $items->titre }}</h3>
                  <h3 class="slide-sub-title" data-animation-in="slideInLeft">{{ $items->soustitre }}</h3>
                 {{--  <p data-animation-in="slideInRight">
                      <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                  </p> --}}
                </div>
            </div>
          </div>
      </div>
    </div>
@endforeach
    {{-- <div class="banner-carousel-item" style="background-image:url({{ asset('front/public/images/slider/03.jpg')}})">
      <div class="slider-content text-right">
          <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-12">
                  <h2 class="slide-title" data-animation-in="slideInDown"><span style="font-weight: 600;">FasoVeil</h2>
                  <h3 class="slide-sub-title" data-animation-in="fadeIn">Lancement de la phase operationnelle</h3> --}}
                  {{-- <p class="slider-description lead" data-animation-in="slideInRight">We will deal with your failure that determines how you achieve success.</p> --}}
                  {{-- <div data-animation-in="slideInLeft">
                      <a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                      <a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                  </div> --}}
                {{-- </div>
            </div>
          </div>
      </div>
    </div> --}}
  </div>
@include('frontoffice.body.acceuil.cellules')
@include('frontoffice.body.acceuil.news')
@include('frontoffice.body.acceuil.medias')
@endsection
