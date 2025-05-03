@extends('Layouts.LayoutsFrontApp.frontappcon')
@section('title', 'Voir mon profil | Labo Citoyennetés')
@section('content')
    <!-- Login Start -->
    <div class="container mb-5">
        <div class="container-xxl mb-5">
            <section style="background-color: #eee;">
                <div class="container py-5">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card mb-4">
                        <div class="card-body text-center">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                          <h5 class="my-3">{{ $user->name }} {{ $user->surname }}</h5>
                          <p class="text-muted mb-1">{{ $user->email }}</p>
                          <p class="text-muted mb-4"><strong> Compte: Visiteur</strong></p>
                          <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn text-white bg-primary ms-1">Mes messages</button>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                          <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fas fa-globe fa-lg text-warning"></i>
                              <p class="mb-0">https://mdbootstrap.com</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                              <p class="mb-0">@mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Nom complet</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $user->name }} {{ $user->surname }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-8">
                              <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <p class="mb-0">Téléphone (Bureau)</p>
                            </div>
                            <div class="col-sm-8">
                              <p class="text-muted mb-0">(+226) 234-5678</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <p class="mb-0">Téléphone (Mobile)</p>
                            </div>
                            <div class="col-sm-8">
                              <p class="text-muted mb-0">(+226) 765-4321</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Adresse</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                              <p class="mb-4"><span class="text-primary font-italic me-1">Statistiques</span> Personnelles</p>
                              <p class="mb-1" style="font-size: .77rem;">Commentaires publiés</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Total messages</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
    <!-- Service End -->
    <!-- Login End -->
@endsection
