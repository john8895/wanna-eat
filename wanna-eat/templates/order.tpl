{* filename: order.tpl *}
{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order">
    <div class="page__banner" style="background-image: url(./language/img/hero1.webp)">

    </div>
    {*    Group buy information*}
    <div class="container-fluid">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <div class="col-sm-12 store-item no-gutters px-0">

                <div class="card px-3 py-4">
                    <div class="title">{$item.store_name}（團購聯絡人：{$item.group_host}）</div>
                    <div class="res__info">
                        <span>{$item.store_phone}</span>
                        &emsp;|&emsp;
                        <span>外送金額：$200</span>
                        &emsp;|&emsp;
                        <span>目前金額：$250</span>
                        &emsp;|&emsp;
                        <span>收單時間：{$item.end_time}</span>
                        {if $store.description !=''}
                            <div>
                                <i class="fas fa-angle-right mr-1 text-black-50"></i>餐廳簡介：{$store.description}
                            </div>
                        {/if}
                        {if $item.remark !=''}
                            <div>
                                <i class="fas fa-angle-right mr-3 text-black-50"></i>團購注意事項：{$item.remark}
                            </div>
                        {/if}
                    </div>
                </div>


            </div>

            <div class="col-sm-12 mt-4 px-0">
                {if isset($error)}
                    <div class="form-group text-danger">
                        {$error}
                    </div>
                {/if}
                <div class="card accordion">
                    <div class="card-header">
                        <div>菜單</div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{$store.images}" title="" target="_blank">
                                <img src="{$store.images}" alt="" class="img-fluid" style="max-height: 1000px">
                            </a>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>


    {*   Order list display *}
    <div class="container">
        <div class="row">


            <div class="col-sm-12 mt-5">
                <div class="card accordion">
                    <div class="card-header">
                        <h4 class="title h5">增加訂單</h4>
                    </div>
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

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-danger rounded-lg" id="submit_order">送出一筆訂單
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-sm-12 mt-4">
                <div class="card accordion">
                    <div class="card-header">
                        <h4 class="title h5">訂單列表</h4>

                    </div>
                    <div class="card-body">
                        <div id="order_list" class="order_list"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-4">
                <div class="card accordion">
                    <div class="card-header">
                        <h4 class="title h5">訂單統計</h4>

                    </div>


                    <div class="card-body">
                        <div id="ordersNum" class="mb-3 h6"></div>

                        <div class="card table border">

                            <div class="card-body">


                                <div id="orderTotal"></div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

            <div class="col-sm-12">
                <a href="javascript:window.history.back()" class="btn btn-dark mt-5 px-3">
                    <i class="fas fa-reply mr-2"></i>回上一頁
                </a>
            </div>


        </div>
    </div>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
