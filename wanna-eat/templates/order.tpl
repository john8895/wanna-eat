{* filename: order.tpl *}

{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__order">
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <div class="col-sm-12 store-item">

                {if isset($error)}
                    <div class="form-group text-danger">
                        {$error}
                    </div>
                {/if}
                <ul class="store-text">
                    <li>負責人：{$item.group_host}
                        {*                            <button>新增負責人</button>*}
                    </li>
                    <li>店家名稱：{$item.store_name}</li>
                    <li>店家電話：{$item.store_phone}</li>
                    <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
                    <li>菜單：<a href="{$store.images}"
                              class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a></li>
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

                {* Order list*}
                <h4>訂單列表</h4>
                {* TODO onchange jq post update                   *}
                {foreach from=$order_array item=order}
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{$order.order_name}" name="order_name"
                                   placeholder="請輸入姓名">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{$order.order_meal}" name="order_content"
                                   placeholder="請輸入點餐名稱">
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" value="{$order.order_price}" name="order_price"
                                   placeholder="請輸入價格"> 元
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{$order.order_remark}" name="order_remark"
                                   placeholder="請輸入備註">
                        </div>
                    </div>
                {/foreach}

                {* Order block *}
                <h4>增加訂單</h4>
                {* TODO AJAX form*}
                <form id="order_form" method="post">
                    <input type="hidden" value="{$order_id}" name="add_order_id">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="" name="add_order_name" placeholder="請輸入姓名">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="" name="add_order_content"
                                   placeholder="請輸入點餐名稱">
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" value="" name="add_order_price" placeholder="請輸入價格">
                            元
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="" name="add_order_remark"
                                   placeholder="請輸入備註">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger" id="submit_order">送出訂單</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>
{include file="js.tpl"}