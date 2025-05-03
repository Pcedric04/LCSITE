<script src="{{ asset('Back/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('Front/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('Front/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('Front/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('Front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Front/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="{{ asset('Front/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('Back/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('Back/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/holderjs@2.9.4/holder.js"></script>
<script>
    const flashMessage = document.querySelector('.flash-message');
    const flashMessageList = document.querySelector('.flash-message__list');
    let currentIndex = 0;
    setInterval(function() {
        flashMessageList.style.transform = `translateY(-${currentIndex * 200}px)`;
        currentIndex = (currentIndex + 1) % flashMessageList.children.length;
    }, 3000);
</script>
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
