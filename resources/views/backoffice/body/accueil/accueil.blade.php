@extends('layouts.backapplayouts')
@section('title', 'Tableau de bord-Laboratoire-Citoyennetés')
@include('backoffice.back.headers.navbar.navbar')
@include('backoffice.back.headers.sidebar.sidebar')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">Tableau de bord</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a href="{{ route('labo.back.index') }}">Accueil</a></li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #343a40;" >
                            <div class="inner">
                                <h3 style="font-weight: 800; color: #fff;">0{{ $countFlash }}</h3>

                                <p style="font-weight: 800; color: #fff;">Total flash infos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            @role(['superadministrateur','administrateur'])
                            <a href="{{ route('labo.back.infos.index') }}" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #ff6902;" >
                            <div class="inner">
                                <h3 style="font-weight: 800; color: #fff;">0{{ $countUser }}</h3>

                                <p style="font-weight: 800; color: #fff;">Total des comptes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @role(['superadministrateur','administrateur'])
                            <a href="{{ route('labo.back.users.index') }}" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #343a40;" >
                            <div class="inner">
                                <h3 style="font-weight: 800; color: #fff;">0{{ $countArticles }}</h3>

                                <p style="font-weight: 800; color: #fff;">Total articles</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            @role(['superadministrateur','administrateur'])
                            <a href="{{ route('labo.back.actualites.index') }}" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #ff6902;" >
                            <div class="inner">
                                <h3 style="font-weight: 800; color: #fff;">0{{ $visitorCount }}</h3>

                                <p style="font-weight: 800; color: #fff;">Total des visites</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            @role(['superadministrateur','administrateur'])
                            <a href="#" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <div class="col-lg-12">
            <div class="row">
                <section class="col-lg-6 col-sm-6 connectedSortable">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Articles/Visites/Mois</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                    </canvas>
                                </div>
                            </div>
                        </div>
                </section>
                <section class="col-lg-6 col-sm-6 connectedSortable">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Statistique Annuelle</h3>
                        </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="myChart2"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                    </canvas>
                                </div>
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('front/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables
.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Articles',
                    data: {!! json_encode($data) !!},
                    backgroundColor: '#ff6902',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
                }
            }

        });
    });


    $(document).ready(function() {
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelsYear) !!},
                datasets: [{
                    label: 'Articles',
                    data: {!! json_encode($dataYear) !!},
                    backgroundColor: '#ff6902',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
                }
            }

        });
    });
</script>

