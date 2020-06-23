<script src="{$Config->wwwfile}/js/jquery-2.2.3.min.js"></script>
<script src="{$Config->wwwfile}/js/bootstrap/js/bootstrap.min.js"></script>
<script src="{$Config->wwwfile}/js/plugins.min.js"></script>
<script src="{$Config->wwwfile}/js/custom.min.js"></script>


{if $module == 'travel' || $module == 'daytrip' || $module == 'custom'}
    <script src="{$Config->wwwfile}/js/custom.min.js"></script>
    <script src="{$Config->wwwfile}/js/slick.js"></script>
    <script src="{$Config->wwwfile}/js/main.js"></script>
    <script src="{$Config->wwwfile}/js/lightcase.js"></script>
{literal}
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 3,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            asNavFor: '.slider-for',
            dots: false,
            draggable: true,
            swipeToSlide: true,
            focusOnSelect: true,
            centerMode: true,
        });
    </script>
{/literal}
{/if}


<!-- jQuery fancybox plugin -->
<script src="{$Config->wwwhome}/system/js/fancybox2/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript"
        src="{$Config->wwwhome}/system/js/fancybox2/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript"
        src="{$Config->wwwhome}/system/js/fancybox2/source/helpers/jquery.fancybox-buttons.js?v=2.1.5"></script>
<script type="text/javascript"
        src="{$Config->wwwhome}/system/js/fancybox2/source/helpers/jquery.fancybox-thumbs.js?v=2.1.5"></script>
<script type="text/javascript"
        src="{$Config->wwwhome}/system/js/fancybox2/source/helpers/jquery.fancybox-media.js?v=2.1.5"></script>
<!-- printThis Plugin -->
<script language="javascript" src="{$Config->wwwhome}/system/js/printThis/printThis.js"></script>
<!-- jquery custom Plugin -->
<script language="javascript" src="{$Config->wwwhome}/system/js/jquery.custom.js"></script>
<!-- datetimepicker Plugin -->
<script src="{$Config->wwwhome}/system/js/datetimepicker/jquery.datetimepicker.js"></script>
<!-- jQuery Upload File Plugin -->
<script src="{$Config->wwwhome}/system/js/fileupload/jquery.uploadfile.js"></script>
<!-- sweetalert2 Plugin -->
<script src="{$Config->wwwhome}/system/js/sweetalert2/sweetalert2.min.js"></script>
<!-- google recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<!-- google map javascript api -->
{if $module == 'distmap'}
    <script src="{$Config->wwwhome}/system/js/googleMap.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfzLLXGQKA3l7QlTzJ6Z_zZnhUeaN4xKw&callback=myMap&libraries=places"
            type="text/javascript"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
{/if}
{*
<!-- tarteaucitron Plugin -->
<script type="text/javascript" src="{$Config->wwwhome}/system/js/tarteaucitron/tarteaucitron.js"></script>
{literal}
<script type="text/javascript">
tarteaucitron.init({
    "hashtag": "#tarteaucitron", /* Automatically open the panel with the hashtag */
    "highPrivacy": false, /* disabling the auto consent feature on navigation? */
    "orientation": "bottom", /* the big banner should be on 'top' or 'bottom'? */
    "adblocker": false, /* Display a message if an adblocker is detected */
    "showAlertSmall": true, /* show the small banner on bottom right? */
    "cookieslist": true, /* Display the list of cookies installed ? */
    "removeCredit": false /* remove the credit link? */
});
</script>
<script type="text/javascript">
tarteaucitron.user.analyticsUa = 'UA-XXXXXXXX-X';
tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
(tarteaucitron.job = tarteaucitron.job || []).push('analytics');
</script>
{/literal}
        *}