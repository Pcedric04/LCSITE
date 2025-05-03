<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    jQuery(function($) {
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400
            });
        });
    });

/*
    $(document).ready(function($) {
        var barChartCanvas = $('#barChart2').get(0).getContext('2d')
        var barChartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Décembre'
            ],
            datasets: [{
                    label: 'Utilisateurs',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 0, 40, 19, 8, 27, 0, 28, 0, 40, 19, 8]
                },
                {
                    label: 'Visiteurs',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [15, 39, 1, 8, 0, 5, 4, 15, 39, 1, 8, 0]
                },
            ]
        }

        var barChartOptions = {
            maintainAspectRatio: false,
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

        var barChartCanvas = $('#barChart2').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, barChartData)
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    }); */

    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
    function matValeur() {
        $("#select3").change(function() {
            var link = "{{ route('labo.back.albums.souscategories', ':id') }}";
            var link = link.replace(":id", $(this).val());
            $.ajax({
                url: link,
                method: 'GET',
                success: function(data) {
                    $('#souscategories').html(data);
                }
            })
        });
    };

    function maRegions() {
        $("#select2").change(function() {
            var link = "{{ route('labo.back.projets.regions', ':id') }}";
            var link = link.replace(":id", $(this).val());
            $.ajax({
                url: link,
                method: 'GET',
                success: function(data) {
                    $('#provinces').html(data);
                }
            })
        });
    };

    function matValeur2() {
        $("#select3").change(function() {
            var link = "{{ route('labo.back.actualites.souscategories', ':id') }}";
            var link = link.replace(":id", $(this).val());
            $.ajax({
                url: link,
                method: 'GET',
                success: function(data) {
                    $('#souscategories').html(data);
                }
            })
        });
    };

    function createRecord(link) {
        $.ajax({
            url: link,
            type: "GET",
            success: function(html) {
                $("#africa-modal-container").html(html);
                $("#africa-modal-container div.modal").modal('toggle');
                var type = html.type;
                var message = html.message;
                switch (type) {
                    case 'info':
                        Swal.fire(message, "", "info");
                        break;
                    case 'warning':
                        Swal.fire("Attention!", message, "warning");
                        break;
                    case 'success':
                        Swal.fire(message, "", "success");
                        break;
                    case 'error':
                        Swal.fire("Attention!", message, "error");
                        break;
                }
            },
            error: function(xhr, status, error) {
                swal("Attention!", error, "error");
            }
        });
    };

    function storeRecord() {
        var form = $('#africa-form-submit');
        $("#africa-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
        $(".error").html("");
        var formNode = document.getElementById('africa-form-submit');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(formNode),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#text-fix').addClass('text-hide');
                $('#text-load').removeClass('text-hide');
                $('#btn-load').removeClass('d-none');
                $('#sender').addClass('enabled');
            },
            success: function(result) {
                $("#africa-form-submit").trigger('reset');
                var type = result.type;
                var message = result.message;
                switch (type) {
                    case 'info':
                        swal(message, "", "info");
                        break;
                    case 'warning':
                        swal("Attention!", message, "warning");
                        break;
                    case 'success':
                        Swal.fire(message, "", "success");
                        break;
                    case 'error':
                        swal("Attention!", message, "error");
                        break;
                }
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#sender').addClass('disabled');
                $('#btn-load').addClass('d-none');
                $('#africa-form-submit').on('submit', function(event) {
                        event.preventDefault();
                        var content = $('#summernote').summernote('contenu');
                        $('#summernote').summernote('reset');
                });
                $('#examples').DataTable().ajax.reload(null, true);
            },
            error: function(xhr, status, error) {
                var response = xhr.responseJSON;
                $.each(response, function(key, value) {
                    $("#africa-modal-container div.modal .form-group." + key + " .form-control")
                        .addClass("is-invalid");
                    $('.' + key + '_err').text(value);
                    $('#text-load').addClass('text-hide');
                    $('#text-fix').removeClass('text-hide');
                    $('#btn-load').addClass('d-none');
                    $('#sender').removeClass('disabled');
                });
            }
        });
    };

    function showRecord(link) {
        $.ajax({
            url: link,
            type: "GET",
            success: function(html) {
                $("#africa-modal-container").html(html);
                $("#africa-modal-container div.modal").modal('toggle');

                var type = html.type;
                var message = html.message;
                switch (type) {
                    case 'info':
                        Swal.fire(message, "", "info");
                        break;
                    case 'warning':
                        Swal.fire("Attention!", message, "warning");
                        break;
                    case 'success':
                        Swal.fire(message, "", "success");
                        break;
                    case 'error':
                        Swal.fire("Attention!", message, "error");
                        break;
                }
            },
            error: function(xhr, status, error) {
                swal("Attention!", error, "error");
            }
        });
    };

    function updateRecord() {
        var form = $('#africa-form-submit');
        $("#africa-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
        $(".error").html("");
        var formNode = document.getElementById('africa-form-submit');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(formNode),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#text-fix').addClass('text-hide');
                $('#text-load').removeClass('text-hide');
                $('#btn-load').removeClass('d-none');
                $('#sender').addClass('disabled');
            },
            success: function(result) {
                $("div.modal").modal('hide');
                var type = result.type;
                var message = result.message;
                switch (type) {
                    case 'info':
                        swal(message, "", "info");
                        break;
                    case 'warning':
                        swal("Attention!", message, "warning");
                        break;
                    case 'success':
                        swal("Succès !", '' + message + '', "success");
                        break;
                    case 'error':
                        swal("Attention!", message, "error");
                        break;
                }
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#sender').addClass('enabled');
                $('#btn-load').addClass('d-none');
                $("#modal").modal('hide');
                $("#modal div.modal").modal('hide');
                $('#examples').DataTable().ajax.reload(null, true);
            },
            error: function(xhr, status, error) {
                var response = xhr.responseJSON;
                $.each(response, function(key, value) {
                    $("#africa-modal-container div.modal .form-group." + key + " .form-control")
                        .addClass("is-invalid");
                    $('.' + key + '_err').text(value);
                    $('#text-load').addClass('text-hide');
                    $('#text-fix').removeClass('text-hide');
                    $('#btn-load').addClass('d-none');
                    $('#sender').removeClass('disabled');
                });
            }
        });
    };

    function deleteRecordConfirm(link) {
        swal({
            title: "Etes-vous sûr de vouloir supprimer?",
            icon: "warning",
            buttons: ["Annuler !", "Oui, supprimer!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                deleteRecord(link);
            } else {}
        });
    };

    function deleteRecord(link) {
        $.ajax({
            url: link,
            type: "DELETE",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "_token": $('#token').val()
            },
            success: function(result) {
                var type = result.type;
                var message = result.message;
                switch (type) {
                    case 'info':
                        swal(message, "", "info");
                        break;
                    case 'warning':
                        swal("Attention!", message, "warning");
                        break;
                    case 'success':
                        swal(message, "", "success");
                        break;
                    case 'error':
                        swal("Attention!", message, "error");
                        break;
                }
                $('#examples').DataTable().ajax.reload(null, true);
            }
        });
    };

    function statusConfirm(link) {
        swal({
            title: "Etes-vous sûr de vouloir changer le status ?",
            text: " ",
            icon: "warning",
            buttons: ["Annuler !", "Oui, changer!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                AccountStatusRecord(link);
            } else {}
        });
    };

    function AccountStatusRecord(link) {
        $.ajax({
            url: link,
            type: "GET",
            data: {
                "_token": $('#token').val()
            },
            success: function(result) {
                var type = result.type;
                var message = result.message;
                switch (type) {
                    case 'info':
                        swal(message, "", "info");
                        break;
                    case 'warning':
                        swal("Attention!", message, "warning");
                        break;
                    case 'success':
                        swal(message, "", "success");
                        break;
                    case 'error':
                        swal("Attention!", message, "error");
                        break;
                }
                $('#examples').DataTable().ajax.reload(null, true);
            }
        });
    };
</script>
