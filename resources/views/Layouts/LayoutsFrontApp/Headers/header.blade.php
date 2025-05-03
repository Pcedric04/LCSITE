<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
{{--     <meta property="og:title" content="boutons de partage de réseaux sociaux Labo.test"/>
    <meta property="og:image" content="lien de l'image de votre site"/>
    <meta property="og:url " content="www.labotest.africaimmo.fr"/>
    <meta property="og:description" content="Partage des réseaux sociaux"/> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Front/img/favicon_1.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('Front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Front/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('Front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Front/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Front/lib/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
    #social-links ul{
         padding-left: 0;
    }
    #social-links ul li {
         display: inline-block;
    }
    #social-links ul li a {
         padding: 6px;
         margin: 1px;
         font-size: 18px;
    }
    #social-links .fa-facebook{
          color: #0d6efd;
    }
    #social-links .fa-twitter{
          color: deepskyblue;
    }
    #social-links .fa-linkedin{
          color: #0e76a8;
    }
    #social-links .fa-whatsapp{
         color: #25D366
    }
    #social-links .fa-reddit{
         color: #FF4500;;
    }
    #social-links .fa-telegram{
         color: #0088cc;
    }
    </style>
</head>
