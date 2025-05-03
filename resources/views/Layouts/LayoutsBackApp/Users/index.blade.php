@extends('Layouts.LayoutsBackApp.layoutbackapp')
@section('title', 'Liste des utilisateurs')
@section('content')
    @include('Layouts.LayoutsBackApp.headers.navbar.navbar')
    @include('Layouts.LayoutsBackApp.headers.sidebar.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-weight: 800">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li style="font-weight: 800;" class="breadcrumb-item"><a
                                    href="{{ route('labo.back.index') }}">Accueil</a>
                            </li>
                            <li style="font-weight: 800; text-light" class="breadcrumb-item active">
                                Paramètres
                            </li>
                            <li style="font-weight: 800;" class="breadcrumb-item active">
                                @yield('title')
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
                        <a onclick="createRecord('{{ route('labo.back.users.create') }}')" title="Nouvel utilisateur" class="btn"
                            style="background-color: #ff6902; color: #fff;">
                            <i class="fa fa-plus-circle"></i><strong>Nouveau</strong>
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
                                                <th>Nom(s)</th>
                                                <th>Prénom(s)</th>
                                                <th>Pseudonymes</th>
                                                <th>Rôle</th>
                                               {{--  <th>Status</th> --}}
                                               {{--  <th>Soumis par</th> --}}
                                                <th>Date création</th>
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
            ajax: '{{ route('labo.back.users.datatables') }}',

            columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'surname',
                    name: 'surname'
                },
                {
                    data: 'nickname',
                    name: 'nickname'
                },
                {
                    data: 'Role_name',
                    name: 'Role_name',
                    render: function render(data, type, full, meta) {
                    var status = ' ';
                    var label;

                    if (data == 'superadministrateur')
                    {
                        var value = 'superadministrateur';
                    }
                    if (data == 'administrateur')
                    {
                        var value = 'administrateur';
                    }
                    if (data == 'visiteur')
                    {
                        var value = 'visiteur';
                    }
                    switch (data) {
                        case 'administrateur':
                            label = "bg-danger";
                            break;
                        case 'superadministrateur':
                            label = "bg-success";
                            break;
                        case 'visiteur':
                            label = "bg-primary";
                            break;
                        default:
                            label = "bg-primary";
                    }
                    if (typeof value === 'undefined') {
                        return value;
                    }
                    status = status + ' ' + '<span class="badge text-white ' + label + ' " style="font-size:12px">' + value + '</span>';
                    return status;
                }
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
