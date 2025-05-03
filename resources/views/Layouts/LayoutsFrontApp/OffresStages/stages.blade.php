@extends('Layouts.LayoutsFrontApp.layoutfrontapp')
@section('title', 'Emplois et Stages | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsFrontApp.Banner.stagebanner')
    <!--Decentralisation Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0" style="max-width: 100%;">
                <h1 class="display-5 mb-5"
                    style="color: #ff6902; font-family: 'Lucida Sans', 'Lucida Sans Regular',
                    'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Emplois et Stages</h1>
            </div>
            <div class="col-lg-12 col-md-6">
                <div class="row g-4">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead style="color: #ff6902; text-align: center;">
                                            <tr>
                                                <th>Titres</th>
                                                <th>Description</th>
                                                <th>Mandataires</th>
                                                <th>Date</th>
                                                <th>Télécharger</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <td><strong>Avis de récrutement d'un(e) stagiaire</strong></td>
                                                <td><strong>Récherche de stagiaire pour le compte de la
                                                        comptabilité..</strong></td>
                                                <td><strong>LC</strong></td>
                                                <td><strong>Du <span style="color: green;">02-02-2023</span> au <span
                                                            style="color: red;">31-02-2023</span></strong></td>
                                                <td><a href="#"><i
                                                            class="fa fa-upload"></i><strong>Télécharger</strong></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Decentralisation End -->
@endsection
