<script src="./language/js/jquery.js"></script>
<script src="./language/js/bootstrap.js"></script>
{*<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js"></script>*}
<script src="./language/js/axios.min.js"></script>
<script src="./language/js/moment.js"></script>
<script src="./language/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="./language/js/tempusdominus-bootstrap-4.min.js"></script>

{*{if $module == 'index'}*}
    {* 只有首頁用到 *}
    <script type="text/javascript" src="./language/js/owl.carousel.min.js"></script>
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
{*{/if}*}


<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<!--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>-->
<script src="./language/js/plugins.js"></script>
<script src="./language/js/custom.js"></script>


</body>
</html>