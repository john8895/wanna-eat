{* filename: group-buy.tpl *}

{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <form action="group-buy.php" method="post">
                <input type="hidden" name="store_id" {if isset($store_id)}value="{$store_id}"{/if}>
                <div class="col-sm-12 store-item">
                    <input type="hidden" name="id" value="orders.id">
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <ul class="store-text">
                        <li>負責人：
                            <select name="group_host">
                                {foreach from=$hosts item=item}
                                    <option value="{$item.host_name}" name="host_name">{$item.host_name}</option>
                                {/foreach}
                            </select>
{*                            <button>新增負責人</button>*}
                        </li>
                        <li>店家名稱：<input type="text" value="{$item.name}" name="store_name" readonly
                                        class="form-control"></li>
                        <li>店家電話：<input type="text" value="{$item.phone}" name="store_phone" readonly
                                        class="form-control"></li>
                        <li>簡介：{$item.description}</li>
                        <li>菜單：<a href="{$item.images}"
                                  class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a></li>
                        <li class="image_show">
                            <div class="modal">
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="img"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-row">
                                <label>截止時間*
                                        <input type="text" value="{$date|date_format:"%Y-%m-%d"}" name="endTime_day" required class="form-control">
                                        {* TODO 顯示現在時間 + 20分 / 後面多個按鈕 點擊每次+10分    *}
                                        <input type="text" value="{$time}" name="end_time_hour" required class="form-control">
                                </label>

                            </div>

                        </li>
                        <li>
                            <label>注意事項：
                                <input type="text" value="老闆很凶會罵人" name="remark" class="form-control">
                            </label>
                        </li>
                    </ul>

                    <input type="hidden" {if isset($field_id)}value="{$field_id}"{/if} name="order_field_id">

                    {* Order block *}
{*                    <h4 class="h5">我來加一單</h4>*}
{*                    <div class="row">*}
{*                        <div class="col-sm-3">*}
{*                            <input type="hidden" {if isset($field_id)}value="{$field_id}"{/if} name="order_field_id">*}
{*                            <input type="text" class="form-control" value="" name="order_name" placeholder="請輸入姓名">*}
{*                        </div>*}
{*                        <div class="col-sm-3">*}
{*                            <input type="text" class="form-control" value="" name="order_meal" placeholder="請輸入點餐名稱">*}
{*                        </div>*}
{*                        <div class="col-sm-3">*}
{*                            <input type="number" class="form-control" value="" name="order_price" placeholder="請輸入價格">*}
{*                        </div>*}
{*                        <div class="col-sm-3">*}
{*                            <input type="text" class="form-control" value="" name="order_remark" placeholder="請輸入備註">*}
{*                        </div>*}
{*                    </div>*}

                    <div class="form-group mt-3">
                        <button class="btn btn-danger" type="submit">開始團購囉</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
{include file="js.tpl"}