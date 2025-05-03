@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Décentralisation, Démocratie locale et Participation citoyenne | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.decentralisation')
    <!--Decentralisation Start -->
                <div class="container-fluid">
                    <div class="container-fluid mb-2">
                        <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 100%;">
                            <h1 class="display-5 mb-5"
                                style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                                'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                                Décentralisation, Démocratie locale et Participation citoyenne</h1>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="row">
                                <div class="responsive">
                                    <div class="img-fluid">
                                        <table class="table table-striped">
                                            <thead style="color: #ff6902;">
                                                <tr>
                                                    <th style="width: 80px">Titres</th>
                                                    <th style="width: 80px">Durée</th>
                                                    <th style="width: 80px">Financement</th>
                                                    <th style="width: 80px">Objectifs</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: left;">
                                                @foreach ($projets as $projets_items)
                                                <tr>
                                                    <td><a href=""><strong>{{ $projets_items->name }}</strong></a></td>
                                                    <td><strong>{{ $projets_items->duree }}</strong></td>
                                                    <td><strong>{{ $projets_items->financer }}</strong></td>
                                                    <td><strong>{!! Str::limit(strip_tags($projets_items->objectifs), 50,'(...)') !!}</strong></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="social-links" class="mb-2">
                            <ul style="display:inline; ">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.decentralise.index') }}"
                                        class="social-button" id=""><span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.decentralise.index') }}"
                                        class="social-button" id=""><span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.decentralise.index') }}"
                                        class="social-button" id=""><span class="fab fa-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/?text={{ route('labo.front.decentralise.index') }}"
                                        class="social-button" id=""><span class="fab fa-whatsapp"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    <!-- Decentralisation End -->
@endsection
