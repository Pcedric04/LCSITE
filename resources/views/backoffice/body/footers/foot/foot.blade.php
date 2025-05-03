<script src="{{asset('Back/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('Back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Back/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('Back/dist/js/sweetalert.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('Back/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('Back/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('Back/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('Back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Back/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('Back/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('Back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Back/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('Back/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('Back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('Back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('Back/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('Back/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('Back/dist/js/toastr.min.js')}}"></script>
<script src="{{asset('Back/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('Back/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('Back/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('Back/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('Back/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script>
    $(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });
    });
    $(document).ready(function($) {
        var barChartCanvas = $('#barChart1').get(0).getContext('2d')
        var barChartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Décembre'
            ],
            datasets: [{
                    label: 'Articles',
                    backgroundColor: '#ff6902',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 0, 40, 19, 8, 27, 0, 28, 0, 40, 19, 8]
                },
                {
                    label: 'Demandes',
                    backgroundColor: 'dark',
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

        var barChartCanvas = $('#barChart1').get(0).getContext('2d')
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
    });

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
    });
</script>
