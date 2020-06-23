$(function () {

    // Modal
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
            if (e.originalEvent.wheelDelta > 0) {
                step -= 1 / 10
            } else {
                step += 1 / 10
            }
            modal.find('img').css('transform', 'scale(' + step + ')');
        })

    })
})


// Random store
$(function () {

    wanna_eat();

    function wanna_eat() {
        let timer, last_pick;

        $('#wanna_eat').on('click', function (e) {
            e.preventDefault();
            clearInterval(timer);
            let item = $('.store-item');
            let limit = 0;

            item.removeClass('pick-color');
            timer = setInterval(function () {
                let r = parseInt(Math.random() * item.length);
                last_pick = r;
                while (r === last_pick){
                    r = parseInt(Math.random() * item.length);
                }
                console.log(last_pick, r)

                // r = r === last_pick ? parseInt(Math.random() * item.length) : r;
                item.removeClass('pick-color').eq(r).addClass('pick-color');
                limit++;
                if (limit > 8) clearInterval(timer);
            }, 100)


        })
    }


})

$(function () {
    function foo() {
        console.log(1)
    }
    function getData(item_id) {
        console.log('1')
        $.ajax({
            url: `get_data.php?id=${item_id}`,
            // method: 'GET',
            type: 'GET',
            dataType: 'json',
            error: function (err) {
                console.log(err);
            },
            success: function (data) {
                console.log(data);
            }
        })
    }
})