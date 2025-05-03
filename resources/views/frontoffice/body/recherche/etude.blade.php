@extends('layouts.frontapplayouts')
@section('title','Etudes recit-Labo Citoyennétés')
@section('banner','Etudes recit')
@section('content')
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/public/images/slider/01.avif') }})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">@yield('banner')</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item"><a href="#">Recherches etudes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('banner')</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
          <div class="col-lg-8 mb-3">
            <h3 class="column-title">@yield('banner')</h3>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Titres</th>
                            <th scope="col">Numéro d'études</th>
                            <th scope="col">Auteurs</th>
                            <th scope="col">Documents</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($etudes as $items)
                      <tr>
                            <td><a href="#">{{ $items->titres}}</td>
                            <td>{{ $items->numero}}</td>
                            <td>{{ $items->auteurs}}</td>
                            <td>{{ $items->documents }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    {{ $etudes->links() }}
                  </div>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-4">
            @include('frontoffice.body.infos.infos_sidebar')
          </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->
  @include('frontoffice.body.acceuil.medias')

@endsection
