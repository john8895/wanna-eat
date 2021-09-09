{* filename: order.tpl *}
{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order {if ($time_up)}history_order{/if} " id="app">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">填寫訂購單</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>填寫訂購單</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    {*    Group buy information*}
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap no-gutters order__header">
            <div class="col-sm-12 text-center mb-4">
                {if $time_up}
                    <div class="form-group text-danger">
                        <i class="fas fa-info-circle mr-1"></i>時間截止已收單，此單無法繼續訂購！
                    </div>
                {/if}
            </div>
            <div class="col-sm-6 res-info">
                {if isset($error)}
                    <div class="form-group text-danger">
                        {$error}
                    </div>
                {/if}


                <input type="hidden" value="{$store.id}" id="store_id">
                <input type="hidden" value="{$order_id}" id="order_id">
                <div class="title">{$item.store_name}</div>
                <ul class="sub-title">
                    {if $store.description !=''}
                        <li>
                            簡介：{$store.description}
                        </li>
                    {/if}
                    {if $item.remark !=''}
                        <li>
                            團購注意事項：{$item.remark}
                        </li>
                    {/if}
                </ul>
                <ul class="description">
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>訂單編號：{$order_id}</li>
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>團購負責人：{$item.group_host}</li>
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>電話：{$item.store_phone}</li>
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>外送門檻：
                        {if isset($store.store_full_price) }
                            {if $store.store_full_price === '0' }
                                不限制
                            {else}
                                ${$store.store_full_price}

                            {/if}
                        {/if}

                    </li>
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>目前金額：$<span id="orderTotalNum">0</span>
                        <span id="deliveryAmount"></span>
                    </li>
                    <li>
                        <i class="fas fa-angle-right mr-2 text-black-50"></i>{if $time_up}已收單，截止時間：{$item.end_time}
                        {else}收單時間：<span id="order_endTime" ref="order_endTime">{$item.end_time}</span>{/if}
                    </li>

                </ul>
                {if isset($logged) && $logged}
                    {if !$time_up}
                        <div class="text-left mt-4">
                            <button class="btn btn-danger" @click="endOrderTime();">立即收單</button>
                        </div>
                    {else}
                        <div class="text-left mt-4">
                            <button class="btn btn-success" @click="continueOrderTime('{$order_id}');">繼續訂購</button>
                        </div>
                    {/if}
                {/if}

            </div>
            <div class="col-sm-6 res-cover">
                {if isset($store.store_cover)}
                    <img src="{$store.store_cover}" alt="" class="img-fluid img-thumbnail">
                {else}
                    <img src="./language/img/fake_store_img.jpg" alt="" class="img-fluid img-thumbnail">
                {/if}
            </div>
        </div>


        <div class="row res-menu innerPage-section">
            <div class="col-sm-12 mt-4 px-0">
                <div class="text-center">
                    <div class="sec-title">
                        <h3>菜單</h3>
                        <div class="sub-title">Restaurant menu</div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{$store.images}" title="" target="_blank">
                        <img src="{$store.images}" alt="" class="img-fluid img-thumbnail" style="max-height: 1000px">
                    </a>
                </div>
            </div>
        </div>
    </div>


    {*   Order list display *}
    <div class="container innerPage-section mt-3">
        <div class="row{if $time_up} d-none{/if}">
            <div class="col-sm-12">
                <div class="text-center">
                    <div class="sec-title">
                        <h3>增加訂單</h3>
                        <div class="sub-title">Add orders</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card accordion">
                    <div class="card-body">
                        <form id="order_form" method="post">
                            <input type="hidden" value="{$order_id}" name="add_order_id" id="order_id" ref="orderId">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="add_order_name" placeholder="請輸入姓名 *">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="add_order_meal"
                                           placeholder="請輸入餐點名稱 *">
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="add_order_price"
                                           placeholder="請輸入價格 *">
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select name="add_order_number" class="form-control">
                                            <option value="0" disabled>請選擇數量</option>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="add_order_remark"
                                           placeholder="請輸入備註">
                                </div>
                            </div>

                            <div class="form-group mt-2 text-center">
                                <button type="submit" class="btn btn-default" id="submit_order">送出一筆訂單
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-4">
                <div class="text-center">
                    <div class="sec-title">
                        <h3>訂單列表</h3>
                        <div class="sub-title">Order list</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div id="order_list" class="order_list">

                            <div v-if="ordersData">

                                <div class="row py-2 rounded order-item" :data-index="ordersKey + 1" v-for="(order, ordersKey) in ordersData" :key="ordersKey">
                                    <div class="col-sm-1 text-right px-1">
                                        <span class="mr-3">%% ordersKey + 1 %%</span>
                                    </div>
                                    <div class="col-sm-2 px-1">
                                        <input type="hidden" name="field_id" :value="order.field_id" class="field_id">
                                        <input type="text" class="form-control" :value="order.order_name" name="order_name"
                                               placeholder="請輸入姓名 *" data-field="姓名" @change="editOrder($event)" :data-field-id="order.field_id">
                                    </div>
                                    <div class="col-sm-3 px-1">
                                        <input type="text" class="form-control" :value="order.order_meal" name="order_meal"
                                               placeholder="請輸入餐點名稱 *" data-field="餐點名稱" @change="editOrder($event)" :data-field-id="order.field_id">
                                    </div>
                                    <div class="col-sm-1 px-1">
                                        <input type="number" class="form-control" :value="order.order_price" name="order_price"
                                               placeholder="請輸入價格 *" data-field="價格" @change="editOrder($event)" :data-field-id="order.field_id">
                                    </div>
                                    <div class="col-sm-1 px-1">
                                        <input type="number" class="form-control" :value="order.order_number" name="order_number"
                                               placeholder="請輸入數量 *" data-field="數量" @change="editOrder($event)" :data-field-id="order.field_id">
                                    </div>
                                    <div class="col-sm-3 px-1">
                                        <input type="text" class="form-control" :value="order.order_remark" name="order_remark"
                                               placeholder="請輸入備註" data-field="備註" @change="editOrder($event)" :data-field-id="order.field_id">
                                    </div>
                                    <div class="col-sm-1 px-1">
                                        <a class="btn delete_order" title="刪除此筆訂單">
                                            <svg class="icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div v-else>目前還沒有訂單 :(</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-4">
                <div class="text-center">
                    <div class="sec-title">
                        <h3>{$item.store_name} 訂單統計</h3>
                        <div class="sub-title">Order total</div>
                    </div>
                </div>
                <div id="ordersNum" class="mb-3 h6">
                    共有 %% orderDetails.totalBuyerCount %% 人參與團購，累積有 <b>%% orderDetails.totalOrderCount %%</b> 筆訂單
                </div>
                <div class="card table border">
                    <div class="card-body">
                        <div id="orderTotal" class="order-total">
                            <div class="th row py-0 order-table">
                                <div class="td sn">
                                    <span>編號</span>
                                </div>
                                <div class="td">
                                    <span>點餐內容</span>
                                </div>
                                <div class="td num">
                                    <span>數量</span>
                                </div>
                                <div class="td num">
                                    <span>價格</span>
                                </div>
                                <div class="td">
                                    <span>小計</span>
                                </div>
                                <div class="td buyerName">
                                    <span>訂購人</span>
                                </div>
                            </div>

                            <div class="order-table table-row tr row" v-for="(order, orderKey) in orderTotal" :key="orderKey">
                                <div class="td sn">
                                    <span>%% orderKey + 1 %%</span>
                                </div>
                                <div class="td">
                                    <span>%% order.meal %%</span>
                                </div>
                                <div class="td num">
                                    <span>%% order.orderNumber %%</span>
                                </div>
                                <div class="td num">
                                    <span>%% order.price %%</span>
                                </div>
                                <div class="td">
                                    <span>%% order.subTotal %%</span>
                                </div>
                                <div class="td buyerName">
                                    <ul class="d-flex flex-wrap">
                                        <li class="btn btn-outline-info py-0 px-1 mr-2" v-for="(name, k) in order.buyerName" :key="k">
                                            %% name %%
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-sm-12" v-for="(remark, remarkKey) in order.remarks" :key="remarkKey">
                                    <div class="order-remarks" v-if="remark.remark !== 0">
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-7"><i class="fa fa-sticky-note mr-2"></i>%%
                                                remark.buyerName %% %% remark.remark %%
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="th row py-0 ">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2">
                                    <span>NT$ %% orderDetails.priceTotal %%</span>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12">
                <div class="mt-5 d-flex justify-content-lg-between align-items-baseline">
                    <a href="javascript:window.history.back()" class="btn btn-dark px-3 rounded-0 mr-3">
                        <i class="fas fa-reply mr-2"></i>回上一頁
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}