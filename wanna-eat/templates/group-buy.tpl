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
                    <div class="store-text">
                        <div class="form-group">
                            <label>負責人：
                                <select name="group_host" class="form-control">
                                    {foreach from=$hosts item=item}
                                        <option value="{$item.host_name}" name="host_name">{$item.host_name}</option>
                                    {/foreach}
                                </select>
                            </label>
                            {*                            <button>新增負責人</button>*}
                        </div>


                        <div class="form-group">
                            <label>
                                店家名稱：<input type="text" value="{$item.name}" name="store_name" readonly
                                            class="form-control">
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                店家電話：<input type="text" value="{$item.phone}" name="store_phone" readonly
                                            class="form-control">
                            </label>
                        </div>
                        {* TODO：讀取是空值所以無法判斷              *}
                        <div class="form-group">
                            簡介：{if empty({$item.description})}{$item.description}{else}沒有簡介{/if}
                        </div>

                        <div class="form-group">
                            <label>
                                菜單：
                                <a href="{$item.images}"
                                   class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a>
                            </label>

                        </div>

                        <div class="image_show">
                            <div class="modal">
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="img"></div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
{*                            <label>截止日期 **}
{*                                <input type="text" value="{$date|date_format:"%Y-%m-%d"}" name="endTime_day"*}
{*                                       required class="form-control">*}
{*                            </label>*}
{*                            <label>截止時間（時-分）**}
{*                                <input type="text" value="{$time}" name="end_time_hour" required*}
{*                                       class="form-control">*}
{*                            </label>*}


                            <label>收單時間 *
                                <div class="input-group date" id="datetimepicker_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker_date" name="endTime_day" required/>
                                    <div class="input-group-append" data-target="#datetimepicker_date"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 448 512">
                                                <path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>

                            <label>截止時間（時-分）*
                                <div class="input-group date" id="datetimepicker_time" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker_time" name="end_time_hour" required/>
                                    <div class="input-group-append" data-target="#datetimepicker_time"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 512 512">
                                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="form-group">
                            <label>注意事項：
                                <input type="text" value="" name="remark" class="form-control" placeholder="請輸入注意事項">
                            </label>
                        </div>
                    </div>

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
{include file="footer.tpl"}
{include file="js.tpl"}
