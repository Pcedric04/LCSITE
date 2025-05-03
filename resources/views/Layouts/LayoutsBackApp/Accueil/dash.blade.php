@extends('Layouts.LayoutsBackApp.layoutbackapp')
@section('title', 'Tableau de bord | Labo Citoyennetés')
@section('content')
@include('Layouts.LayoutsBackApp.headers.navbar.navbar')
@include('Layouts.LayoutsBackApp.headers.sidebar.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
        <!-- /.content-header -->

        <!-- Main content -->
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
                            <a href="#" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #ff6902;" >
                            <div class="inner">
                                <h3 style="font-weight: 800; color: #fff;">{{ $visitorCount }}</h3>

                                <p style="font-weight: 800; color: #fff;">Total des visites</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Détails<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
     {{--    <div class="row"> --}}
       {{--  <section class="col-lg-6 col-sm-6 connectedSortable">
            <div class="row">
                <div class="col-lg-12">
                    <!-- BAR CHART -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Statistique mensuelle</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart1"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                </canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section> --}}
        <section class="col-lg-6 col-sm-6 content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <div class="col-lg-12">
                    <!-- BAR CHART -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Statistiques / Mois</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart2"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                </canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            </div>
        </section>
 {{--    </div> --}}
    </div>
    <!-- /.content-wrapper -->
@endsection
