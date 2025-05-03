<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Front/img/favicon_1.png') }}">
    <title>
        @yield('title')
    </title>
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/dropzone/min/dropzone.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/summernote/summernote.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/codemirror/theme/monokai.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/plugins/simplemde/simplemde.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="{{asset('Back/dist/css/toastr.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('back/plugins/daterangepicker/daterangepicker.css')}}">
</head>
