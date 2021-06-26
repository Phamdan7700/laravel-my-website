@include('page.header')
<!-- Trending Area Start -->
<main>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            object-position: top;
        }

    </style>
    @section('slider')

    @show
    
    @section('tinnoibat')
        
    @show
    
    @section('content')

    @show
   
    @section('tintrongtuan')
        
    @show
  

</main>

@include('page.footer')

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src=" {{ asset('page/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src=" {{ asset('page/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/popper.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src=" {{ asset('page/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src=" {{ asset('page/assets/js/owl.carousel.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/slick.min.js') }}"></script>
<!-- Date Picker -->
<script src=" {{ asset('page/assets/js/gijgo.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src=" {{ asset('page/assets/js/wow.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/animated.headline.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Breaking New Pluging -->
<script src=" {{ asset('page/assets/js/jquery.ticker.js') }}"></script>
<script src=" {{ asset('page/assets/js/site.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src=" {{ asset('page/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.nice-select.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src=" {{ asset('page/assets/js/contact.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.form.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.validate.min.js') }}"></script>
<script src=" {{ asset('page/assets/js/mail-script.js') }}"></script>
<script src=" {{ asset('page/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src=" {{ asset('page/assets/js/plugins.js') }}"></script>
<script src=" {{ asset('page/assets/js/main.js') }}"></script>

</body>

</html>
