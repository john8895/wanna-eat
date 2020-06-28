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
// $(function () {
//     // window.addEventListener('load', getData)
//     function getData(e) {
//         e.preventDefault()
//
//         let id = $(location).attr('search')
//         if (id===''){
//             // 如果沒有參數
//             // alert('必須有參數')
//             window.location = 'index.php'
//         }
//         id = Number(id.replace('?id=', ''))
//         console.log(id)
//
//
//         // $.ajax({
//         //     url: `get_data.php?id=${id}`,
//         //     method: 'GET',
//         //     dataType: 'json',
//         //     error: function (err) {
//         //         console.log('err',err);
//         //     },
//         //     success: function (data) {
//         //         console.log('data',data);
//         //     }
//         // })
//     }
// })

Vue.config.devtools = true  // 開啟 devtools

/*
 * 1. 傳ID
 * 2. 顯示訂單區塊
 * 3. 帶入數據
 * 4. 定餐form
 * 5. 送出後，POST給PHP接收
 */

let vm = new Vue({
    delimiters: ['%%', '%%'],
    el: '#app',
    data: {
        stores: [],
        orderDisplay: false,
        orders: [],
        order_items: '',
        item_data: [],
    },
    mounted() {  // onloac 讀取數據
        axios.get('data_api.php').then(res => {
            // console.log('success')
            // console.log(res.data)
            vm.stores = res.data
        }).catch(err => {
            console.error('err', err)
        })
    },
    methods: {
        getData(idx) {
            vm.orderDisplay = true  // 顯示訂單區域
            // console.log(vm.stores[idx].name);
            vm.orders = vm.stores[idx]
            // console.log(vm.orders)
        },
        getContent() {

            // 組合數據
            // console.log(vm.orderFormat)
            // console.log(vm.orderFormat);

            // let temp_data = []
            // temp_data.push(dataObj)
            // console.log(temp_data)
            // vm.order_items['key'] = dataObj

            // console.log(vm.order_items)
            // vm.order_items.push(dataObj)
            // console.log(vm.order_items);


            // vm.order_obj.push(dataObj)

            // vm.order_items.push(dataObj)

            // 傳送數據至後端
            // axios.post("data_api.php").then(res=>{
            //     console.log(res.data)
            // }).catch(err=>{
            //     console.error('err', err)
            // })
        }
    },
    computed: {
        orderFormat: function () {
            console.log('我執行了')
            // if(vm.order_items==='') return
            let format = vm.order_items
                    .trim()
                    .split(/[\.\-,、/元]/g);

            let dataObj = {
                name: format[0],
                meal: format[1],
                price: parseInt(format[2]),
            }
            vm.item_data.push(dataObj)
            // vm.order_items = ''
            console.log(vm.item_data);
        }
    }
})