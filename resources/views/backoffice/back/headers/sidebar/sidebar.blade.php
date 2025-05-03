<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('labo.back.index') }}" class="brand-link">
        <span class="brand-text font-weight-400"><strong>Labo-Citoyennetés</strong></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('back/admin/profil/'.$photo) }}" class="img-circle elevation-2"
                alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if ( Auth::id() == true )
                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                    @endif
                </a>
                <span style="color: #ff6902;text-transform: uppercase; font-size: 12px; ">{{  Auth::user()->roles()->pluck('name')->implode(', ')}}</span>
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
                        @permission(['flash-index','posts-index','comments-index','agendas-index','messages-index'])
                            <li class="nav-item {{ Request::routeIs('labo.back.infos.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.actualites.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.comments.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.agendas.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.actualites.create')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.actualites.show')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.contact.index')? 'menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p style="font-weight: 800;">
                                        Gestions du site
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @permission('flash-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.infos.index') }}"
                                            class="nav-link {{ Request::routeIs('labo.back.infos.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Flash infos</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('flash-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.slides.index') }}"
                                            class="nav-link {{ Request::routeIs('labo.back.slides.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Slides</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('posts-index')
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
                                    @endpermission
                                    @permission('comments-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.comments.index') }}"
                                            class="nav-link
                                            {{ Request::routeIs('labo.back.comments.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Commentaires</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('agendas-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.agendas.index') }}"
                                            class="nav-link
                                            {{ Request::routeIs('labo.back.agendas.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Agendas</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('messages-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.contact.index') }}"
                                            class="nav-link
                                            {{ Request::routeIs('labo.back.contact.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Messages</p>
                                            </a>
                                        </li>
                                    @endpermission
                                </ul>
                            </li>
                        @endpermission
                        @permission(['videos-index','albums-index','audios-index'])
                            <li class="nav-item {{ Request::routeIs('labo.back.Videos.index')? 'menu-open' : '' }}
                                            {{ Request::routeIs('labo.back.albums.index')? 'menu-open' : '' }}
                                            {{ Request::routeIs('labo.back.albums.create')? 'menu-open' : '' }}
                                            {{ Request::routeIs('labo.back.audios.index')? 'menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-folder"></i>
                                    <p style="font-weight: 800;">Médias</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @permission('videos-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.Videos.index') }}"
                                                class="nav-link {{ Request::routeIs('labo.back.Videos.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Vidéos</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('albums-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.albums.index') }}"
                                            class="nav-link {{ Request::routeIs('labo.back.albums.index')? 'active' : '' }}
                                            {{ Request::routeIs('labo.back.albums.create')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Albums</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('audios-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.audios.index') }}"
                                            class="nav-link {{ Request::routeIs('labo.back.audios.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Audios</p>
                                            </a>
                                        </li>
                                    @endpermission
                                </ul>
                            </li>
                        @endpermission
                        @permission(['projets-index','publications-index'])
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
                                    @permission('projets-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.projets.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.projets.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Projets</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('publications-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.publications.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.publications.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Publications</p>
                                            </a>
                                        </li>
                                    @endpermission
                                </ul>
                            </li>
                        @endpermission
                        @permission(['capitalisations-index','gouvernances-index','etudes-index','fiches-index'])
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
                                    @permission('capitalisations-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.capitalisations.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.capitalisations.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Rapport-Capitalisations</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('gouvernances-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.gouvernances.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.gouvernances.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Gouvernance-Citoyennétés</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('etudes-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.etudes.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.etudes.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Etudes-Recit</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('fiches-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.fiches.index') }}" class="nav-link
                                            {{ Request::routeIs('labo.back.fiches.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Fiches-Outils</p>
                                            </a>
                                        </li>
                                    @endpermission
                                </ul>
                            </li>
                        @endpermission
                        @permission(['users-index','categories-index','roles-index','permissions-index','logs-index','regions-index','provinces-index'])
                            <li class="nav-item {{ Request::routeIs('labo.back.users.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.roles.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.categories.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.souscategories.index')? 'menu-open' : '' }}
                                                {{ Request::routeIs('labo.back.permissions.index')? 'menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-cogs"></i>
                                    <p style="font-weight: 800;">
                                        Paramètres
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @permission('users-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.users.index') }}"
                                                class="nav-link {{ Request::routeIs('labo.back.users.index') ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Utilisateurs</p>
                                                <span class="badge badge-info right"></span>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('roles-restore')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.roles.index') }}"
                                                class="nav-link {{ Request::routeIs('labo.back.roles.index') ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Rôles</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('permissions-restore')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.permissions.index') }}"
                                                class="nav-link {{ Request::routeIs('labo.back.permissions.index') ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Permissions</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('categories-index')
                                        <li class="nav-item">
                                            <a href="{{ route('labo.back.categories.index') }}"
                                            class="nav-link {{ Request::routeIs('labo.back.categories.index')? 'active' : '' }}
                                            {{ Request::routeIs('labo.back.souscategories.index')? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Catégories</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('logs-restore')
                                        <li class="nav-item">
                                            <a href="#"
                                                class="nav-link">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Journalisation</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    {{-- @permission('regions-restore')
                                        <li class="nav-item">
                                            <a href="#"
                                                class="nav-link">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Régions</p>
                                            </a>
                                        </li>
                                    @endpermission
                                    @permission('provinces-restore')
                                        <li class="nav-item">
                                            <a href="#"
                                                class="nav-link">
                                                <i class="nav-icon"></i>
                                                <p style="font-weight: 800;">Provinces</p>
                                            </a>
                                        </li>
                                    @endpermission --}}
                                </ul>
                            </li>
                        @endpermission
                    </ul>
            </nav>
    </div>
</aside>
