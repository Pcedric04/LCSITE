<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="font-weight: 800;">
            <a href="{{ route('labo.back.index') }}" class="nav-link">Accueil</a>
        </li>
{{--         <li class="nav-item d-none d-sm-inline-block" style="font-weight: 800;">
            <a href="{{ route('labo.users.logout') }}" class="nav-link" style="color: red;"><i
                    class="fa fa-sign-out-alt"></i> Déconnexion</a>
        </li> --}}
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('back/admin/profil/'.$photo) }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ Auth::user()->name}} {{ Auth::user()->surname }}
                            </h3>
                            <span style="color:rgb(2, 255, 86);text-transform: uppercase; font-size: 12px; ">
                                {{  Auth::user()->roles()->pluck('name')->implode(', ')}}
                            </span>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('labo.back.profil.index') }}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Mon Profil
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Mes Favoris
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div> --}}
                <a href="{{ route('labo.users.logout') }}" class="dropdown-item dropdown-footer" style="color: red;">Déconnexion</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
