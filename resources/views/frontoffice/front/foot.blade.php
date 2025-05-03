<!-- Javascript Files
  ================================================== -->

<!-- initialize jQuery Library -->
<script src="{{ asset('front/plugins/jQuery/jquery.min.js') }}"></script>
<!-- Bootstrap jQuery -->
<script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
<!-- Slick Carousel -->
<script src="{{ asset('front/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('front/plugins/slick/slick-animation.min.js') }}"></script>
<!-- Color box -->
<script src="{{ asset('front/plugins/colorbox/jquery.colorbox.js') }}"></script>
<!-- shuffle -->
<script src="{{ asset('front/plugins/shuffle/shuffle.min.js') }}" defer></script>

{{-- <!-- Google Map API Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<!-- Google Map Plugin-->
<script src="{{ asset('front/plugins/google-map/map.js') }}" defer></script> --}}

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/rowgroup/1.3.1/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.4.2/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
<!-- Template custom -->
<script src="{{ asset('back/dist/js/toastr.min.js')}}"></script>
<script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('back/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('back/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('front/js/script.js') }}"></script>
<script>
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
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
        const flashMessages = document.querySelectorAll(".flash-message");
        let currentIndex = 0;

        function showMessage(index) {
            flashMessages[index].style.display = "block";
            flashMessages[index].style.opacity = "1";
            setTimeout(() => {
                flashMessages[index].style.opacity = "0";
                setTimeout(() => {
                    flashMessages[index].style.display = "none";
                    currentIndex = (index + 1) % flashMessages.length;
                    showMessage(currentIndex);
                }, 500); // Délai entre l'affichage et la disparition du message (en millisecondes)
            }, 3000); // Durée d'affichage du message (en millisecondes)
        }

        if (flashMessages.length > 0) {
            showMessage(currentIndex);
        }
    });
</script>
