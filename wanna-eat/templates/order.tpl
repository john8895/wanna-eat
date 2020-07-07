{* filename: order.tpl *}
{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order">

    {*    Group buy information*}
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <div class="col-sm-12 store-item">

                <div class="card">
                    <div class="card-header">
                        <h4 class="title h5">團購資訊</h4>
                    </div>

                    <div class="card-body">
                        {if isset($error)}
                            <div class="form-group text-danger">
                                {$error}
                            </div>
                        {/if}

                        <ul class="store-text">
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>團主：{$item.group_host}</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳名稱：{$item.store_name}</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳電話：{$item.store_phone}</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳簡介：{if $store.description !=''}{$store.description}{else}無簡介{/if}</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳菜單：<a href="{$store.images}"
                                        class="btn btn-outline-primary btn-sm px-2 btn-menu">顯示菜單</a></li>
                            <li class="image_show">
                                <div class="modal">
                                    <div class="modal-body d-flex align-items-center justify-content-center">
                                        <div class="img"></div>
                                    </div>
                                </div>
                            </li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>外送金額：$200</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>目前金額：$250</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>收單時間：{$item.end_time}</li>
                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>團購注意事項：{if $item.remark !=''}{$item.remark}{else}無注意事項{/if}</li>
                        </ul>
                    </div>

                </div>


            </div>
        </div>
    </div>


    {*   Order list display *}
    <div class="container">
        <div class="row">



            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title h5">增加訂單</h4>
                    </div>
                    <div class="card-body">
                        <form id="order_form" method="post">
                            <input type="hidden" value="{$order_id}" name="add_order_id" id="order_id">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="add_order_name" placeholder="請輸入姓名 *">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="add_order_meal"
                                           placeholder="請輸入餐點名稱 *">
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="add_order_price"
                                           placeholder="請輸入價格 *">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="add_order_remark"
                                           placeholder="請輸入備註">
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-danger rounded-lg" id="submit_order">送出一筆訂單</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title h5">訂單列表</h4>

                    </div>
                    <div class="card-body">
                        <div id="order_list"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title h5">訂單統計</h4>

                    </div>
                    <div class="card-body">
                        <div id="ordersNum"></div>

                    </div>
                </div>
            </div>


        </div>
    </div>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
