/**
 * SweetAlert Class
 */
class SwalAlert {
    constructor(title, description, confirmText, status, callbackFunc) {
        this.status = status;
        this.title = title;
        this.description = description;
        this.confirmText = confirmText;
        this.callbackFunc = callbackFunc;
    }

    fire() {
        return Swal.fire(
            this.title,
            this.description,
            this.status
        )
    }

    fireConfirm() {
        Swal.fire({
            title: this.title,
            text: this.description,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: this.confirmText
        }).then((result) => {
            if (result.value) {
                this.callbackFunc();
            }
        })
    }
}

// Ajax Get Data
class AjaxData {
    constructor(api, callback, data) {
        this.api = api;
        this.callback = callback;
        this.data = data;
    }

    get() {
        axios
            .get(this.api)
            .then(res => {
                console.log(this.api)
                console.log(res.data)
                this.callback(res.data);
                // return true;
            })
            .catch(err => {
                console.error(err);
            })
    }

    // Get echo 'success'
    post() {
        axios.post(this.api, this.data).then(res => {
            // console.log(res.data)
            if (res.data === 'success') {
                const showMessage = new SwalAlert('操作成功', '資料已新增', '', 'success')
                showMessage.fire()
                this.callback();
            }
        }).catch(err => {
            console.error(err)
        })
    }

    // Get json
    postJson() {
        axios.post(this.api, this.data).then(res => {
            this.callback(res.data);
        }).catch(err => {
            console.error(err)
        })
    }
}

/**
 * @Range: index.php,
 *
 * Modal display
 *
 */
$(function () {
    "use strict"
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

    // Random store
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


    (function goTop() {
        $(window).on('scroll', function () {
            const height = $(window).height();
            const scroll = $(document).scrollTop();
            if (scroll > height / 3) {
                $('#gotop').slideDown();
            } else {
                $('#gotop').slideUp(500);
            }
        })

        $('#gotop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500)
        })
    })()
})


// Moment config
$(function () {
    (function momentConfig() {
        moment.locale('zh-tw', {
            months: '一月_二月_三月_四月_五月_六月_七月_八月_九月_十月_十一月_十二月'.split('_'),
            monthsShort: '1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月'.split('_'),
            weekdays: '星期日_星期一_星期二_星期三_星期四_星期五_星期六'.split('_'),
            weekdaysShort: '週日_週一_週二_週三_週四_週五_週六'.split('_'),
            weekdaysMin: '日_一_二_三_四_五_六'.split('_'),
            longDateFormat: {
                LT: 'Ah點mm分',
                LTS: 'Ah點m分s秒',
                L: 'YYYY-MM-DD',
                LL: 'YYYY年MMMD日',
                LLL: 'YYYY年MMMD日Ah點mm分',
                LLLL: 'YYYY年MMMD日ddddAh點mm分',
                l: 'YYYY-MM-DD',
                ll: 'YYYY年MMMD日',
                lll: 'YYYY年MMMD日Ah點mm分',
                llll: 'YYYY年MMMD日ddddAh點mm分'
            },
            meridiemParse: /凌晨|早上|上午|中午|下午|晚上/,
            meridiemHour: function (h, meridiem) {
                let hour = h;
                if (hour === 12) {
                    hour = 0;
                }
                if (meridiem === '凌晨' || meridiem === '早上' ||
                    meridiem === '上午') {
                    return hour;
                } else if (meridiem === '下午' || meridiem === '晚上') {
                    return hour + 12;
                } else {
                    // '中午'
                    return hour >= 11 ? hour : hour + 12;
                }
            },
            meridiem: function (hour, minute, isLower) {
                const hm = hour * 100 + minute;
                if (hm < 600) {
                    return '凌晨';
                } else if (hm < 900) {
                    return '早上';
                } else if (hm < 1130) {
                    return '上午';
                } else if (hm < 1230) {
                    return '中午';
                } else if (hm < 1800) {
                    return '下午';
                } else {
                    return '晚上';
                }
            },
            calendar: {
                sameDay: function () {
                    return this.minutes() === 0 ? '[今天]Ah[點整]' : '[今天]LT';
                },
                nextDay: function () {
                    return this.minutes() === 0 ? '[明天]Ah[點整]' : '[明天]LT';
                },
                lastDay: function () {
                    return this.minutes() === 0 ? '[昨天]Ah[點整]' : '[昨天]LT';
                },
                nextWeek: function () {
                    let startOfWeek, prefix;
                    startOfWeek = moment().startOf('week');
                    prefix = this.diff(startOfWeek, 'days') >= 7 ? '[下]' : '[本]';
                    return this.minutes() === 0 ? prefix + 'dddA點整' : prefix + 'dddAh點mm';
                },
                lastWeek: function () {
                    let startOfWeek, prefix;
                    startOfWeek = moment().startOf('week');
                    prefix = this.unix() < startOfWeek.unix() ? '[上]' : '[本]';
                    return this.minutes() === 0 ? prefix + 'dddAh點整' : prefix + 'dddAh點mm';
                },
                sameElse: 'LL'
            },
            ordinalParse: /\d{1,2}(日|月|周)/,
            ordinal: function (number, period) {
                switch (period) {
                    case 'd':
                    case 'D':
                    case 'DDD':
                        return number + '日';
                    case 'M':
                        return number + '月';
                    case 'w':
                    case 'W':
                        return number + '周';
                    default:
                        return number;
                }
            },
            relativeTime: {
                future: '%s內',
                past: '%s前',
                s: '幾秒',
                m: '1 分鐘',
                mm: '%d 分鐘',
                h: '1 小時',
                hh: '%d 小時',
                d: '1 天',
                dd: '%d 天',
                M: '1 個月',
                MM: '%d 個月',
                y: '1 年',
                yy: '%d 年'
            },
            week: {
                // GB/T 7408-1994《數據元和交換格式·信息交換·日期和時間表示法》與ISO 8601:1988等效
                dow: 1, // Monday is the first day of the week.
                doy: 4  // The week that contains Jan 4th is the first week of the year.
            }
        });
    })()
})


/**
 * @Range: index.php
 *
 * Get orders
 *
 */
$(function () {
        "use strict"
        // Only index
        if ($('.page__index').length || $('.page__group-buy-now').length || $('.layout__header').length) {
            showOrder();
        }
        if ($('#add_hostName').length) addHostName();
        if ($('#add_storeTag').length) addStoreTag();
        if ($('.btn-del-store').length) deleteStore();
        if ($('#groupBuyForm').length) submitGroupBuy();
        if ($('#addStoreForm').length) submitAddStore();
        if ($('#input_addStoreCover').length) addStoreImagePreview();


        function addStoreImagePreview() {
            $('#input_addStoreCover').on('change', function () {
                readUrl(this, $('#store_cover_preview'));
            })
            $('#input_addStoreMenu').on('change', function () {
                readUrl(this, $('#store_menu_preview'));
            })
        }

        // Upload image preview
        function readUrl(input, jq_appendElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $(reader).on('load', function (e) {
                    const img = $('<img>').attr('src', e.target.result);
                    img.addClass('preview-image img-thumbnail');
                    jq_appendElement.empty().append(img);
                })
                reader.readAsDataURL(input.files[0])  // image to base64
            }
        }

        function submitAddStore() {
            $('#addStoreForm').on('submit', function () {
                if (!checkInputVal($('input[name=name]'), '餐廳名稱')) {
                    return false;
                }
            })
        }


        // Group buy submit Check
        function submitGroupBuy() {
            $('#groupBuyForm').on('submit', function () {
                const group_host_new = $('input[name=group_host_new]')
                if (!group_host_new.val() && $('select[name=group_host]').val() === '0') {
                    checkInputVal(group_host_new, '團購負責人');  // Check input not empty
                    return false;
                }
            })
        }

        function deleteStore() {
            $('.btn-del-store').on('click', function (e) {
                e.preventDefault();
                const itemId = $(this).attr('data-itemId') || 0;
                let deleteHandle = function () {
                    const alertInfo = new SwalAlert('資料已刪除！', '刪除一筆餐廳資料', '', 'success');
                    deleteAct.get()
                    alertInfo.fire()
                    window.location = 'edit-res.php';
                }
                const confirmAlert = new SwalAlert('你確定嗎？', '刪除資料不可復原！', '是的，我要刪除', '', deleteHandle)
                confirmAlert.fireConfirm();
                const deleteAct = new AjaxData('delete.php?id=' + itemId, '')
            })
        }

        // Get group-buy data
        function showOrder() {
            // axios get multiple urls

            const total_orders = axios.get('group_buy_api.php?res=total_orders');
            const groupBuy = axios.get('group_buy_api.php?res=buy');
            // 如果在歷史團購單頁，就讀取歷史團購單
            const groupBuyHistory = $('.page__group-history').length ? axios.get('group_buy_api.php?res=buy_history') : 0;
            const store_info = axios.get('group_buy_api.php?res=stores');

            axios
                .all([groupBuy, total_orders, store_info, groupBuyHistory])
                .then(
                    axios.spread((...res) => {
                        const res1 = res[0];
                        const res2 = res[1];
                        const res3 = res[2];
                        const groupBuyHistory = res[3].data;
                        // console.log(res[3].data)
                        groupBuyDisplay(res1.data, res2.data, res3.data, groupBuyHistory)
                    })
                )
                .catch(
                    axios.spread((...error) => {
                        const res1 = error[0];
                        const res2 = error[1];
                        const res3 = error[2];
                        console.error(error[0].errors)
                        console.error(error[1].errors)
                        console.error(error[2].errors)
                        console.error(error[3].errors)

                    })
                )
        }


        // Calc total price and total people of order id.
        function indexOrdersCalc(json, order_id) {
            // console.log(json, order_id)
            let sum = 0;
            let name = [];
            json.forEach(item => {
                if (item.order_id === order_id) {
                    sum += parseInt(item.order_price);
                    name.push(item.order_name)
                }
            })
            const totalName = name.filter((item, index) => name.indexOf(item) === index);  // 刪除重複元素
            return {
                totalPrice: sum,
                totalName: totalName,
            };
        }

        /**
         *
         * @param groupBuy  進行中團購單
         * @param totalOrders  全部訂單
         * @param stores  餐廳數據
         * @param groupBuyHistory  歷史團購單
         */
        function groupBuyDisplay(groupBuy, totalOrders, stores, groupBuyHistory) {
            // console.log(groupBuy)
            let groupBuyData;
            let groupText = '';
            if (groupBuyHistory) {
                groupBuyData = groupBuyHistory;
                groupText = '過往的團購單數&nbsp;&nbsp;';
            } else {
                groupBuyData = groupBuy;
                groupText = '進行中團購&nbsp;&nbsp;';
            }

            if (groupBuyData.length === 0) {
                $('#current_groupBuy').text('目前還沒有團購 :(').addClass('text-center');
            } else {
                $('#current_groupBuy').html(`${groupText}<b>${groupBuyData.length}</b>`)
                $('#group_now_badge').text(groupBuy.length)
            }
            let orderBlock = '';
            for (let i = 0; i < groupBuyData.length; i++) {
                // Calc orders
                const orderCalc = indexOrdersCalc(totalOrders, groupBuyData[i].id)
                const oneOrderSum = orderCalc.totalPrice;
                const oneOrderNum = orderCalc.totalName.length;
                const groupId = parseInt(groupBuyData[i].store_id);

                // Calc left time
                const end_time = new Date(groupBuyData[i].end_time).getTime();

                // console.log(end_time)
                // 覆蓋moment.js內建函數，以分鐘計算
                // moment.fn.fromNow = function (a) {
                //     return moment().diff(this, 'minute');
                // }
                const left_time = moment(end_time).fromNow()  // 比較當日獲取還剩幾分鐘收單
                // countdownGroupBuy(left_time);


                // Get store data
                let storeCover = './language/img/noimg.jpg';
                let storeFullPrice = 0;
                for (const key in stores) {
                    const store_id = parseInt(stores[key].id);
                    if (groupId === store_id) {
                        storeCover = stores[key].store_cover;
                        storeFullPrice = stores[key].store_full_price;
                    }
                }
                if (storeCover == null) storeCover = './language/img/noimg.jpg';

                // group full & yet
                let groupFull = '';
                if (oneOrderSum >= storeFullPrice) {
                    groupFull = `<div class="item group-full">已成團</div>`;
                } else {
                    groupFull = `<div class="item group-yet">未成團</div>`;
                }

                orderBlock += `
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <div class="card group-list-item">
                <div class="store-image">
                    <div class="group-status">
                        ${groupFull}
                        <div class="item group-countName">${oneOrderNum}人</div>
                        <div class="item group-leftTime">&nbsp;${left_time}收單</div>
                    </div>
                    <a href="order.php?id=${groupBuyData[i].id}" title="我要跟${groupBuyData[i].group_host}開的${groupBuyData[i].store_name}">
                        <img src="${storeCover}" alt="" class="img-fluid">
                    </a>
                </div>
            
            <div class="card-body text-center">
            <span id="store_name">${groupBuyData[i].store_name}</span>
            <ul>
<!--                <li>訂單金額：$${oneOrderSum}</li>-->
<!--                <li>外送金額：$${storeFullPrice}</li>-->
<!--                <li>收單時間：${Math.abs(left_time)} 分鐘</li>-->
                <li class="orderBtn">
                    <div class="mt-2 text-center">
                        <button class="btn btn-outline-danger del-group-btn  border-top-0 border-left-0 border-right-0" data-groupid="${groupBuyData[i].id}">刪除此單</button>
                    </div>
                </li>
            </ul>
            </div>
            </div>
        </div>`
            }
            $('.order-block').empty().append(orderBlock);
            $('.del-group-btn').on('click', delGroupBuy)

        }


        function countdownGroupBuy(left_time) {
            var now = moment(),
                // duration = moment().hours(0).minutes(0).seconds(0),
                duration = left_time;
            origin = moment().hours(12).minutes(10).seconds(30);
            console.log('duration', duration)
            const interval = 1;

            const itemId = $('.group-leftTime').attr('data-itemId');
            console.log('itemId:', itemId)
            setInterval(function () {
                duration = moment(duration).add(interval, 'seconds');
                // $('#countdown').text( duration.format('HH:mm:ss').toString() );
                var timeLeft = moment(moment(origin).diff(moment(duration))).format('HH:mm:ss').toString();
                console.log(timeLeft)
                return timeLeft;
                // $('#countdown1').text( timeLeft );

            }, 1000);

        }


        /**
         * @Range: index.php
         *
         * Delete group-buy
         *
         */
        function delGroupBuy() {
            const group_id = $(this).data('groupid');
            if (!group_id) return;

            const delGroupBuyAct = new AjaxData(`group_buy_api.php?del_group=${group_id}`, showOrder);
            const delGroupBuyVar = function () {
                delGroupBuyAct.get();
                const alertInfo = new SwalAlert('操作成功', '一筆團購單已刪除', '', 'success');
                alertInfo.fire();
            }

            let alertInfo = new SwalAlert('你確定要刪除嗎？', "這項操作是沒辦法還原的！", '是的，我要刪除', '', delGroupBuyVar);
            alertInfo.fireConfirm()
        }


        /**
         * @Range: Order.php
         *
         * Get order item of these order.
         *
         */
        // Only order page load
        if ($('.page__order').length) {
            ordersDisplay();
            $('#order_form').on('submit', submitOrder);  // Submit order
        }


        // Orders display
        function ordersDisplay() {
            const order_id = $('#order_id').val();
            if (!order_id) return;
            let callback = function (data) {
                ordersListDisplay(data)
                countOrders(order_id);
            }
            const submitOrder = new AjaxData(`group_buy_api.php?res=order_list&order_id=${order_id}`, callback);
            submitOrder.get()
        }


        // Calc price
        function calcOrders(json) {
            let sum = 0;
            let name = [];
            json.forEach(item => {
                sum += parseInt(item.order_price);
                name.push(item.order_name)
            })
            const totalName = name.filter((item, index) => name.indexOf(item) === index);  // 刪除重複元素
            return {
                totalPrice: sum,
                totalName: totalName,
            };
        }


        // Orders display
        function ordersListDisplay(ordersData) {
            const calcData = calcOrders(ordersData);
            const totalPrice = calcData.totalPrice;
            const totalName = calcData.totalName;
            $('#ordersNum').html(`共有 ${totalName.length} 人參與團購，累積有 <b>${ordersData.length}</b> 筆訂單`);

            // Display
            let orderListHtml = '';
            for (let i = 0; i < ordersData.length; i++) {

                // Payment Amount


                // Payment Status
                let paymentStatus = '';
                if (ordersData[i].order_paymentStatus === '1') {
                    paymentStatus = '<span class="paid"><i class="fas fa-check-circle"></i>已付款</span>';
                } else {
                    const amount = ordersData[i].order_price * ordersData[i].order_number + ' 元';  // Unpaid Amount
                    paymentStatus = `<span class="unpaid" data-amount="${amount}"><i class="fas fa-dollar-sign"></i>未付款</span>`;
                }

                orderListHtml += `
        <div class="row py-2 rounded order-item" data-index="${i + 1}">
            <div class="col-sm-1 text-right px-1">
                <span class="mr-3">${i + 1}. </span>
            </div>
            <div class="col-sm-1 text-right px-1 form-check pt-2">
                <input class="form-check-input" type="checkbox" value="${ordersData[i].order_paymentStatus}" id="defaultCheck_${i}"
                        name="order_paymentStatus" data-field="付款狀態" ${ordersData[i].order_paymentStatus === '1' ? 'checked' : ''}>
                <label class="form-check-label" for="defaultCheck_${i}">
                    ${paymentStatus}
                </label>
            </div>
            <div class="col-sm-2 px-1">
                <input type="hidden" name="field_id" value="${ordersData[i].field_id}" class="field_id">
                <input type="text" class="form-control" value="${ordersData[i].order_name}" name="order_name"
                       placeholder="請輸入姓名 *" data-field="姓名">
            </div>
            <div class="col-sm-2 px-1">
                <input type="text" class="form-control" value="${ordersData[i].order_meal}" name="order_meal"
                       placeholder="請輸入餐點名稱 *" data-field="餐點名稱">
            </div>
            <div class="col-sm-2 px-1">
                <input type="number" class="form-control" value="${ordersData[i].order_price}" name="order_price"
                       placeholder="請輸入價格 *" data-field="價格">
            </div>
            <div class="col-sm-1 px-1">
                <input type="number" class="form-control" value="${ordersData[i].order_number}" name="order_number"
                       placeholder="請輸入數量 *" data-field="數量">
            </div>
            <div class="col-sm-2 px-1">
                <input type="text" class="form-control" value="${ordersData[i].order_remark}" name="order_remark"
                       placeholder="請輸入備註" data-field="備註">
            </div>
            <div class="col-sm-1 px-1">
                <a class="btn delete_order" title="刪除此筆訂單">
                      <svg class="icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z"></path></svg>
                </a>
            </div>        

        </div>
        `
            }
            // Orders number
            if (ordersData.length === 0) {
                $('#order_list').text('目前還沒有訂單 :(').addClass('text-center');
            } else {
                $('#order_list').empty().append(orderListHtml);
            }
            // Call calc orders
            // countOrders(ordersData);

            // Call edit order function
            $('#order_list input[name^="order"]').on('change', editOrder);

            // Call delete order function
            $('.delete_order').on('click', deleteOrder);
        }


        /**
         * @Range: Order.php
         *
         * Submit order
         *
         */
        // Submit order handle
        function submitOrder(event) {
            event.preventDefault()
            const order_id = $('input[name=add_order_id]');
            const order_name = $('input[name=add_order_name]');
            const order_meal = $('input[name=add_order_meal]');
            const order_price = $('input[name=add_order_price]');
            const order_number = $('select[name=add_order_number] :selected');
            const order_remark = $('input[name=add_order_remark]');

            if (!checkInputVal(order_price, '價格')) return;
            if (!checkInputVal(order_number, '數量')) return;
            if (!checkInputVal(order_meal, '餐點內容')) return;
            if (!checkInputVal(order_name, '姓名')) return;

            let data = new FormData();
            data.append('add_order', 'true');
            data.append('order_id', order_id.val());
            data.append('order_name', order_name.val());
            data.append('order_meal', order_meal.val());
            data.append('order_number', order_number.val());
            data.append('order_price', order_price.val());
            data.append('order_remark', order_remark.val());
            order_name.val('');
            order_meal.val('');
            order_price.val('');
            order_remark.val('');

            const submitOrder = new AjaxData('group_buy_api.php', ordersDisplay, data)
            submitOrder.post();
        }


        // Check input value not empty
        function checkInputVal(element, elName) {
            if (!element.val()) {
                Swal.fire(
                    '表單欄位檢查',
                    `\`${elName}\` 欄位不可為空喔`,
                    'warning'
                )
                element.addClass('is-invalid');
                return false;
            }
            return true;
        }


        /**
         * @Range: Order.php
         *
         * Edit order
         *
         */
        function editOrder() {
            const orderEl = $(this);
            const orderName = orderEl.attr('name');  // Field name
            let orderValue = orderEl.val();
            const orderId = $('#order_id').val();
            const field_id = orderEl.parents('.order-item').find('.field_id').val();
            const orderTitle = orderEl.attr('data-field')

            // Check input value not empty.
            const exc = ['order_remark', 'order_paymentStatus'];
            if (exc.indexOf(orderName) === -1) {  // if not found
                if (!checkInputVal(orderEl, orderTitle)) {
                    return;
                }
            }

            // Order Payment Status Check
            if (orderName === 'order_paymentStatus' && orderEl.is(':checked')) orderValue = 1;
            if (orderName === 'order_paymentStatus' && !orderEl.is(':checked')) orderValue = 0;


            // Post form
            let orderData = new FormData();
            orderData.append('edit_order', 'true');
            orderData.append('order_id', orderId);
            orderData.append('order_field_name', orderName);
            orderData.append('order_field_value', orderValue);
            orderData.append('field_id', field_id);

            axios.post('group_buy_api.php', orderData).then(res => {
                // console.log(res.data)
                if (res.data === 'success') {
                    Swal.fire(
                        '修改成功',
                        '訂單已更新',
                        'success'
                    )
                    ordersDisplay();
                    countOrders(orderId);
                }
            }).catch(err => {
                console.error(err)
            })

        }


        /**
         * @Range: Order.php
         *
         * Calc orders
         *
         */
        function countOrders(order_id) {
            if (!order_id) return;

            // Post form
            let countData = new FormData();
            countData.append('count_order', 'true');
            countData.append('order_id', order_id);

            const submitData = new AjaxData('group_buy_api.php', countOrderDisplay, countData);
            submitData.postJson();
        }

        function getStoreDeliveryAmount(orderTotal) {
            const storeId = $('#store_id').val();
            if (storeId.length === 0) return;
            const getDeliveryAmountHandle = function (data) {
                const amount = parseInt(data.store_full_price);
                let amountHtml = '';
                if (orderTotal > amount) {
                    amountHtml = `<span class="item group-full"><i class="fas fa-truck mr-1"></i>已成團</span>`
                } else {
                    amountHtml = `<span class="item group-yet"><i class="fas fa-dizzy mr-1"></i>未成團</span>`
                }
                $('#deliveryAmount').empty().append(amountHtml);
            }
            const submitData = new AjaxData('group_buy_api.php?res=store&store_id=' + storeId, getDeliveryAmountHandle);
            submitData.get();
        }

        function countOrderDisplay(totalData) {
            // console.log(totalData)
            let orderTotalHeadHtml = '';
            let orderTotalBodyHtml = '';
            let orderTotalHtml = '';
            let allTotal = 0;

            for (let k in totalData) {
                let buyerName = totalData[k].buyerName.split(',');  // 訂購人

                allTotal += parseInt(totalData[k].subTotal);  // 總金額

                let buyerNameHtml = '';
                buyerName.forEach((v, k) => {
                    buyerNameHtml += `
            <li class="btn btn-outline-info py-0 px-1 mr-2 mt-2">${v}</li>
            `
                })
                orderTotalHeadHtml = `
            <div class="th row py-0 ">
                <div class="col-sm-3 td">
                    <span>點餐內容</span>
                </div>
                <div class="col-sm-2">
                     <span>數量</span>
                </div>
                <div class="col-sm-2">
                    <span>價格</span>
                </div>
                <div class="col-sm-2">
                    <span>小計</span>
                </div>
                <div class="col-sm-3">
                    <span>訂購人</span>
                </div>
            </div>
            `;
                orderTotalBodyHtml += `
            <div class="tr row py-0">
                <div class="col-sm-3">
                    <span>${totalData[k].meal}</span>
                </div>
                <div class="col-sm-2">
                    <span>${totalData[k].order_number}</span>
                </div>
                <div class="col-sm-2">
                    <span>${totalData[k].price}</span>
                </div>
                <div class="col-sm-2">
                    <span>${totalData[k].subTotal}</span>
                </div>
                <div class="col-sm-3">
                    <ul class="d-flex flex-wrap">
                    ${buyerNameHtml}
                    </ul>
                </div>
            </div>
        `;
                orderTotalHtml = `
            <div class="th row py-0 ">
                <div class="col-sm-3"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>NT$${allTotal}</span>
                </div>
                <div class="col-sm-3"></div>
            </div>  
            `
            }
            $('#orderTotal').empty().append(orderTotalHeadHtml).append(orderTotalBodyHtml).append(orderTotalHtml);

            if ($('#orderTotalNum').length > 0) $('#orderTotalNum').empty().append(allTotal);

            getStoreDeliveryAmount(allTotal);  // 獲取外送門檻是否達標

        }

        /**
         * @Range: Order.php
         *
         * Delete order
         *
         */
        function deleteOrder(event) {
            event.preventDefault();
            const fieldId = $(this).parents('.order-item').find('.field_id').val();
            let deleteOrderHandel = function () {
                const delOrder = new AjaxData(`group_buy_api.php?del=${fieldId}`, ordersDisplay)
                delOrder.get();
            }
            const alertConfirm = new SwalAlert('你確定要刪除嗎？', "這項操作是沒辦法還原的！", '是的，我要刪除', '', deleteOrderHandel)
            alertConfirm.fireConfirm();
        }


        /**
         * @Range: Edit-Account.php
         *
         * Add host name , edit host name
         *
         */
        function addHostName() {
            $('#add_hostName').on('click', addHostNameHandle);
            // 一開始先載入所有 hostname
            const getHostName = new AjaxData('group_buy_api.php?res=hostname', hostNameDisplay);
            getHostName.get()
        }

        function addStoreTag() {
            $('#add_storeTag').on('click', addHostNameHandle);
            const getStoreTag = new AjaxData('group_buy_api.php?res=store_tags', storeTagsDisplay);
            getStoreTag.get();
        }


        function hostNameDisplay(data) {
            let hostNameHtml = ''
            for (let v of data) {
                hostNameHtml += `
            <div class="col-sm-3 mt-2">
                <div class="row no-gutters hostname-field">
                    <div class="col-sm-8">
                        <input type="hidden" name="host_id" value="${v['id']}">
                        <input type="text" name="host_name"
                               class="form-control "
                               value="${v['host_name']}" disabled>
                    </div>
                    <div class="col-sm-4">
                        <a href="javascript:;" class="btn-del-host" title="刪除此項">
                            <svg class="icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            `;
            }
            $('#hostname_block').empty().append(hostNameHtml);
            $('.btn-del-host').on('click', delHostName);
        }


        function storeTagsDisplay(data) {
            "use strict"
            // console.log(data)

            let storeTags = []
            data.forEach(v => {
                const storeId = parseInt(v.id)
                // console.log(v)
                //TODO 能執行但會報錯 因為 v.store_tag = undefined
                const tags = v.store_tag.split(',')  // 取出單一tag
                tags.forEach(item => {
                    storeTags.push({tag: item, storeId: storeId.toString()})
                })
            })

            // console.log(storeTags)
            let result = [], tempArr = []
            storeTags.forEach(item => {
                if (!this[item.tag]) {
                    this[item.tag] = {tag: item.tag, id: ''}
                    result.push(this[item.tag])
                }
                let idSp = this[item.tag].id.length > 0 ? ',' : ''
                tempArr.push(idSp + item.storeId)
                this[item.tag].id += tempArr
                tempArr = []
            })
            // console.log(result)


            let storeTagsHtml = '';
            result.forEach((value, key) => {
                // console.log(value);
                storeTagsHtml += `
            <div class="col-sm-3 mt-2">
                <div class="row no-gutters storeTag-field">
                    <div class="col-sm-8">
                        <input type="hidden" name="store_tag_id" value="${value.id}">
                        <input type="text" name="store_tag"
                               class="form-control "
                               value="${value.tag}" disabled>
                    </div>
                    <div class="col-sm-4">
                        <a href="javascript:;" class="btn-del-storeTag" title="刪除此項">
                            <svg class="icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            `;
            })

            $('#storeTag_block').empty().append(storeTagsHtml);
            $('.btn-del-storeTag').on('click', delStoreTag);
        }


        // Add Host Name
        function addHostNameHandle() {
            const addHostName = $('input[name="add_host_name"]');
            if (addHostName.val().length === 0) {
                const swalAlert = new SwalAlert('error', '操作錯誤', '沒有輸入資料')
                swalAlert.fire();
                return;
            }
            let dataForm = new FormData();
            dataForm.append('add_host_name', '1');
            dataForm.append('host_name', addHostName.val());
            addHostName.val('')

            const submitData = new AjaxData('group_buy_api.php', getHostName, dataForm);
            submitData.post()
        }


        // Host name display
        function getHostName() {
            const getHostName = new AjaxData('group_buy_api.php?res=hostname', hostNameDisplay)
            getHostName.get();
        }

        function getStoreTag() {
            const getStoreTag = new AjaxData('group_buy_api.php?res=store_tags', storeTagsDisplay);
            // getStoreTag.get(); TODO 先註解
        }


        function delStoreTag() {
            const tagField = $(this).parents('.storeTag-field');
            const storeId = tagField.find('input[name="store_tag_id"]').val();
            const storeTags = tagField.find('input[name="store_tag"]').val();
            const delStoreTag = new AjaxData('group_buy_api.php?res=del_tag&store_id=' + storeId + '&store_tags=' + storeTags, getStoreTag);
            const delHostNameHandle = function () {
                delStoreTag.get();
            }
            const alertConfirm = new SwalAlert('你確定嗎？', "這項操作不能復原", '是的！我要刪除', '', delHostNameHandle);
            alertConfirm.fireConfirm()
        }


        // Delete Host name
        function delHostName() {
            const btn = $(this);
            const hostId = btn.parents('.hostname-field').find('input[name="host_id"]').val();
            const delHostName = new AjaxData('group_buy_api.php?res=del_hostname&host_id=' + hostId, getHostName);
            const delHostNameHandle = function () {
                delHostName.get();
            }
            const alertConfirm = new SwalAlert('你確定嗎？', "這項操作不能復原", '是的！我要刪除', '', delHostNameHandle);
            alertConfirm.fireConfirm()
        }
    }
)