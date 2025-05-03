<script src="{{asset('back/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('back/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('back/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('back/dist/js/sweetalert.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('back/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('back/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('back/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('back/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('back/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('back/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('back/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('back/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('back/dist/js/toastr.min.js')}}"></script>
<script src="{{asset('back/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('back/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('back/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('back/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('back/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
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

</script>
