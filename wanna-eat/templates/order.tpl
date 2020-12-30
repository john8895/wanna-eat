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
                    <li><i class="fas fa-angle-right mr-2 text-black-50"></i>訂單編號：{$order_id|substr:-4}
                        <br><small class="text-muted">當日訂單可用 LINE 機器人訂餐，<button class="btn btn-sm border" data-toggle="modal" data-target="#lineBotQrcodeModal">顯示 QRCode</button></small>
                    </li>
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
                        {else}收單時間：<span id="order_endTime">{$item.end_time}</span>{/if}
                    </li>

                </ul>
                {if isset($logged) && $logged}
                    {if !$time_up}
                        <div class="text-left mt-4">
                            <button class="btn btn-danger" @click="closeOrder">立即收單</button>
                        </div>
                    {/if}
                {/if}


                {* modal*}
                <div class="modal fade" id="lineBotQrcodeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">〔今天要吃啥？〕訂餐小幫手</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="./language/img/linebotqrcode.png" alt="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            </div>
                        </div>
                    </div>
                </div>


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
                            <input type="hidden" value="{$order_id}" name="add_order_id" id="order_id">
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
                        <div id="order_list" class="order_list"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-4">
                <div class="text-center">
                    <div class="sec-title">
                        <h3>訂單統計</h3>
                        <div class="sub-title">Order total</div>
                    </div>
                </div>
                <div id="ordersNum" class="mb-3 h6"></div>
                <div class="card table border">
                    <div class="card-body">
                        <div id="orderTotal" class="order-total"></div>
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