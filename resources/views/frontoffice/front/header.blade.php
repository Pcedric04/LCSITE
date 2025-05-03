<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <ul class="top-info text-center text-md-left">
                    <li class="info-text" style="text-align:center;">ACE-RECIT
                        <img src="{{ asset('front/public/images/icon-image/icone.svg') }}" alt=""
                            style="display: inline;width: 25px;">
                    </li>

                    <li><i class="fas fa-map-marker-alt"></i>
                        <p class="info-text">Ouagadougou, BURKINA-FASO</p>
                    </li>
                    <li><i class="fas fa-envelope"></i>
                        <p class="info-text"><a href="http://webmail.laboratoire-citoyennetes.org/"
                                target="_blank">Webmail</a></p>
                    </li>
                    <li><i class="fas fa-lock"></i>
                        <p class="info-text"><a href="https://intranet.laboratoire-citoyennetes.org/"
                                target="_blank">Intranet</a></p>
                    </li>
                    <li>
                        <p class="text"><a style="color: black;"
                                href="{{ route('labo.front.zone.burkina.index') }}">Burkina-Faso</a></p>
                    </li>
                    <li>
                        <p class="text"><a style="color: black;"
                                href="{{ route('labo.front.zone.benin.index') }}">Bénin</a></p>
                    </li>
                    <li>
                        <p class="text"><a style="color: black;"
                                href="{{ route('labo.front.zone.niger.index') }}">Niger</a></p>
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-2 col-md-2 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                        <a title="Facebook" href="https://facebbok.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a title="Twitter" href="https://twitter.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="https://instagram.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
@if (count($message) > 0)
<div class="container-fluid">
    <div class="flash-messages">
        @foreach ($message as $messages)
            <div class="flash-message" style="display: none;">
                <strong style="text-transform: capitalize; font-weight: 700;font-size: 15px; color: black; background-color: #ff6902;border-radius: 2px 2px;">
                Flash infos:</strong>
            @if ($messages->liens == 'null')
                <a href="#" style="font-weight: 800; font-size: 14px; color: black; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">
                    {{ $messages->infosflash }}
                </a>
            @else
                <a href="{{ $messages->liens }}" style="font-weight: 800; font-size: 14px;color: black;font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">
                    {{ $messages->infosflash }}
                </a>
            @endif
            </div>
        @endforeach
    </div>
</div>
@endif

<style>
/* CSS styles for flash messages */
.flash-messages {
    display: flex;
    flex-direction: row;
    overflow: hidden;
}

.flash-message {
    margin-right: 10px;
    opacity: 0;
    animation: showAndHide 5s linear infinite;
}

@keyframes showAndHide {
    0% { opacity: 0; transform: translateX(-100%); }
    10% { opacity: 1; transform: translateX(0); }
    90% { opacity: 1; transform: translateX(0); }
    100% { opacity: 0; transform: translateX(100%); }
}
</style>
<!--/ Topbar end -->
{{-- <header id="header" class="header-two">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-2">
                        <center>
                            <a class="d-block" href="{{ route('labo.index') }}">
                                <img loading="lazy" src="{{ asset('front/public/images/logo.png') }}"
                                    alt="Laboratoire-citoyennétés">
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> --}}
<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-2">
                        <a class="d-block" href="{{ route('labo.index') }}">
                            <img loading="lazy" src="{{ asset('front/public/images/logo.png') }}"
                                alt="Laboratoire-citoyennétés">
                        </a>
                    </div>

                    <div class="col-lg-10 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-subtitle">Modes de gouvernance</p>
                                        <p class="info-box-subtitle">Démocratie locale et Participation citoyenne</p>
                                        <p class="info-box-subtitle">Plaidoyer Politique</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Standard</p>
                                        <p class="info-box-subtitle">(+226) 25-36-90-47 </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Adresse Electronique</p>
                                        <p class="info-box-subtitle">burkina@laboratoire-citoyennetes.org</p>
                                    </div>
                                </div>
                            </li>
                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item dropdown active">
                                    <a href="{{ route('labo.index') }}" class="nav-link">Accueil </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">L'Association <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('labo.front.mot.index') }}">Mot du president</a></li>
                                        <li><a href="{{ route('labo.front.histoire.index') }}">Historique</a></li>
                                        <li><a href="{{ route('labo.front.dynamique.index') }}">Dynamique</a></li>
                                        <li><a href="{{ route('labo.front.organigramme.index') }}">Organigramme</a>
                                        </li>
                                        <li><a href="{{ route('labo.front.conseil.index') }}">Conseil
                                                d'administration</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Programmes <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('labo.front.decentralise.index') }}">Décentralisation,
                                                Démocratie locale et Participation citoyenne</a></li>
                                        <li><a href="{{ route('labo.front.egouvernance.index') }}">E-gouvernance et
                                                Multimédia</a></li>
                                        <li><a href="{{ route('labo.front.egouvernanceEco.index') }}">Gouvernance
                                                économique et financière</a></li>
                                        <li><a href="{{ route('labo.front.securite.index') }}">Sécurité</a></li>
                                        <li><a href="{{ route('labo.front.transfontalier.index') }}">Transfontalier et
                                                migration</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Recherches Etudes <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('labo.front.capitalisation.index') }}">Rapports
                                                Capitalisation</a></li>
                                        <li><a href="{{ route('labo.front.citoyennete.index') }}">Gouvernance et
                                                Citoyennétés</a></li>
                                        <li><a href="{{ route('labo.front.etude.index') }}">Etudes RECIT</a></li>
                                        <li><a href="{{ route('labo.front.outil.index') }}">Fiches outils</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="{{ route('labo.front.plaidoyer.index') }}" class="nav-link">Plaidoyer
                                        Politique </i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ route('labo.front.publications.index') }}"
                                        class="nav-link">Publications </i></a>
                                </li>

                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('labo.front.contact.index') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
            <div class="nav-search">
                <span id="search"><i class="fa fa-search"></i></span>
            </div><!-- Search end -->
            <form action="{{ route('labo.front.search.index') }}" method="GET" class="navbar-form">
                <div class="search-block" style="display: none;">
                    <label for="search-field" class="w-100 mb-0">
                        <input type="text" class="form-control" placeholder="Rechercher" name="query"
                            id="query">
                    </label>
                    <span class="search-close">&times;</span>
                </div><!-- Site search end -->
            </form>
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->
