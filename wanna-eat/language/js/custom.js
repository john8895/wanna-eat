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
    // 取得數據
    // (function showOrder(){
    //     axios.get('group_buy_api.php').then(res=>{
    //         console.log(res.data)
    //         groupBuyDisplay(res.data)
    //     }).catch(err=>{
    //         console.error(err)
    //     })
    // })()
})
let vm = new Vue({
    delimiters: ['%%', '%%'],
    el: '#app',
    data: {
        group: [],
        message: 'Hello',
    },
    mounted: function() {
        this.showOrder();
    },
    methods: {
        // 取得數據
        showOrder: function() {
            axios.get('group_buy_api.php').then(res => {
                console.log(res.data)
                vm.group = res.data
                // groupBuyDisplay(res.data)
            }).catch(err => {
                console.error(err)
            })
        },
        // 顯示數據
        groupBuyDisplay(response) {
            $('#current_groupBuy').text(response.length)
            $('#group_host').text(response.length)
            $('#store_name').text(response.length)
        }
    }


})
