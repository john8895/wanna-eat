// import {Order} from './include/order.inc.js';
// import { orderApp } from './include/order.app.js';

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
    constructor(api = '', callback, data) {
        this.api = api;
        this.callback = callback;
        this.data = data;
    }
    
    get() {
        axios
            .get(this.api)
            .then(res => {
                this.callback(res.data);
            })
            .catch(err => {
                console.error(err);
            })
    }
    
    // Get echo 'success'
    post() {
        axios.post(this.api, this.data).then(res => {
            console.log(res)
            if (res.data) {
                const showMessage = new SwalAlert('操作成功', '資料已新增', '', 'success')
                showMessage.fire()
                this.callback();
            }
        }).catch(err => {
            console.error(err)
        })
    }
    
    // Post json
    postJson() {
        axios.post(this.api, this.data).then(res => {
            // console.log(res.data)
            this.callback(res.data);
        }).catch(err => {
            console.error(err)
        })
    }
}

/**
 * @Range: index.php,
 * Modal display
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
        function showOrder(res = '') {
            
            if (res === 'error') {
                return new SwalAlert('操作失敗', '未登入或是找不到該訂單 ID，沒有資料被刪除', '', 'error').fire();
            } else if (res === 'success') {
                const alert = new SwalAlert('操作成功', '已刪除一筆團購單', '', 'success').fire();
            }
            
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
                        // console.log(res1.data, res2.data, res3.data, groupBuyHistory)
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
            let groupBuyData;
            let groupText = '';
            if (groupBuyHistory) {
                groupBuyData = groupBuyHistory;
                groupText = '過往的團購單數&nbsp;&nbsp;';
            } else {
                groupBuyData = groupBuy;
                groupText = '進行中團購&nbsp;&nbsp;';
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
                const left_time = moment(end_time).fromNow()  // 比較當日獲取還剩幾分鐘收單
                
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
        
        
        /**
         * @Range: index.php
         * Delete group-buy
         */
        function delGroupBuy() {
            const group_id = $(this).data('groupid');
            if (!group_id) return;
            
            let delData = new FormData();
            delData.append('group_id', group_id);
            
            const delGroupBuyAct = new AjaxData(`group_buy_api.php`, showOrder, delData);
            
            const delGroupBuyVar = function () {
                delGroupBuyAct.postJson();
            }
            
            let alertInfo = new SwalAlert('你確定要刪除嗎？', "這項操作是沒辦法還原的！", '是的，我要刪除', '', delGroupBuyVar);
            alertInfo.fireConfirm()
        }
        
        
        /**
         * @Range: Edit-Account.php
         * Add host name , edit host name
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
            let storeTags = []
            data.forEach(v => {
                const storeId = parseInt(v.id)
                const tags = v.store_tag.split(',')  // 取出單一tag
                tags.forEach(item => {
                    storeTags.push({tag: item, storeId: storeId.toString()})
                })
            })
            
            // tag 所屬 id 組成 可輸出之 array
            let result = [], tempArr = []
            storeTags.forEach(item => {
                if (!this[item.tag]) {  // 如果第一次載入
                    this[item.tag] = {tag: item.tag, id: ''}
                    result.push(this[item.tag])
                }
                let idSp = this[item.tag].id.length > 0 ? ',' : ''  // 如果array不為空，在資料後方加分號
                tempArr.push(idSp + item.storeId)
                this[item.tag].id += tempArr
                tempArr = []  // 清空array
            })
            
            
            // 輸出資料
            let storeTagsHtml = '';
            for (const value of result) {
                // console.log(value);
                if (value.tag === '') continue;  // 如果tag為空則不輸出
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
            }
            
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
            getStoreTag.get();
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
        
        
        // Dynamic Tabs
        (function dynamicTabs() {
            $('.tab li').click(function () {
                $(this).addClass('active').siblings().removeClass('active');
                let index = $(this).index();
                $('.main-content-item').eq(index).addClass('selected').siblings().removeClass('selected')
            })
        })()
    }
)

/******************
 * Vue 3
 ******************/
// Member
const vueMember = {
    data() {
        const registerFormFields = {
            name: '',
            email: '',
            password: '',
            passwordConfirm: '',
        }
        return {
            registerFormFields,
        }
    },
    methods: {
        register(e) {
            e.preventDefault();
            if (!this.registerFromValidate()) return;
            
            const registerFormData = new FormData();
            registerFormData.append('method', 'register');
            registerFormData.append('name', this.registerFormFields.name);
            registerFormData.append('email', this.registerFormFields.email);
            registerFormData.append('password', this.registerFormFields.password);
            
            this.fetchData(this.ORDER_API, 'POST', this.registerHandler, registerFormData);
        },
        registerFromValidate() {
            console.log(55)
            
            return true;
        },
        registerHandler(response) {
            response.text()
                .then(result => {
                    console.log(result);
                })
        }
    }
}

// Login
const vueLogin = {
    methods: {
        recaptchaHandler(token) {
            // console.log(token);
            const username = this.$refs.username.value;
            const password = this.$refs.password.value;
            
            if (!this.loginValidateForm(username, password)) {
                this.smartAlert('前端登入失敗', '帳號或密碼沒有填寫', 'error');
                return;
            }
            
            const recaptchaData = new FormData();
            recaptchaData.append('method', 'recaptcha');
            recaptchaData.append('username', username);
            recaptchaData.append('password', password);
            recaptchaData.append('g-recaptcha-response', token);
            
            // 傳送 token 至後端驗證 recaptcha
            const callback = (response) => {
                response.text()
                    .then(result => {
                        if (result === '0') {
                            this.smartAlert('登入失敗', '帳號或密碼錯誤，請重新輸入', 'error');
                            return;
                        }
                        if (result === '2') {
                            this.smartAlert('登入失敗', '帳號或密碼沒填寫', 'error');
                            return;
                        }
                        if (result === '1') {
                            this.smartAlert('登入成功', '跳轉至首頁', 'success');
                            setTimeout(() => {
                                window.location.href = './index.php';
                            }, 3000)
                        } else {
                            throw new Error(`${result}`);  // 例外錯誤
                            // console.log(result);  // 例外錯誤
                        }
                        // console.log(result)
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
            this.fetchData(this.ORDER_API, 'POST', callback, recaptchaData);
        },
        // 登入驗證
        loginValidateForm(username, password) {
            return !(!username || !password);
        },
    },
    
    mounted() {
        window.recaptchaHandler = this.recaptchaHandler;
    },
}

// 餐廳
const vueStore = {
    data() {
        return {
            storeFormField: {
                name: null,
                phone: null,
                cover: null,
                menu: null,
                description: '',
                fullPrice: 0,
                tags: [],
                errors: [],
            },
            editStoreData: {},
            storeData: {},
            allStores: {},
        }
    },
    methods: {
        // 拖移上傳圖片及縮圖處理
        dragAndFileUpload() {
            const ref = this;
            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
                const dropZoneElement = inputElement.closest(".drop-zone");
                // const resizeImage = ref.$refs.resizeImage || 0;
                // console.log(resizeImage)
                
                /*********************
                 * 改變樣式
                 ********************/
                // 拖移圖片至區域
                dropZoneElement.addEventListener("dragover", (e) => {
                    e.preventDefault();
                    dropZoneElement.classList.add("drop-zone--over");
                });
                // 拖移圖片離開
                ["dragleave", "dragend"].forEach((type) => {
                    dropZoneElement.addEventListener(type, (e) => {
                        dropZoneElement.classList.remove("drop-zone--over");
                    });
                });
                
                /*********************
                 * 觸發事件  Change Event
                 ********************/
                dropZoneElement.addEventListener("click", (e) => {
                    inputElement.click();  // 點選input
                });
                
                // 點選 input 事件
                inputElement.addEventListener("change", (e) => {
                    
                    if (inputElement.files.length) {
                        if (!fileSizeValid(inputElement.files[0])) return;  // 驗證檔案大小及產生縮圖
                    }
                });
                // 拖移事件
                dropZoneElement.addEventListener("drop", (e) => {
                    e.preventDefault();
                    console.log(e.dataTransfer.files[0])
                    
                    if (e.dataTransfer.files[0]) {
                        if (!fileSizeValid(e.dataTransfer.files[0])) return;  // 驗證檔案大小及產生縮圖
                    }
                    dropZoneElement.classList.remove("drop-zone--over");
                });
                
                /*********************
                 * 檔案大小驗證
                 ********************/
                const fileSizeValid = (_file) => {
                    // 縮圖小幫手  如果有特定 class
                    if (inputElement.classList.contains('resize-image')) {
                        ref.imageResize(dropZoneElement, _file);
                        return false;
                    }
                    
                    const size = parseInt(_file.size / 1000);
                    if (size > 1000) {
                        ref.smartAlert('提示', '上傳圖檔超過 1MB，請縮圖後再上傳，謝謝', 'error');
                        return false;
                    }
                    // 生成縮圖
                    updateThumbnail(dropZoneElement, _file);
                    
                    // Set file to vue variable
                    if (inputElement.classList.contains('store-cover')) ref.storeFormField.cover = _file;
                    if (inputElement.classList.contains('store-menu')) ref.storeFormField.menu = _file;
                    
                    return true;
                }
            });
            
            
            // 產生縮圖
            function updateThumbnail(dropZoneElement, file) {
                let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
                
                // first time 第一次進入
                if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                    dropZoneElement.querySelector(".drop-zone__prompt").remove();
                }
                
                // first time 第一次進入
                if (!thumbnailElement) {
                    thumbnailElement = document.createElement("div");
                    thumbnailElement.classList.add("drop-zone__thumb");
                    dropZoneElement.appendChild(thumbnailElement);
                }
                
                thumbnailElement.dataset.label = `${file.name} / ${parseInt(file.size / 1000)}KB`;
                
                
                /*********************
                 * 顯示縮圖在區域
                 ********************/
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        while (thumbnailElement.firstChild) {  // 移除上次置入的圖片
                            thumbnailElement.firstChild.remove();
                        }
                        // const img = new Image();
                        const img = document.createElement("img");
                        img.src = reader.result;
                        thumbnailElement.appendChild(img);
                    };
                }
            }
        },
        // 圖片縮圖
        imageResize(dropZoneElement, file) {
            const ref = this;
            if (!file) throw new Error("file is required");  // 如果沒有 file 扔出錯誤
            
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
            
            // first time 第一次進入
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }
            
            // first time 第一次進入
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }
            
            const reader = new FileReader();
            reader.readAsDataURL(file);  // 將圖片編碼成 Data URL
            
            reader.onload = function (event) {
                const imageElement = document.createElement("img");
                imageElement.src = event.target.result.toString();
                
                /*********************
                 * 圖片縮小
                 ********************/
                imageElement.onload = function (e) {
                    const canvas = document.createElement("canvas");
                    const MAX_WIDTH = 750;  // 最大寬度
                    const scaleSize = MAX_WIDTH / e.target.width; // ex:0.6 得到縮小比例
                    const ctx = canvas.getContext("2d");
                    
                    canvas.width = MAX_WIDTH;
                    canvas.height = e.target.height * scaleSize; // 等比高度
                    // 繪圖
                    ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);
                    
                    // 輸出圖檔 (toBlob 可處理10MB以上檔案)
                    canvas.toBlob(
                        (blob) => {
                            // resultUrl =  URL.createObjectURL(blob);
                            const url = URL.createObjectURL(blob);
                            // 移除
                            while (thumbnailElement.firstChild) {
                                thumbnailElement.firstChild.remove();
                            }
                            
                            const img = document.createElement("img");
                            img.src = reader.result;
                            thumbnailElement.appendChild(img);
                            
                            // 建立下載連結
                            const link = document.createElement("a");
                            const fileName = new Date().getTime();  // 生成不重覆檔名
                            link.href = url;
                            link.download = `download-${fileName}.jpg`;
                            link.click();
                            URL.revokeObjectURL(url);
                        },
                        "image/jpeg",
                        1
                    );
                };
            };
        },
        // 新增或修改餐廳 驗證
        checkStoreForm(e, method = '') {
            e.preventDefault();
            // const ref = this;
            const field = method === 'addStore' ? this.storeFormField : this.editStoreData;
            const storeName = this.$refs.storeName;
            const storePhone = this.$refs.storePhone;
            const storeCover = this.$refs.storeCover;
            const storeMenu = this.$refs.storeMenu;
            
            field.errors = [];  // 一開始先清空錯誤
            
            // 欄位檢查通過
            if (method === 'addStore' && field.name && field.phone && this.storeFormField.cover && this.storeFormField.menu) {
                this.addStore();
            }
            if (method === 'editStore' && field.name && field.phone) {
                this.editStore();
            }
            
            // 先移除全部錯誤提示CLASS
            const removeInvalidClass = (() => {
                [storeName, storePhone].forEach(item => {
                    item.classList.remove('is-invalid');
                });
                [storeCover, storeMenu].forEach(item => {
                    item.closest('.drop-zone').classList.remove('is-invalid');
                })
            })();
            
            // Add Invalid Class
            const fieldIsInvalidClassAdd = (element) => {
                element.classList.add('is-invalid');
                element.focus = true;
            }
            
            // 新增餐廳  驗證欄位
            const addStoreFieldValidation = () => {
                // 各欄位檢查
                if (!this.storeFormField.cover) {
                    field.errors.push('餐廳封面是必填');
                    fieldIsInvalidClassAdd(storeCover.closest('.drop-zone'));
                }
                if (!this.storeFormField.menu) {
                    field.errors.push('餐廳菜單是必填');
                    fieldIsInvalidClassAdd(storeMenu.closest('.drop-zone'));
                }
                if (!field.name) {
                    field.errors.push('餐廳名稱是必填');
                    fieldIsInvalidClassAdd(storeName);
                }
                if (!field.phone) {
                    field.errors.push('餐廳電話是必填');
                    fieldIsInvalidClassAdd(storePhone);
                }
            }
            // todo 9/30 cover menu validation 要測試
            // 修改餐廳  驗證欄位
            const editStoreFieldValidation = () => {
                console.log(this.storeFormField.cover)
                if (this.storeFormField.cover) {
                    field.cover = this.storeFormField.cover;
                }  // else field.cover = null;
                if (this.$refs.storeMenu.files.length) {
                    field.cover = storeMenu.files[0];
                }
                if (!this.$refs.storeName.value) {
                    field.errors.push('餐廳名稱是必填');
                    fieldIsInvalidClassAdd(storeName);
                } else {
                    field.name = this.$refs.storeName.value;
                }
                if (!this.$refs.storePhone.value) {
                    field.errors.push('餐廳電話是必填');
                    fieldIsInvalidClassAdd(storePhone);
                } else {
                    field.phone = this.$refs.storePhone.value;
                }
            }
            
            if (method === 'addStore') addStoreFieldValidation();
            if (method === 'editStore') editStoreFieldValidation();
            
            
            if (field.errors.length > 0) {
                this.smartAlert('錯誤', `${field.errors.join('<br>')}`, 'error');
            }
        },
        // 新增餐廳
        addStore() {
            const field = this.storeFormField;
            const storeCover = this.storeFormField.cover;
            const storeMenu = this.storeFormField.menu;
            
            const addStoreData = new FormData();
            addStoreData.append('method', 'addStore');
            addStoreData.append('name', field.name);
            addStoreData.append('description', field.description);
            addStoreData.append('phone', field.phone);
            addStoreData.append('storeFullPrice', field.fullPrice);
            addStoreData.append('storeTag', field.tags);
            addStoreData.append('storeCover', storeCover);
            addStoreData.append('images', storeMenu);
            const callback = (response) => {
                response.text()
                    .then((result) => {
                        if (result === '1') {
                            this.smartAlert('新增餐廳成功', `已新增${field.name}<br>將跳轉至首頁`);
                            setTimeout(() => {
                                window.location.href = './index.php';
                            }, 3000)
                        } else if (result === '2') {
                            this.smartAlert('圖檔過大', '請檢查要上傳的檔案', 'error');
                        } else {
                            this.smartAlert('後端檢查失敗', `錯誤訊息：${result}`, 'error');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        this.smartAlert('新增餐廳失敗', `未新增${field.name}<br>錯誤訊息：${error}`, 'error');
                    })
            }
            this.fetchData(this.ORDER_API, 'POST', callback, addStoreData);
        },
        // 修改餐廳
        editStore() {
            const field = this.editStoreData;
            const storeCover = this.storeFormField.cover;
            const storeMenu = this.storeFormField.menu;
            // const storeCover = this.$refs.storeCover.files[0] || 0;
            // const storeMenu = this.$refs.storeMenu.files[0] || 0;
            const getUrlId = () => {  // 取得網址帶的id
                const url = window.location.href.split('?')[1];
                if (!url) throw new Error('Missing url');
                return url.split('?').join().substr(3);  // 取得 Store Id
            }
            const storeId = getUrlId();  // 取得 Store Id
            
            // 移除 beforeunreload 事件上的阻止重整
            window.removeEventListener('beforeunload', this.stopReloadPageHandler);
            
            const editStoreData = new FormData();
            editStoreData.append('method', 'editStore');
            editStoreData.append('id', storeId);
            editStoreData.append('name', field.name);
            editStoreData.append('description', field.description);
            editStoreData.append('phone', field.phone);
            editStoreData.append('storeFullPrice', field.store_full_price);
            editStoreData.append('storeTag', field.store_tag);
            if (storeCover) editStoreData.append('storeCover', storeCover);
            if (storeMenu) editStoreData.append('images', storeMenu);
            const callback = (response) => {
                response.text()
                    .then((result) => {
                        if (result === '1') {
                            this.smartAlert('修改餐廳成功', `已修改${field.name}<br>將跳轉至首頁`);
                            setTimeout(() => {
                                window.location.href = './index.php';
                            }, 3000)
                        } else if (result === '2') {
                            this.smartAlert('圖檔過大', '請檢查要上傳的檔案', 'error');
                        } else {
                            this.smartAlert('後端檢查失敗', `錯誤訊息：${result}`, 'error');
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        this.smartAlert('新增餐廳失敗', `未新增${field.name}<br>錯誤訊息：${error}`, 'error');
                    })
            }
            this.fetchData(this.ORDER_API, 'POST', callback, editStoreData);
        },
        // 取得餐廳資料  自網址參數
        getStoreById() {
            const getUrlId = () => {  // 取得網址帶的id
                const url = window.location.href.split('?')[1];
                if (!url) return;
                return url.split('?').join().substr(3);  // 取得 Store Id
            }
            const storeId = getUrlId();  // 取得 Store Id
            this.getStoreByIdHandler(storeId, 'editStoreData');
        },
        // 取得餐廳資料  自網頁refs元素
        getStoreByRefsId() {
            const storeId = this.$refs.storeId.value;
            this.getStoreByIdHandler(storeId, 'storeData');
        },
        getStoreByIdHandler(_storeId, _dataVariable) {
            const callback = (response) => {
                response.json()
                    .then(result => {
                        console.log(result[0]);
                        if (_dataVariable === 'storeData') {
                            this.storeData = result[0];
                        }
                        if (_dataVariable === 'editStoreData') {
                            this.editStoreData = result[0];
                        }
                        this.orderNameTitleDisplay(result[0]);  // 網頁 title 顯示餐廳名稱
                    })
                    .catch((error) => {
                        throw new Error(`讀取遠端資料失敗：${error}`);
                    })
            }
            this.fetchData(`${this.ORDER_API}?request=getOrdersById&storeId=${_storeId}`, 'GET', callback);
        },
        // 網頁 title 顯示餐廳名稱
        orderNameTitleDisplay(_storeData) {
            const originalTitle = document.title;
            document.title = `${originalTitle} - ${_storeData.name}`;
        },
        // 阻止頁面重整
        stopReloadPage() {
            window.addEventListener('beforeunload', this.stopReloadPageHandler)
        },
        stopReloadPageHandler(e) {
            e.returnValue = 'Are you sure leave the page?';
        },
        // 一鍵擷圖
        orderScreenshot() {
            html2canvas(document.querySelector('#screenCapture'))
                .then(canvas => {
                    const dataURL = canvas.toDataURL('image/png');
                    
                    let img = new Image();
                    img.src = dataURL;
                    img.onload = () => {
                        // todo: 10/1 無法在window.open開啟
                        // window.open('', '');
                        // open.document.write(dataURL);
                        // window.open(dataURL, '_blank');
                        // const screenDiv = document.createElement('div');
                        // screenDiv.classList.add('screen-capture');
                        
                        const screenDisplay = document.querySelector('#screenCaptureDisplay');
                        while (screenDisplay.firstChild) {
                            screenDisplay.removeChild(screenDisplay.firstChild)
                        }
                        // screenDiv.appendChild(img);
                        screenDisplay.appendChild(img);
                    }
                });
        },
        // 取得所有餐廳
        getALlStores() {
            this.fetchData(`${this.ORDER_API}?request=getAllStores`, 'GET', response => {
                response.json()
                    .then(allStoreData => {
                        console.log(allStoreData);
                        // todo: 10/8 get all store handler
                        this.allStores = allStoreData;
                    })
            })
        }
    },
    mounted() {
        if (document.querySelector('.drop-zone__input')) this.dragAndFileUpload();  // 拖移圖片區域  @addOrder
        // 編輯餐廳
        if (this.$refs.method__editStore) {
            this.getStoreById();
            this.stopReloadPage();  // 阻止頁面重整
        }
        if (this.$refs.method__order) this.getStoreByRefsId();  // 訂單
        
        if (this.$refs.module__index) {
            this.getALlStores();
        }
    }
}

// Rating 評價
const vueStoreRating = {
    data() {
        const ratingFormField = {
            score: '0',
            comment: '',
        }
        return {
            ratingFormField,
        }
    },
    methods: {
        // add rating todo 10/1 新增評價
        postRating() {
            if (!this.ratingFormValidator()) return;
            const userId = parseInt('1');
            
            const ratingData = new FormData();
            ratingData.append('method', 'postRating');
            // todo: 10/1 獲取 userId
            ratingData.append('userId', userId);
            ratingData.append('storeId', parseInt(this.storeData.id));
            ratingData.append('score', this.ratingFormField.score);
            ratingData.append('comment', this.ratingFormField.comment);
            
            console.log('post end')
            this.fetchData(this.ORDER_API, 'POST', this.storeRatingHandler, ratingData);
        },
        // 評價欄位驗證
        ratingFormValidator() {
            if (this.ratingFormField.comment === '') {
                this.smartAlert('欄位檢查提醒', '請留下一些意見吧！', 'error');
                return false;
            }
            // if(!this.ratingFormField.score || this.ratingFormField.score === ''){
            //     this.smartAlert('錯誤', '無法獲取 User id', 'error');
            //     return false;
            // }
            if (!this.storeData.id || this.storeData.id === '') {
                this.smartAlert('錯誤', '無法獲取店家id', 'error');
                return false;
            }
            return true;
        },
        // Post rating data
        storeRatingHandler(response) {
            response.text()
                .then(result => {
                    console.log(result);
                })
                .catch(err => {
                    console.log(err);
                })
        }
    }
}

// 團購單
const vueGroupBuy = {
    data() {
        return {
            groupBuyData: {},
        }
    },
    methods: {
        // 讀取團購單
        getGroupBy() {
            const callback = (response) => {
                response.json()
                    .then(data => {
                        // console.log(data);
                        this.groupBuyData = data;
                        this.groupBuyDisplay();
                    })
            }
            this.fetchData(`${this.ORDER_API}?res=buy`, 'GET', callback);
        },
        // 團購單顯示
        groupBuyDisplay() {
            // console.log(this.groupBuyData)
        }
    },
    computed: {
        getGroupBuyState() {
            return this.groupBuyData.length > 0 ? `目前共 ${this.groupBuyData.length} 張團購單可參加` : '目前還沒有團購單';
        },
    },
    mounted() {
        this.getGroupBy();
    }
}

// 設定狀態 / 結束訂單&繼續訂購
const vueSetState = {
    data() {
        let state = {
            endOrder: false,
        }
        return {
            state,
        }
    },
    methods: {
        setState(newState) {
            this.state = {
                ...this.state,
                ...newState
            }
        },
        // 結束訂單
        endOrderTimeHandler() {
            const ref = this;
            const orderEndTime = this.$refs['order_endTime'];
            const endTime = new Date(orderEndTime.textContent);
            const today = new Date();
            
            if ((today - endTime) > 0) return;
            
            const newTime = new Date(today - 10000);
            const h = newTime.getHours() > 9 ? newTime.getHours() : '0' + newTime.getHours()
            const m = newTime.getMinutes() > 9 ? newTime.getMinutes() : '0' + newTime.getMinutes()
            const s = newTime.getSeconds() > 9 ? newTime.getSeconds() : '0' + newTime.getSeconds()
            const nowTime = `${newTime.getFullYear()}-${newTime.getMonth() + 1}-${newTime.getDate()} ${h}:${m}:${s}`
            const order_id = this.$refs['orderId'].value;
            
            // Post form
            let closeOrderData = new FormData();
            closeOrderData.append('method', 'closeOrder');
            closeOrderData.append('order_id', order_id);
            closeOrderData.append('end_time', nowTime);
            const act = new AjaxData('group_buy_api.php', closeOrderHandler, closeOrderData)
            act.postJson();
            
            function closeOrderHandler(res) {
                console.log(res)
                if (res) {
                    ref.smartAlert('已收單', '此單已無法增加訂單', 'success');
                    setTimeout(function () {
                        location.reload()
                    }, 2000)
                }
            }
        },
        // 繼續訂單
        continueOrderTimeHandler(orderId) {
            const ref = this;
            
            // 從資料庫取出結束時間， 加上比今天多一點時間，再寫回資料庫
            const currentTime = new Date();
            currentTime.setHours(currentTime.getHours() + 4);
            
            const h = currentTime.getHours() > 9 ? currentTime.getHours() : '0' + currentTime.getHours()
            const m = currentTime.getMinutes() > 9 ? currentTime.getMinutes() : '0' + currentTime.getMinutes()
            const s = currentTime.getSeconds() > 9 ? currentTime.getSeconds() : '0' + currentTime.getSeconds()
            const nowTime = `${currentTime.getFullYear()}-${currentTime.getMonth() + 1}-${currentTime.getDate()} ${h}:${m}:${s}`
            
            let orderEndTimeData = new FormData();
            orderEndTimeData.append('method', 'continueOrder');
            orderEndTimeData.append('order_id', orderId);
            orderEndTimeData.append('new_time', nowTime);
            const act = new AjaxData(`group_buy_api.php`, getOrderEndTimeHandler, orderEndTimeData).postJson();
            
            function getOrderEndTimeHandler(res) {
                console.log(res)
                if (res) {
                    ref.smartAlert('已恢復訂單', '可以繼續訂購', 'success');
                    setTimeout(function () {
                        location.reload()
                    }, 2000)
                }
            }
        },
        // 結束訂單：設定狀態
        endOrderTime() {
            this.setState({
                endOrder: true
            })
            this.endOrderTimeHandler();
        },
        // 繼續訂單：設定狀態
        continueOrderTime(orderId) {
            this.setState({
                endOrder: false
            })
            this.continueOrderTimeHandler(orderId);
        },
    }
}

// 訂單顯示
const vueOrderDisplay = {
    data() {
        let deliveryAmountLimit = false;
        return {
            ordersData: {},
            deliveryAmountLimit,
        }
    },
    methods: {
        // 載入團購訂單 #order.php
        getOrdersById() {
            if (!this.$refs['orderId']) return;
            const orderId = this.$refs['orderId'].value;
            const api = `${this.ORDER_API}?res=order_list&order_id=${orderId}`;
            
            this.fetchData(api, 'GET', this.ordersDisplay);
        },
        // 獲取外送門檻
        getStoreDeliveryAmount() {
            if (!this.$refs['storeId']) return;
            const storeId = this.$refs['storeId'].value;
            const orderTotal = this.orderDetails.priceTotal;  // 訂單總金額
            
            const deliveryAmountHandler = (response) => {
                response.json()
                    .then((data) => {
                        const limitAmount = parseInt(data.store_full_price);
                        if (orderTotal >= limitAmount) {  // 達外送門檻
                            this.deliveryAmountLimit = true;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
            
            this.fetchData(`${this.ORDER_API}?res=store&store_id=${storeId}`, 'GET', deliveryAmountHandler);
        },
        // 訂單顯示 #order.php
        ordersDisplay(orderData) {
            orderData.json()
                .then(orderData => {
                    this.ordersData = orderData;
                    this.calculateOrders(orderData);
                })
        }
    },
    created() {
    },
    beforeMount() {
    },
    mounted() {
    }
}

// 訂單操作
const vueOrderOperation = {
    data() {
        let postData = {
            orderNumber: 1,
        }
        return {
            postData,
        }
    },
    methods: {
        // 增加訂單
        postOrder(e) {
            e.preventDefault();
            // 取得訂單欄位資料
            if (!this.checkInputNonEmpty(this.$refs['orderName'], '姓名')) return;
            if (!this.checkInputNonEmpty(this.$refs['orderMeal'], '餐點內容')) return;
            if (!this.checkInputNonEmpty(this.$refs['orderPrice'], '價格')) return;
            if (!this.checkInputNonEmpty(this.$refs['orderNumber'], '數量')) return;
            // 驗證金額為正整數
            if (!this.validationAmount(this.$refs['orderPrice'], '價格')) return;
            
            // vue Proxy 操作
            const orderProxyHandler = {
                set(obj, prop, newVal) {
                    obj[prop] = newVal;
                    return true;
                }
            }
            const postOrderProxy = new Proxy(this.postData, orderProxyHandler);
            
            // 存入vue變數
            postOrderProxy.orderId = this.$refs['orderId'].value;
            postOrderProxy.orderName = this.$refs['orderName'].value;
            postOrderProxy.orderMeal = this.$refs['orderMeal'].value;
            postOrderProxy.orderPrice = this.$refs['orderPrice'].value;
            postOrderProxy.orderNumber = this.$refs['orderNumber'].value;
            postOrderProxy.orderRemark = this.$refs['orderRemark'].value;
            
            const postOrderData = new FormData();
            postOrderData.append('method', 'postOrder');
            postOrderData.append('orderId', this.postData.orderId);
            postOrderData.append('orderName', this.postData.orderName);
            postOrderData.append('orderMeal', this.postData.orderMeal);
            postOrderData.append('orderPrice', this.postData.orderPrice);
            postOrderData.append('orderNumber', this.postData.orderNumber);
            postOrderData.append('orderRemark', this.postData.orderRemark);
            
            // 清空欄位 Empty Field
            this.postData = {};
            
            // POST
            this.fetchData(this.ORDER_API, 'POST', this.getOrdersById, postOrderData);
            this.smartAlert('訂單操作', '訂單成功送出！');
        },
        // 檢查input欄位是否為空
        checkInputNonEmpty(_inputElement, _fieldName) {
            this.checkElementNonExists(_inputElement, _fieldName);  // 檢查元素是否存在
            
            if (!_inputElement.value) {
                this.smartAlert('訂單欄位檢查', `${_fieldName}不可為空`, 'error');
                _inputElement.classList.add('is-invalid');
                return false;
            }
            
            _inputElement.classList.remove('is-invalid');  // 如果沒錯就移除class
            return true;
        },
        // 檢查元素是否存在，不存在拋出錯誤
        checkElementNonExists(_inputElement, _fieldName) {
            if (!_inputElement) {
                throw new Error(`${_fieldName}欄位不存在，得到結果：${_inputElement}`);
            }
        },
        // 驗證輸入金額正確性
        validationAmount(_fieldElement, _fieldName = '') {
            const reg = /^[1-9]{1}[0-9]?/g;  // 1-無上限 正整數不可負數不可為 0
            try {
                if (_fieldElement.value.match(reg) === null) {
                    this.smartAlert('欄位檢查提醒', `${_fieldName} 請輸入不為 0 的正整數(不能是負數)<br>注意！資料尚未更新`, 'error');
                    _fieldElement.classList.add('is-invalid');
                    return false;
                }
                _fieldElement.classList.remove('is-invalid');
                return true;  // correct
            } catch (error) {
                console.log(error);
            }
            
        },
        // 修改訂單
        editOrder(inputElement) {
            if (!this.$refs['orderId']) throw new Error('Missing Order Id');
            const orderId = this.$refs['orderId'].value;
            const editFieldElement = inputElement.target;
            const fieldName = editFieldElement.name;  // 修改欄位名
            const fieldValue = editFieldElement.value;  // 修改值
            const fieldId = editFieldElement.dataset.fieldId;  // 修改值
            
            // 驗證金額為正整數
            const amountValidation = () => {
                console.log(editFieldElement.name)
                if (editFieldElement.name === 'order_price' || editFieldElement.name === 'order_number') {
                    if (!this.validationAmount(editFieldElement, editFieldElement.name)) return false;
                }
                return true;
            };
            if (!amountValidation()) return;
            
            
            // 建立post資料
            const editOrderData = new FormData();
            editOrderData.append('method', 'editOrder');
            editOrderData.append('order_id', orderId);
            editOrderData.append('order_field_name', fieldName);
            editOrderData.append('order_field_value', fieldValue);
            editOrderData.append('field_id', fieldId);
            const editOrderResultHandler = (response) => {
                response.text()
                    .then(result => {
                        if (result) {
                            this.smartAlert('修改成功', '訂單已更新', 'success');
                            this.getOrdersById();
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
            // POST
            this.fetchData(this.ORDER_API, 'POST', editOrderResultHandler, editOrderData);
        },
        // 刪除訂單
        deleteOrder(_deleteElement) {
            const deleteTarget = _deleteElement.target.closest('button');
            if (!deleteTarget) return;
            const fieldId = deleteTarget.dataset.fieldId;
            
            const deleteOrderResultHandler = (response) => {
                response.text()
                    .then(result => {
                        try {
                            if (result) {
                                this.smartAlert('刪除成功', '你的訂單已刪除', 'success');
                                this.getOrdersById();
                            }
                        } catch (e) {
                            throw new Error(`刪除訂單失敗！error：${e}`)
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
            
            const deleteOrderHandler = () => {
                const deleteOrderData = new FormData();
                deleteOrderData.append('method', 'deleteOrder');
                deleteOrderData.append('field_id', fieldId);
                this.fetchData(this.ORDER_API, 'POST', deleteOrderResultHandler, deleteOrderData);
            }
            
            this.smartConfirm('你確定要刪除嗎？', '這項操作是沒辦法還原的！', '是的，我要刪除', '', deleteOrderHandler);
            
        }
    }
}

// 訂單統計
const vueOrderCalculator = {
    data() {
        const orderDetails = {
            totalBuyerCount: 0,
            totalOrderCount: 0,
            priceTotal: 0,
        }
        return {
            orderTotal: {},
            orderDetails: {},
            allOrderRemarkState: false,
        }
    },
    methods: {
        /**************************
         * 訂單統計  合併相同餐點
         *************************/
        calculateOrders(orderData) {
            this.calcOrdersTotal(orderData);  // 計算訂單總計、不重覆購買人
            this.getStoreDeliveryAmount();  // 計算外送門檻
            
            /*
             * 【功能】
             * 1.同名餐點、價格合併，數量、小計加總，記錄所有訂購人
             * 2.同名餐點但備註不同要分別列出：餐點名稱、數量、單價、訂購人、備註
             * 3.訂單總計
             * 4.共幾人訂購、累計幾筆訂單
             */
            let subTotalNum = 0;
            let obj = {};
            
            // 合併相同餐點
            orderData.forEach((order) => {
                const id = order.order_meal;  // 雞排飯
                let _remark = order.order_remark;  // 備註
                const _orderPrice = parseInt(order.order_price);
                const _orderNumber = parseInt(order.order_number);
                
                if (_remark === '' || _remark === null) _remark = '';
                
                // 有同名餐點就合併計數與加總
                if (obj.hasOwnProperty(id)) {  // object.hasOwnProperty() 搜尋物件內的 key
                    subTotalNum = obj[id].subTotal + (_orderPrice * _orderNumber);
                    obj[id].buyerName.push(order.order_name);  // 全部訂購人
                    obj[id].remarks.push({
                        'buyerName': order.order_name,
                        'remark': _remark,
                    });
                    
                    obj[id] = {
                        'meal': id,  // 餐點名
                        'price': parseInt(order.order_price),
                        'orderNumber': obj[id].orderNumber + _orderNumber,
                        'totalBuyer': obj[id].buyerName.length,
                        'subTotal': subTotalNum,
                        'buyerName': obj[id].buyerName,
                        'remarks': obj[id].remarks,
                    };
                    // 沒同名餐點就建立新物件
                } else {
                    obj[id] = {
                        'meal': id,
                        'price': _orderPrice,
                        'orderNumber': _orderNumber,
                        'totalBuyer': 1,
                        'subTotal': _orderPrice * _orderNumber,  // 小計 = 價格 x 數量
                        'buyerName': new Array(order.order_name),
                        'remarks': new Array({
                            'buyerName': order.order_name,
                            'remark': _remark,
                        }),
                    };
                }
                subTotalNum = 0;
            })
            let mergeOrder = Object.values(obj);  // 合併訂單物件 ex: [ {} ]
            this.orderTotal = mergeOrder;
            // console.log(mergeOrder)
        },
        /**************************
         * 計算訂單總計、不重覆購買人
         *************************/
        calcOrdersTotal(data) {
            console.log(data)
            let priceTotal = 0;
            let buyerNameArr = [];
            let totalOrderCount = 0;
            
            data.forEach(item => {
                priceTotal += parseInt(item.order_price) * parseInt(item.order_number);  // 總金額
                buyerNameArr.push(item.order_name);  // 總購買人
                totalOrderCount += parseInt(item.order_number);  // 總筆數
            })
            // 不重覆購買人 arr.indexOf('小明') === 0 (position in array)
            const buyerNames = buyerNameArr.filter((item, index) => buyerNameArr.indexOf(item) === index);
            
            // 建立資料
            this.orderDetails = {
                'totalBuyerCount': buyerNames.length,
                'totalOrderCount': totalOrderCount,
                'priceTotal': priceTotal,
            }
        },
        // 折疊備註資訊
        toggleOrderRemarkDetails(event) {
            const orderTable = event.target.closest('.order-table');
            const orderRemark = orderTable.querySelector('.order-remarks');
            orderRemark.classList.toggle('show');
        },
        // toggle 所有備註資訊
        toggleAllOrderRemarkDetails(event) {
            const toggleTarget = event.target;
            const allRemarks = document.querySelectorAll('.order-remarks');
            this.allOrderRemarkState = !this.allOrderRemarkState;
            
            let count = 0;
            allRemarks.forEach(remark => {
                if (remark.classList.contains('show')) {
                    count++;
                }
            });
            if (count === allRemarks.length) {  // 全展開數量等於總數就關上
                allRemarks.forEach(remark => remark.classList.remove('show'));
                return;
            }
            allRemarks.forEach(remark => remark.classList.add('show'));  // 全打開
        },
        // 訂單統計高亮
        clickRowHighlight(event) {
            const target = event.target;
            let changeElement = target;
            if (!target.classList.contains('highlight-table-row')) {  // 如果不是點到 table-row
                changeElement.closest('.highlight-table-row').classList.toggle('active');
                return;
            }
            changeElement.classList.toggle('active');
        },
    },
    computed: {
        filterRemarks() {
            const data = this.orderTotal;
            let remarks = [];
            let filterRemarks = [];
            data.forEach(item => {
                remarks.push(item.remarks)
            });
            remarks.forEach(item => {
                if (item.remark !== '') {
                    filterRemarks.push(item);
                }
            })
            // console.log(filterRemarks)
        }
    },
    mounted() {
        if (this.$refs['orderId']) this.getOrdersById();
    },
}

// POST與GET 操作
const vueGetAndPost = {
    data() {
    },
    methods: {
        fetchData(_api = '', _method = 'GET', _callback, _body = undefined) {
            // 狀態校驗
            function processStatus(response) {
                if (response.status === 200 || response.status === 0) {
                    return Promise.resolve(response);
                } else {
                    return Promise.reject(new Error(response.statusText));
                }
            }
            
            const option = {
                method: _method,
            }
            // console.log(option)
            if (_body) option['body'] = _body;
            // console.log(_body)
            
            fetch(_api, option)
                .then(processStatus)
                .then((response) => {
                    // console.log(response)
                    _callback(response);
                    return true;
                }).catch(err => {
                console.log(err, ', ', _callback);
                return false;
            })
        }
    }
}

// 溫馨提示
const vueAlert = {
    methods: {
        smartAlert(_title = '', _description = '', _status = 'success', _timer) {
            Swal.fire({
                title: _title,
                html: _description,
                icon: _status,
                timer: _timer ? _timer : 6000,
                timerProgressBar: true,
            })
        },
        smartConfirm(_title = '', _description = '', _confirmText = '', _status, _callback) {
            Swal.fire({
                title: _title,
                text: _description,
                icon: _status,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: _confirmText
            }).then((result) => {
                if (result.value) {
                    _callback();
                }
            })
        }
    }
}

// Loading
const vueLoading = {
    data() {
        return {}
    },
    methods: {
        /******************
         * 頁面載入前Loading效果
         ******************/
        loadingEffect() {
            const loading = {
                start: () => {  // 頁面載入中
                    const loadingHtml = `
                    <div id="loadingEffect" class="loading-effect-wrap beforeend">
                      <div class="loading-block">
                        <div class="loading-effect"><span class="mr-2">讀取中…</span><img src="./language/img/loading-spinner.gif"></div>
                      </div>
                    </div>
                    `;
                    document.body.insertAdjacentHTML('beforeend', loadingHtml);
                },
                complete: () => {  // 頁面載入完成 document.readyState === 'complete'
                    const loading = document.getElementById('loadingEffect');
                    loading.remove(loading);
                }
            }
            
            loading.start();
            // Loading OK
            document.addEventListener('readystatechange', () => {
                if (document.readyState === 'complete') {
                    loading.complete();
                }
            })
        },
    },
    mounted() {
    },
    created() {
        this.loadingEffect();
    },
}

const vueConstants = {
    data() {
        const ORDER_API = 'group_buy_api.php';
        // const mainDefine = {
        //     ROOT: 'index.php',
        // }
        return {
            ORDER_API,
        }
    }
}

// Vue 實體
const app = Vue.createApp({
    delimiters: ['%%', '%%'],
    mixins: [
        vueSetState,
        vueOrderCalculator,
        vueOrderDisplay,
        vueGetAndPost,
        vueAlert,
        vueOrderOperation,
        vueGroupBuy,
        vueStore,
        vueConstants,
        vueLogin,
        vueLoading,
        vueStoreRating,
        vueMember,
    ],
    data() {
        return {}
    },
    methods: {},
});
app.mount('#app');