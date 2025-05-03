@extends('layouts.backapplayouts')
@section('title', 'Liste des publications-Labo Citoyennetés')
@section('content')
@include('backoffice.back.headers.navbar.navbar')
@include('backoffice.back.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">Liste des publications</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a
                                    href="{{ route('labo.back.index') }}">Accueil</a>
                            </li>
                            <li style="font-weight: 800; text-light" class="breadcrumb-item active">
                                Gestion du site
                            </li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">
                                Liste des publications
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-lg-12">
                        <a onclick="createRecord('{{ route('labo.back.publications.create') }}')" title="Nouveau rapport" class="btn"
                            style="background-color: #ff6902; color: #fff;">
                            <i class="fa fa-plus-circle"></i><strong>Nouvelle publication</strong>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-row">
                            <div class="card-header" style="background-color: #ff6902;">

                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="examples" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Page de couverture</th>
                                                <th>Titre</th>
                                                <th>Pays</th>
                                                <th>Status</th>
                                                <th>Soumis par</th>
                                                <th>Date de création</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="africa-modal-container">

            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script>
        $('#examples').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'serverSide': false,

            language: {
                processing: "Traitement en cours...",
                search: "Recherche &nbsp; :",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "<<",
                    previous: "Précédent",
                    next: "Suivant",
                    last: ">>"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            ajax: '{{ route('labo.back.publications.datatables') }}',

            columns: [
                {
                    data: 'couverture',
                    name: 'couverture',
                    render: function render(data, type, full, meta) {
                         var files = '{!! asset('front/Couverture/') !!}';
                         return '<div class="d-flex flex-wrap align-items-center">' +
                            '<div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">' +
                            '<div class="symbol-label">' +
                            '<img alt="couverture" src="' + files + '/' + data + '" style="width: 80px; height: 60px;" />' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'pays',
                    name: 'pays'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                    if (data == 'En ligne') {
                            var value = 'En ligne';
                        } else {
                            var value = 'Hors ligne';
                        }
                        switch (data) {
                            case 'Hors ligne':
                                label = "bg-danger";
                                break;
                            case 'En ligne':
                                label = "bg-success";
                                break;
                            default:
                                label = "bg-primary";
                        }
                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="badge text-white ' + label +
                            ' " style="font-size:12px">' + value + '</span>';
                        return status;
                    }
                },
                {
                    data: 'nickname',
                    name: 'nickname'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'actions',
                    name: 'actions'
                },
            ],
            order: [
                [0, 'desc']
            ]
        }).buttons().container().appendTo('#examples_wrapper .col-md-6:eq(0)');
    </script>
@endsection
