<div class="container-fluid text-white d-none d-lg-flex" style="background-color: #ff6903;">
    <div class="container-fluid" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
        <div class="d-flex align-items-center">
            <h2 class="text-white fw-bold align-items-center" style=" font-size: 15px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <p style="font-size: 14px; text-align:center;">ACE-RECIT
                    <img src="{{ asset('Front/img/icon/icone.svg') }}" alt="" style="display: inline;width: 40px;">
                </p>
                <form action="{{ route('labo.front.search.index') }}" method="GET" class="navbar-form" >
                    <div class="input-group add-on">
                    <input type="text" class="form-control" placeholder="Rechercher" name="query" id="query" >
                    <div class="input-group-btn">
                        <button class="btn btn-primary" style="height: 105%;" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </form>
            </h2>
            <div class="ms-4 d-flex align-items-center">
                <small class="ms-4" style="font-size: 14px;">
                    <ul style="list-style: none;">
                        <li>
                            <strong>Modes de gouvernance</strong>
                        </li>
                        <li>
                            <strong>Démocratie locale et Participation citoyenne</strong>
                        </li>
                        <li class="mb-2">
                            <strong>Plaidoyer Politique</strong>
                        </li>
                        <p style="text-decoration: none;" style="font-size: 13px;">
                            <a class="btn-sm btn-dark" href="{{ route('labo.front.zone.burkina.index') }}"
                                >Burkina-Faso</a>
                            <a class="btn-sm btn-dark" href="{{ route('labo.front.zone.benin.index') }}"
                                >Benin</a>
                            <a class="btn-sm btn-dark" href="{{ route('labo.front.zone.niger.index') }}"
                                >Niger</a>
                        </p>
                    </ul>
                </small>
                <small class="ms-4" style="font-size: 14px;">
                    <i class="fa fa-map-marker-alt me-1"></i><strong>Ouagadougou, BURKINA-FASO
                    </strong>
                    <br>
                    <i class="fa fa-envelope me-1"></i><strong>burkina@laboratoire-citoyennetes.org
                    </strong>
                    <br>
                    <i class="fa fa-phone-alt me-1"></i><strong>+226 25 36 90 47
                    </strong>
                </small>
                <small class="ms-2" style="font-size: 14px;">
                    <ul style="list-style-type: none;">
                        <li  class="mb-2">
                            <a href="http://webmail.laboratoire-citoyennetes.org/" style="color: #fff;"><i class="fa fa-envelope"></i><strong> Webmail</strong></a>
                        </li>
                        <li>
                            <a href="https://intranet.laboratoire-citoyennetes.org/" class="mb-2" style="color: #fff;"><i class="fa fa-lock"></i><strong> Intranet</strong></a>
                        </li>
                    </ul>
                </small>
                <div class="ms-4 d-flex">
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" target="_blank"
                        href="https://www.facebook.com/LaboCitoyennetes"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" target="_blank"
                        href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" target="_blank"
                        href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@if (empty($message) || $message->count() == 0)
    @else
        @include('Layouts.LayoutsFrontApp.Flash.flashinfo', ['message' => $message])
    @endif
<div class="bg-white sticky-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <a href="{{ route('labo.index') }}" class="navbar-brand">
                <img src="{{ asset('Front/img/LOGO-LC-couleur.jpg') }}" alt="Logo labo citoyenneté"
                    style=" height: 55px; margin-right: 1px;">
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('labo.index') }}" class="nav-item nav-link p-3 active">Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link p-3 dropdown-toggle" data-bs-toggle="dropdown">L'Association</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="{{ route('labo.front.mot.index') }}" class="dropdown-item">Mot de Bienvenue</a>
                            <a href="{{ route('labo.front.histoire.index') }}" class="dropdown-item">Historique</a>
                            <a href="{{ route('labo.front.dynamique.index') }}" class="dropdown-item">Dynamique</a>
                            <a href="{{ route('labo.front.organigramme.index') }}"
                                class="dropdown-item">Organigramme</a>
                            <a href="{{ route('labo.front.conseil.index') }}" class="dropdown-item">Conseil
                                d'Administration</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link p-3 dropdown-toggle" data-bs-toggle="dropdown">Programmes</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="{{ route('labo.front.decentralise.index') }}"
                                class="dropdown-item">Décentralisation, Démocratie locale et Participation citoyenne</a>
                            <a href="{{ route('labo.front.egouvernance.index') }}" class="dropdown-item">E-gouvernance
                                et Multimédia</a>
                            <a href="{{ route('labo.front.egouvernanceEco.index') }}" class="dropdown-item">Gouvernance
                                économique et financière</a>
                            <a href="{{ route('labo.front.securite.index') }}" class="dropdown-item">Sécurité</a>
                            <a href="{{ route('labo.front.transfontalier.index') }}"
                                class="dropdown-item">Transfontalier et migration</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link p-3 dropdown-toggle" data-bs-toggle="dropdown">Recherches
                            Etudes</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="{{ route('labo.front.capitalisation.index') }}" class="dropdown-item">Rapports
                                Capitalisation</a>
                            <a href="{{ route('labo.front.citoyennete.index') }}" class="dropdown-item">Gouvernance
                                et
                                Citoyennétés</a>
                            <a href="{{ route('labo.front.etude.index') }}" class="dropdown-item">Etudes RECIT</a>
                            <a href="{{ route('labo.front.outil.index') }}" class="dropdown-item">Fiches outils</a>
                        </div>
                    </div>
                    <a href="{{ route('labo.front.plaidoyer.index') }}" class="nav-item nav-link p-3">Plaidoyer
                        Politique</a>
                    <a href="{{ route('labo.front.publications.index') }}" class="nav-item nav-link p-3">Publications</a>
                    {{-- @role(['visiteur'])
                        <div class="nav-item dropdown navbar-nav ml-4 nav-flex-icons">
                            <a href="#" class="nav-link p-3 dropdown-toggle avatar" data-bs-toggle="dropdown">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    class="rounded-circle z-depth-0" alt="avatar image" height="35">
                                Profil
                            </a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="{{ route('labo.front.users.profil') }}" class="dropdown-item">Voir mon
                                    profil</a>
                                <a href="{{ route('labo.front.egouvernance.index') }}" class="dropdown-item">Modifier mon
                                    profil</a>
                                <a href="{{ route('labo.front.users.logout') }}" class="dropdown-item">Déconnexion</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('labo.front.users.index') }}" class="nav-item nav-link p-3"><i
                                class="fa fa-user"></i> Se connecter</a>
                    @endrole --}}
                   {{--  <a href="" class="nav-item nav-link p-3">

                    </a> --}}
                </div>
            </div>
        </nav>
    </div>
</div>
