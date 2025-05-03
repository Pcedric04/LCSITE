@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Gouvernance et Citoyennétés-Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.citoyennetebanner')
    <!--Decentralisation Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 100%;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                    'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Gouvernance et Citoyennétés</h1>
            </div>
            <div class="col-lg-12 col-md-6 mb-3">
                <div class="row">
                    <div class="responsive">
                        <div class="img-fluid">
                            <table class="table table-striped">
                                <thead style="color: #ff6902;text-align:left;">
                                    <tr>
                                        <th style="width: 35%;">Titres</th>
                                        <th>Numéro d'etudes</th>
                                        <th style="width: 30%;">Auteur(s)</th>
                                        <th style="width: 15%;">Documents</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: left;">
                                    @foreach ($gouvernances as $gouvernances_items)
                                        <tr>
                                            <td>
                                                {{ $gouvernances_items->titres }}
                                            </td>
                                            <td>
                                                {{ $gouvernances_items->numero }}
                                            </td>
                                            <td>
                                                {{ $gouvernances_items->auteurs }}
                                            </td>
                                            <td>
                                                <a href="{{ asset('PDF/Gouvernances/' . $gouvernances_items->documents) }}"
                                                    target="_blank">
                                                    <i class="fa fa-upload"></i>
                                                    <strong style="font-size: 15px;">
                                                        Télécharger
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination d-flex justify-content-center">
                {!! $gouvernances->links() !!}
            </div>

            <div id="social-links" class="mb-2">
                <ul style="display:inline; ">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.citoyennete.index') }}"
                            class="social-button" id=""><span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.citoyennete.index') }}"
                            class="social-button" id=""><span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.citoyennete.index') }}"
                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ route('labo.front.citoyennete.index') }}" class="social-button"
                            id=""><span class="fab fa-whatsapp"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
