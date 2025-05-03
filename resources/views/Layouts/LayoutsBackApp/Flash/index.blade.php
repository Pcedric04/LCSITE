@extends('Layouts.LayoutsBackApp.layoutbackapp')
@section('title', 'Flash informations | Labo Citoyennetés')
@section('content')
    @include('Layouts.LayoutsBackApp.headers.navbar.navbar')
    @include('Layouts.LayoutsBackApp.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">Flash informations</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a
                                    href="{{ route('labo.back.index') }}">Accueil</a>
                            </li>
                            <li style="font-weight: 800; text-light" class="breadcrumb-item active">
                                Gestion du site
                            </li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">
                                Flash informations
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a onclick="createRecord('{{ route('labo.back.infos.create') }}')" title="Nouveau" class="btn"
                            style="background-color: #ff6902; color: #fff;">
                            <i class="fa fa-plus-circle"></i><strong>Nouveau flash information</strong>
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
                                                <th style="width: 35%;">Titre flash informations</th>
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
        ajax: '{{ route('labo.back.infos.datatables') }}',

        columns: [{
                data: 'infosflash',
                name: 'infosflash'
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
                data: 'users_name',
                name: 'users_name'
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
