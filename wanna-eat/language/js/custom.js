/**
 * Modal 顯示隱藏
 * **/
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


/**
 * 亂數店家
 * **/
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
                while (r === last_pick) {
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


/**
 * Order 訂單
 * **/
// Vue.config.devtools = true  // 開啟 devtools
// 取得訂單資料
$(function () {
    // 只有首頁才讀取
    if ($('.page__index').length) {
        showOrder();
    }


    // Get group-buy data
    function showOrder() {
        axios.get('group_buy_api.php?res=buy').then(res => {
            // console.log(res.data)
            groupBuyDisplay(res.data)
        }).catch(err => {
            console.error(err)
        })
    }

    // 顯示數據
    function groupBuyDisplay(groupBuy) {
        $('#current_groupBuy').text(groupBuy.length)

        // TODO 如果無資料要顯示的狀態
        let orderBlock = '';
        for (let i = 0; i < groupBuy.length; i++) {
            orderBlock += `
        <div class="col-sm-3">
            <ul>
                <li>預估金額：$0</li>
                <li>目前金額：$0</li>
                <li><span id="group_host">${groupBuy[i].group_host}</span>開的<span id="store_name">${groupBuy[i].store_name}</span></li>
                <li>
                    <a href="order.php?id=${groupBuy[i].id}" class="btn btn-primary px-2 w-100">我也要訂</a>
                </li>
            </ul>
        </div>
        `
        }
        $('.order-block').append(orderBlock);
    }
})

// TODO order讀資料要改為AJAX  增加後重讀數據
//
// Submit order
$(function () {

    if ($('#order_form').length) {
        $('#order_form').on('submit', function (e) {
            e.preventDefault()

            let order_id = $('input[name=add_order_id]');
            let order_name = $('input[name=add_order_name]');
            let order_content = $('input[name=add_order_content]');
            let order_price = $('input[name=add_order_price]');
            let order_remark = $('input[name=add_order_remark]');

            checkInputVal(order_price, '價格');
            checkInputVal(order_content, '點餐內容');
            checkInputVal(order_name, '姓名');


            let data = new FormData();
            data.append('order_id', order_id.val());
            data.append('order_name', order_name.val());
            data.append('order_content', order_content.val());
            data.append('order_price', order_price.val());
            data.append('order_remark', order_remark.val());

            order_name.val('');
            order_content.val('');
            order_price.val('');
            order_remark.val('');

            axios.post('group_buy_api.php', data).then(res => {
                console.log(res.data)
                if (res.data === 'success') {
                    Swal.fire(
                        '增加成功',
                        '訂單已新增',
                        'success'
                    )
                }
            }).catch(err => {
                console.error(err)
            })
        });
    }


    // Check input value not empty
    function checkInputVal(element, elName) {
        if (!element.val()) {
            Swal.fire(
                '請留意！',
                elName + '不可為空',
                'warning'
            )
        }
    }


})


// SweetAlert 2 jquery plugin
// warning, error, success, info, and question
// Swal.fire(
//     'Good job!',
//     'You clicked the button!',
//     'success'
// )
// Swal.fire({
//     title: 'Success!',
//     text: 'Do you want to continue',
//     icon: 'Success',
//     confirmButtonText: 'Cool'
// })
// Swal.fire('Any fool can use a computer')

// Swal.fire(
//     'The Internet?',
//     'That thing is still around?',
//     'success'
// )