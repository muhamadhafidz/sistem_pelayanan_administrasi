<!-- Main jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<!-- Map Js -->
<script src="{{ asset('assets/plugins/google-map/gmap3.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwIQh7LGryQdDDi-A603lR8NqiF3R_ycA"></script>

<script src="{{ asset('assets/js/form/contact.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

<script>
    $(document).ready(function(){
        cekNavbarPotition(window)
        $(window).scroll(function (event) {
            cekNavbarPotition(window)
        });

        function cekNavbarPotition(window) {
            var scroll = $(window).scrollTop();
            if (scroll >= 256) {
                $('#navbar-scroll').addClass('fixed-top rounded-0');
                $('#navbar-scroll-logo').addClass('d-block');
                $('#navbar-scroll-logo').removeClass('d-none');
                $('#navbar-scroll').attr('style', 'background-color: #7f9dbd!important');
            }else{
                $('#navbar-scroll').removeClass('fixed-top rounded-0');
                $('#navbar-scroll-logo').removeClass('d-block');
                $('#navbar-scroll-logo').addClass('d-none');
                $('#navbar-scroll').removeAttr('style');
            }
        }
    });
</script>