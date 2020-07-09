// 將預設 click 事件的 navbar 改為 指定尺寸為 hover，手機為click
$(function () {
    (function ($) {
        var defaults = {
            sm: 540,
            md: 720,
            lg: 960,
            xl: 1140,
            navbar_expand: "lg",
            animation: true,
            animateIn: "fadeIn"
        };
        $.fn.bootnavbar = function (options) {
            var screen_width = $(document).width();
            settings = $.extend(defaults, options);

            if (screen_width >= settings.lg) {
                $(this)
                    .find(".dropdown")
                    .hover(
                        function () {
                            $(this).addClass("show");
                            $(this).find(".dropdown-menu").first().addClass("show");
                            if (settings.animation) {
                                $(this)
                                    .find(".dropdown-menu")
                                    .first()
                                    .addClass("animated " + settings.animateIn);
                            }
                        },
                        function () {
                            $(this).removeClass("show");
                            $(this).find(".dropdown-menu").first().removeClass("show");
                        }
                    );
            }

            $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {

                if (!$(this).next().hasClass("show")) {
                    $(this)
                        .parents(".dropdown-menu")
                        .first()
                        .find(".show")
                        .removeClass("show");
                }
                var $subMenu = $(this).next(".dropdown-menu");
                $subMenu.toggleClass("show");

                $(this)
                    .parents("li.nav-item.dropdown.show")
                    .on("hidden.bs.dropdown", function (e) {
                        $(".dropdown-submenu .show").removeClass("show");
                    });

                return false;
            });
        };
    })(jQuery);

    // 呼叫函示
    $("#header__menu").bootnavbar();
});

$(function () {
    $('.accordion > .card-header').on('click',function () {
        $(this).parent('.card').children('.card-body').slideToggle();
    })

    /**
     * Plugin Config
     */
    $(function () {
        $('#datetimepicker_date').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        $('#datetimepicker_time').datetimepicker({
            format: 'HH:mm'
        });
    });
})