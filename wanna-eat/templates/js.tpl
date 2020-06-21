<script src="./language/js/jquery.js"></script>
<script src="./language/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script>
    $(function () {

        $('.btn-menu').on('click', function (e) {
            e.preventDefault();
            let img_path = $(this).attr('href');
            let modal = $(this).parents('.store-text').find('.modal');
            let height = $(document).height();
            let step = 1;

            // 顯示modal
            modal.slideDown('fast');
            // 插入圖片
            modal.find('.img').replaceWith('<img src="' + img_path + '" style="max-height: ' + height + 'px">')

            // 關閉modal
            modal.on('click', function (e) {
                $(this).slideUp('fast');
                modal.children('.modal-body').removeAttr('style');
            }).on('mousewheel', function (e) {
                // console.log(e.originalEvent.wheelDelta > 0);
                if(e.originalEvent.wheelDelta > 0){
                    step -= 1 / 10
                }else {
                    step += 1 / 10
                }
                modal.find('img').css('transform', 'scale(' + step + ')');
            })

        })
    })
</script>
</body>
</html>