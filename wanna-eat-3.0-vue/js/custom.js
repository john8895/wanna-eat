/**
 * 亂數店家 Random store
 ************************************ **/
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
                // console.log(last_pick, r)
                item.removeClass('pick-color').eq(r).addClass('pick-color');
                limit++;
                if (limit > 8) clearInterval(timer);
            }, 100)


        })
    }


})


/**
 * Order 訂單
 ************************************ **/
Vue.config.devtools = true  // 開啟 devtools
/* 發起團購
 * 1. 發起人 hosts 也要存發起人
 * 2. 截止時間
 * 3. 注意事項
 * 4.
 */
let vm = new Vue({
    delimiters: ['%%', '%%'],
    el: '#app',
    data: {
        stores: [], // 店家資料
        orderDisplay: false, // 顯示開團
        orders: [], // 存入訂單 店家資料
        item_data: [],
        input: '',

    },
    mounted() {  // ex:onload 讀取數據
        axios.get('data_api.php').then(res => {
            vm.stores = res.data  // 自後端取出數據，產生列表
        }).catch(err => {
            console.error('err', err)
        })
    },
    updated(){  // DOM 的更新已經完成，View 被顯示在畫面上
        // Modal
        // $('.store-info').on('click','.btn-menu', function (e) {
        $('.btn-menu').on('click', function (e) {
            console.log('執行')
            e.preventDefault();
            let img_path = $(this).attr('href');
            let modal = $(this).parents('.modal-wrap').find('.modal');
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
    },
    methods: {
        getData(idx) {
            vm.orderDisplay = true  // 顯示訂單區域
            vm.orders = vm.stores[idx]  // 取出前端店家資料
        },
        getContent() {
            // 格式化數據
            let format = vm.input
                .trim()
                .split(/[\.\-,、/元]/g);
            // 組裝數據
            let dataObj = {
                name: format[0],
                meal: format[1],
                price: parseInt(format[2]),
            }
            // 推入
            vm.item_data.push(dataObj)
            // console.log(vm.item_data);
        },
        formatData(originData) {  // 格式化數據
            let format = originData
                .trim()
                .split(/[\.\-,、/元]/g);
            // 組裝數據
            return {
                name: format[0],
                meal: format[1],
                price: parseInt(format[2]),
            }
        },
        saveOrder() {
            /** 送出訂單 **/
            let jsonData;
            if (vm.item_data.length === 0) {
                // 如果只有一筆訂單
                let tempData = {
                    store: vm.orders,
                    orders: vm.formatData(vm.input)
                }
                jsonData = JSON.stringify(tempData)
            } else {
                let tempData = {
                    store: vm.orders,
                    orders: vm.item_data
                }
                jsonData = JSON.stringify(tempData)
            }
            vm.item_data = [];

            console.log('jsonData:', jsonData)
            /** 傳送數據至後端 */
            axios.post('data_api.php', jsonData).then(res => {
                console.log(res.data)
            }).catch(err => {
                console.error('err', err)
            })
        }
    }
})