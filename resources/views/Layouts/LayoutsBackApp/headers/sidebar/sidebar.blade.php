<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('labo.back.index') }}" class="brand-link">
        <span class="brand-text font-weight-400"><strong>Labo-Citoyennetés</strong></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Back/dist/img/avatar.png') }}" class="img-circle elevation-2"
                alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if ( Auth::id() == true )
                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                    @endif
                </a>
            </div>
        </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Recherche" aria-label="Recherche">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open" style="background-color: #ff6902;">
                    <a href="{{ route('labo.back.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p style="font-weight: 800;">
                            Accueil
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('labo.back.infos.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.categories.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.souscategories.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.actualites.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.comments.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.agendas.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.actualites.create')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.actualites.show')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.Videos.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.albums.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.albums.create')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.audios.index')? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p style="font-weight: 800;">
                            Gestions du site
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('labo.back.infos.index') }}"
                            class="nav-link {{ Request::routeIs('labo.back.infos.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Flash infos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.categories.index') }}"
                            class="nav-link {{ Request::routeIs('labo.back.categories.index')? 'active' : '' }}
                            {{ Request::routeIs('labo.back.souscategories.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Catégories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.actualites.index') }}"
                            class="nav-link
                            {{ Request::routeIs('labo.back.actualites.index')? 'active' : '' }}
                            {{ Request::routeIs('labo.back.actualites.create')? 'active' : '' }}
                            {{ Request::routeIs('labo.back.actualites.show')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.comments.index') }}"
                            class="nav-link
                            {{ Request::routeIs('labo.back.comments.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Commentaires</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.agendas.index') }}"
                            class="nav-link
                            {{ Request::routeIs('labo.back.agendas.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Agendas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::routeIs('labo.back.Videos.index')? 'menu-open' : '' }}
                                {{ Request::routeIs('labo.back.albums.index')? 'menu-open' : '' }}
                                {{ Request::routeIs('labo.back.albums.create')? 'menu-open' : '' }}
                                {{ Request::routeIs('labo.back.audios.index')? 'menu-open' : '' }}">
                                    <i class="nav-icon"></i>
                                    <p style="font-weight: 800;">Médias</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('labo.back.Videos.index') }}"
                                        class="nav-link {{ Request::routeIs('labo.back.Videos.index')? 'active' : '' }}">
                                        <i class="nav-icon"></i>
                                        <p style="font-weight: 800;">Vidéos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('labo.back.albums.index') }}"
                                    class="nav-link {{ Request::routeIs('labo.back.albums.index')? 'active' : '' }}
                                    {{ Request::routeIs('labo.back.albums.create')? 'active' : '' }}">
                                        <i class="nav-icon"></i>
                                        <p style="font-weight: 800;">Albums</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('labo.back.audios.index') }}"
                                    class="nav-link {{ Request::routeIs('labo.back.audios.index')? 'active' : '' }}">
                                        <i class="nav-icon"></i>
                                        <p style="font-weight: 800;">Audios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::routeIs('labo.back.projets.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.publications.index')? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p style="font-weight: 800;">
                            Projets/Publications
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('labo.back.projets.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.projets.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Projets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.publications.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.publications.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Publications</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::routeIs('labo.back.capitalisations.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.gouvernances.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.etudes.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.fiches.index')? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-binoculars"></i>
                        <p style="font-weight: 800;">
                            Recherches Etudes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('labo.back.capitalisations.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.capitalisations.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Rapport-Capitalisations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.gouvernances.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.gouvernances.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Gouvernance-Citoyennétés</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.etudes.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.etudes.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Etudes-Recit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.fiches.index') }}" class="nav-link
                            {{ Request::routeIs('labo.back.fiches.index')? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Fiches-Outils</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::routeIs('labo.back.users.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.roles.index')? 'menu-open' : '' }}
                                    {{ Request::routeIs('labo.back.permissions.index')? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p style="font-weight: 800;">
                            Paramètres
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('labo.back.users.index') }}"
                                class="nav-link {{ Request::routeIs('labo.back.users.index') ? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Utilisateurs</p>
                                <span class="badge badge-info right"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.roles.index') }}"
                                class="nav-link {{ Request::routeIs('labo.back.roles.index') ? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Rôles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labo.back.permissions.index') }}"
                                class="nav-link {{ Request::routeIs('labo.back.permissions.index') ? 'active' : '' }}">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Journalisation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Régions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Provinces</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon"></i>
                                <p style="font-weight: 800;">Communes</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
