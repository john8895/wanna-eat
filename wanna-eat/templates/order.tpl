{* filename: order.tpl *}
{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order">

    {*    Group buy information*}
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <div class="col-sm-12 store-item">

                <div class="card accordion">
                    <div class="card-header accordion">
                        <h4 class="title h5">團購資訊（開團人：{$item.group_host}）</h4>
                    </div>

                    <div class="card-body">
                        {if isset($error)}
                            <div class="form-group text-danger">
                                {$error}
                            </div>
                        {/if}

                        <div class="row">

                            <div class="col-sm-6">
                                {if isset($store.store_cover)}
                                    <img src="{$store.store_cover}" alt="" class="img-fluid">
                                {else}
                                    <img src="./language/img/noimg.jpg" alt="" class="img-fluid">
                                {/if}
                            </div>
                            <div class="col-sm-6">
                                <ul class="store-text">
                                    <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳：{$item.store_name}</li>
                                    <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳電話：{$item.store_phone}</li>
                                    <li>
                                        <i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳簡介：{if $store.description !=''}{$store.description}{else}無簡介{/if}
                                    </li>
                                    {*                            <li><i class="fas fa-angle-right mr-3 text-black-50"></i>餐廳菜單：<a href="{$store.images}"*}
                                    {*                                                                                             class="btn btn-outline-primary btn-sm px-2 btn-menu">顯示菜單</a>*}
                                    {*                            </li>*}
                                    {*                            <li class="image_show">*}
                                    {*                                <div class="modal">*}
                                    {*                                    <div class="modal-body d-flex align-items-center justify-content-center">*}
                                    {*                                        <div class="img"></div>*}
                                    {*                                    </div>*}
                                    {*                                </div>*}
                                    {*                            </li>*}
                                    <li><i class="fas fa-angle-right mr-3 text-black-50"></i>外送金額：$200</li>
                                    <li><i class="fas fa-angle-right mr-3 text-black-50"></i>目前金額：$250</li>
                                    <li><i class="fas fa-angle-right mr-3 text-black-50"></i>收單時間：{$item.end_time}</li>
                                    {if $item.remark !=''}
                                        <li>
                                            <i class="fas fa-angle-right mr-3 text-black-50"></i>團購注意事項：{$item.remark}
                                        </li>
                                    {/if}
                                </ul>

                            </div>


                        </div>


                    </div>

                </div>


            </div>

            <div class="col-sm-12 mt-4">

                <div class="card accordion">
                    <div class="card-header">
                        <h4 class="h5">菜單</h4>
                    </div>
                    <div class="card-body" style="display: none">
                        <div class="text-center">
                            <a href="{$store.images}" title="" target="_blank">
                                <img src="{$store.images}" alt="" class="img-fluid" style="max-height: 750px">
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


            <div class="col-sm-12 mt-4">
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
                        <div id="order_list"></div>
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

                            <div class="card-body" id="orderTotal">

                                <div class="th row py-0 ">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control border-0" value="點餐內容">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control border-0" value="數量">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control border-0" value="價格">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control border-0" value="訂購人">
                                    </div>
                                </div>
{*                                <div class="tr row py-0">*}
{*                                    <div class="col-sm-4">*}
{*                                        <input type="text" class="form-control border-0" name="order_meal" value="雞排飯"*}
{*                                               data-field="點餐內容" readonly>*}
{*                                    </div>*}
{*                                    <div class="col-sm-2">*}
{*                                        <input type="number" class="form-control border-0" name="order_price" value="1"*}
{*                                               data-field="數量" readonly>*}
{*                                    </div>*}
{*                                    <div class="col-sm-2">*}
{*                                        <input type="number" class="form-control border-0" name="order_price" value="150"*}
{*                                               data-field="價格" readonly>*}
{*                                    </div>*}
{*                                    <div class="col-sm-4">*}
{*                                        <ul class="d-flex flex-wrap">*}
{*                                            <li class="btn btn-outline-info py-0 px-1 mr-2 mt-2">小熊</li>*}
{*                                            <li class="btn btn-outline-info py-0 px-1 mr-2 mt-2">小熊王</li>*}
{*                                            <li class="btn btn-outline-info py-0 px-1 mr-2 mt-2">張學友</li>*}
{*                                            <li class="btn btn-outline-info py-0 px-1 mr-2 mt-2">陳胖胖</li>*}
{*                                        </ul>*}
{*                                    </div>*}
{*                                </div>*}
{*                                <div class="th row py-0 ">*}
{*                                    <div class="col-sm-4">*}
{*                                    </div>*}
{*                                    <div class="col-sm-2">*}
{*                                    </div>*}
{*                                    <div class="col-sm-2">*}
{*                                        <input type="text" class="form-control border-0" value="150">*}
{*                                    </div>*}
{*                                    <div class="col-sm-4">*}
{*                                    </div>*}
{*                                </div>*}

                            </div>

                        </div>


                    </div>

                </div>
            </div>


        </div>
    </div>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
