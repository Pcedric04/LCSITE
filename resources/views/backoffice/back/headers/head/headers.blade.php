<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon================================================== -->
  <link rel="icon" type="image/png" href="{{ asset('front/public/images/favicon.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/public/images/favicon.png') }}">
    <title>
        @yield('title')
    </title>
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/dropzone/min/dropzone.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/summernote/summernote.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/codemirror/theme/monokai.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('back/dist/css/toastr.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/daterangepicker/daterangepicker.css')}}">
  <style>
    body{
        /* font-family: 'Open Sans', sans-serif; */
    }
    .scroll-container {
        height: 600px; /* Set the desired height of the scroll container */
        overflow-y: scroll; /* Enable vertical scrolling */
        /* Optional: Add a border for visual distinction */
    }

    .scroll-content {
        /* Optional: Add padding or margin to the content for spacing */
    }
</style>

</head>
