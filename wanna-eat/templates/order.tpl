{* filename: order.tpl *}
{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order">

{*    Group buy information*}
    <section>
        <div class="container">
            <!-- 開團 -->
            <h4 class="title h5">團購資訊</h4>
            <div class="row modal-wrap">
                <div class="col-sm-12 store-item">

                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}

                    <ul class="store-text">
                        <li>負責人：{$item.group_host}</li>
                        <li>店家名稱：{$item.store_name}</li>
                        <li>店家電話：{$item.store_phone}</li>
                        <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
                        <li>菜單：<a href="{$store.images}"
                                  class="btn btn-outline-primary btn-sm btn-pill px-2 py-0 btn-menu">菜單</a></li>
                        <li class="image_show">
                            <div class="modal">
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="img"></div>
                                </div>
                            </div>
                        </li>
                        <li>截止時間：{$item.end_time}</li>
                        <li>注意事項：{$item.remark}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


{*   Order list display *}
    <section>
        <div class="container">
            <h4 class="title h5">訂單列表</h4>
            <div id="ordersNum"></div>
            <div id="order-list"></div>
        </div>
    </section>


{*    Submit order form *}
    <section>
        <div class="container">
            {* Order block *}
            <h4 class="title h5">增加訂單</h4>
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
                        <input type="number" class="form-control" name="add_order_price" placeholder="請輸入價格 *">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="add_order_remark"
                               placeholder="請輸入備註">
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-danger" id="submit_order">送出訂單</button>
                </div>
            </form>

        </div>
    </section>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
