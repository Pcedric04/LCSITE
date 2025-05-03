@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Publications-Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.publicationbanner')
    <!--Decentralisation Start -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 100%;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                    'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Publications</h1>
            </div>
            <div class="col-lg-12 col-md-12 mb-3">
                <div class="row">
                    <div class="responsive">
                        <div class="img-fluid">
                            <table class="table table-striped">
                                <thead style="color: #ff6902; text-align: center;">
                                    <tr>
                                        <th style="width: 50px">Page de couverture</th>
                                        <th>Titre de publication</th>
                                        <th>Pays</th>
                                        <th>Date de publication</th>
                                        <th>Télécharger</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @foreach ($publications as $publications_items)
                                        <tr>
                                            <td><strong><img width="60"
                                                        src="{{ asset('Couverture/' . $publications_items->couverture) }}"
                                                        alt=""></strong></td>
                                            <td><strong>{{ $publications_items->name }}</strong></td>
                                            <td><strong>{{ $publications_items->pays }}</strong></td>
                                            <td><strong>{{ $publications_items->created_at }}</strong></td>
                                            <td><a href="{{ asset('PDF/Publications/' . $publications_items->documents) }}"
                                                    target="_blank"><i class="fa fa-upload"></i>Télécharger</a></td>
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
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('labo.front.publications.index') }}"
                            class="social-button" id=""><span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('labo.front.publications.index') }}"
                            class="social-button" id=""><span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('labo.front.publications.index') }}"
                            class="social-button" id=""><span class="fab fa-linkedin"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ route('labo.front.publications.index') }}" class="social-button"
                            id=""><span class="fab fa-whatsapp"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
