<script src="./language/js/jquery.js"></script>
<script src="./language/js/bootstrap.js"></script>
<script src="https://unpkg.com/vue@next"></script>
<script src="./language/js/axios.min.js"></script>
<script src="./language/js/moment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="./language/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="./language/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="./language/js/vendor/html2canvas.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                loop:false
            }
        }
    })
</script>

<script src="./language/js/plugins.js"></script>
<script type="module" src="./language/js/custom.js"></script>
</body>
</html>