/**
 * @Range: index.php,
 *
 * Modal display
 *
 */
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
 * @Range: index.php
 *
 * Random store
 *
 */
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
    // Only index load
    if ($('.page__index').length) {
        showOrder();
    }


    // Get group-buy data
    function showOrder() {
        // axios get multiple urls
        const total_orders = axios.get('group_buy_api.php?res=total_orders');
        const groupBuy = axios.get('group_buy_api.php?res=buy');

        axios
            .all([groupBuy, total_orders])
            .then(
                axios.spread((...res) => {
                    const res1 = res[0];
                    const res2 = res[1];
                    groupBuyDisplay(res1.data, res2.data)
                })
            )
            .catch(errors => {
                console.error(errors)
            })
    }

    // Order calc in index.php
    // function indexOrdersCalc(totalOrders, order_id) {
    //     console.log(totalOrders, order_id)
    //     // 1. 預估金額
    //     // 2. 跟團人數
    //     // 3. 截止時間*
    //     // 4. 目前金額
    //
    //
    // }


    // Calc total price and total people of order id.
    function indexOrdersCalc(json, order_id) {
        let sum = 0;
        let name = [];
        json.forEach(item => {
            if(item.order_id === order_id){
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


    function groupBuyDisplay(groupBuy, totalOrders) {
        if (groupBuy.length === 0) {
            $('#current_groupBuy').text('目前沒有訂單')
        }
        $('#current_groupBuy').html(`進行中的訂單 <b>${groupBuy.length}</b>`)

        let orderBlock = '';
        for (let i = 0; i < groupBuy.length; i++) {
            // Calc orders
            const orderCalc = indexOrdersCalc(totalOrders, groupBuy[i].id)
            const oneOrderSum = orderCalc.totalPrice;
            const oneOrderNum = orderCalc.totalName.length;
            // Calc left time
            const end_time = new Date(groupBuy[i].end_time).getTime();
            const left_time = moment(end_time).fromNow()

            orderBlock += `
        <div class="col-sm-3 mb-3">
            <ul>
                <li>總金額：$${oneOrderSum}</li>
                <li>已付金額：$0</li>
                <li>跟團人數：${oneOrderNum} 人</li>
                <li>截止時間：${left_time}</li>
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




/**
 * @Range: Order.php
 *
 * Get order item of these order.
 *
 */
    // Only order page load
    if ($('.page__order').length) {
        ordersDisplay();
        $('#order_form').on('submit', sumbitOrder);  // Submit order
    }


    // Orders display
    function ordersDisplay() {
        const order_id = $('#order_id').val();

        // If not order id
        if (!order_id) {
            let timerInterval;
            Swal.fire({
                title: '未獲取到訂單編號',
                html: '<b></b> 毫秒後跳轉到首頁',
                icon: 'error',
                timer: 3000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                                b.textContent = Swal.getTimerLeft()
                            }
                        }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    // console.log('I was closed by the timer')
                    // window.location.href = 'index.php';
                }
            })
        }


        // Ajax to get order list
        axios.get(`group_buy_api.php?res=order_list&order_id=${order_id}`).then(res => {
            // console.log(res.data)
            ordersListDisplay(res.data)
        }).catch(err => {
            console.error(err)
        })
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

        // Orders number
        if (ordersData.length === 0) {
            $('#ordersNum').text('目前還沒有訂單')
        }
        $('#ordersNum').html(`共有 ${totalName.length} 人參與團購，累積有 <b>${ordersData.length}</b> 筆訂單，總金額 ${totalPrice} 元`)


        // Display
        let orderListHtml = '';
        for (let i = 0; i < ordersData.length; i++) {
            orderListHtml += `
        <div class="row py-2 rounded order-item">
            <div class="col-sm-3">
                <input type="hidden" name="field_id" value="${ordersData[i].field_id}" class="field_id">
                <input type="text" class="form-control" value="${ordersData[i].order_name}" name="order_name"
                       placeholder="請輸入姓名 *" data-field="姓名">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" value="${ordersData[i].order_meal}" name="order_meal"
                       placeholder="請輸入餐點名稱 *" data-field="餐點名稱">
            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control" value="${ordersData[i].order_price}" name="order_price"
                       placeholder="請輸入價格 *" data-field="價格">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" value="${ordersData[i].order_remark}" name="order_remark"
                       placeholder="請輸入備註" data-field="備註">
            </div>
            <div class="col-sm-1">
                <a class="btn delete_order" title="刪除此筆訂單">
                      <svg class="icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z"></path></svg>
                </a>
            </div>        

        </div>
        `
        }
        $('#order-list').empty().append(orderListHtml);


        // Call edit order function
        $('#order-list input[name^="order"]').on('change', editOrder);

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
    function sumbitOrder(event) {
        event.preventDefault()

        const order_id = $('input[name=add_order_id]');
        const order_name = $('input[name=add_order_name]');
        const order_meal = $('input[name=add_order_meal]');
        const order_price = $('input[name=add_order_price]');
        const order_remark = $('input[name=add_order_remark]');

        if (!checkInputVal(order_price, '價格')) return;
        if (!checkInputVal(order_meal, '餐點內容')) return;
        if (!checkInputVal(order_name, '姓名')) return;


        let data = new FormData();
        data.append('add_order', 'true');
        data.append('order_id', order_id.val());
        data.append('order_name', order_name.val());
        data.append('order_meal', order_meal.val());
        data.append('order_price', order_price.val());
        data.append('order_remark', order_remark.val());

        order_name.val('');
        order_meal.val('');
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
                ordersDisplay();
            }
        }).catch(err => {
            console.error(err)
        })
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
        // element.addClass('is-valid');
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
        const orderValue = orderEl.val();
        const orderId = $('#order_id').val();
        const field_id = orderEl.parents('.order-item').find('.field_id').val();
        const orderTitle = orderEl.attr('data-field')

        // Check input value not empty.
        if (orderName !== 'order_remark') {  // Order remark not require.
            if (!checkInputVal(orderEl, orderTitle)) {
                // ordersDisplay();  // Reload order data
                return;
            }
        }


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
            }
        }).catch(err => {
            console.error(err)
        })

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

        // Are you sure to delete this record?
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        })

        swalWithBootstrapButtons.fire({
            title: '你確定要刪除嗎？',
            text: "這項操作是沒辦法還原的！",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '是的，我要刪除',
            cancelButtonText: '取消',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                // swalWithBootstrapButtons.fire(
                //     '訂單操作成功',
                //     '您的資料已經被刪除。',
                //     'success'
                // )
                deleteOrderAct();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '訂單操作取消',
                    '您的資料是安全的 :)',
                    'error'
                )
            }
        })

        function deleteOrderAct() {
            axios.get(`group_buy_api.php?del=${fieldId}`).then(res => {
                // console.log(res.data)
                if (res.data === 'success') {
                    Swal.fire(
                        '刪除成功',
                        '訂單已更新',
                        'success'
                    )
                    ordersDisplay();
                }
            }).catch(err => {
                console.error(err)
            })
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