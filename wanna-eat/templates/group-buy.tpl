{* filename: group-buy.tpl *}

{include file="head.tpl"}
{include file="header.tpl"}
<main id="app">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">新增團購單</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>新增團購單</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>

    <div class="container">
        <!-- 開團 -->

        <form action="group-buy.php" method="post" id="groupBuyForm">
            <input type="hidden" name="store_id" {if isset($store_id)}value="{$store_id}"{/if}>

            <div class="row modal-wrap">
                <div class="col-sm-12">
                    <div class="row">

                        <div class="col-sm-6 store-item">
                            <input type="hidden" name="id" value="orders.id">
                            {if isset($error)}
                                <div class="form-group text-danger">
                                    {$error}
                                </div>
                            {/if}
                            <div class="store-text row">
                                <div class="form-group col-sm-12">
                                    <label>團購負責人 *</label>
                                    <input type="text" class="form-control" value="" placeholder="請輸入名稱"
                                           name="group_host_new"> 或
                                    <select name="group_host" class="form-control">
                                        <option value="0" selected>請選擇團購負責人</option>
                                        {foreach from=$hosts item=item}
                                            <option value="{$item.host_name}"
                                                    name="host_name">{$item.host_name}</option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>
                                        餐廳名稱<input type="text" value="{$item.name}" name="store_name" readonly
                                                   class="form-control">
                                    </label>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>
                                        餐廳電話<input type="text" value="{$item.phone}" name="store_phone" readonly
                                                   class="form-control">
                                    </label>
                                </div>
                                {if isset({$item.description})}
                                    <div class="form-group col-sm-12">
                                        介紹：{$item.description}
                                    </div>
                                {/if}

                                {if isset({$item.store_tag})}
                                    <div class="form-group col-sm-12">
                                            標籤<input type="text" value="{$item.store_tag}" name="store_tags" readonly
                                                     class="form-control">
                                    </div>
                                {/if}

                                <div class="form-group col-sm-6">

                                    <label>收單日期 *
                                        <div class="input-group date" id="datetimepicker_date"
                                             data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                   data-target="#datetimepicker_date" name="endTime_day" required
                                                   placeholder="必須填寫"/>
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
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>收單時間 *
                                        <div class="input-group date" id="datetimepicker_time"
                                             data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                   data-target="#datetimepicker_time" name="end_time_hour" required
                                                   placeholder="必須填寫"/>
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

                                <div class="form-group col-sm-12">
                                    <label>外送金額 NT$</label>
                                    <input type="number" value="{$item.store_full_price}" name="full_price"
                                           class="form-control"
                                           placeholder="請輸入外送金額，不限制填 0" readonly disabled>

                                </div>

                                <div class="form-group col-sm-12">
                                    <label>注意事項</label>
                                    <input type="text" value="" name="remark" class="form-control"
                                           placeholder="請輸入注意事項">

                                </div>
                            </div>
                            <input type="hidden" {if isset($field_id)}value="{$field_id}"{/if} name="order_field_id">
                            <div class="form-group mt-3 text-center">
                                <button class="btn btn-default" type="submit">確認資料，開始團購</button>
                            </div>
                        </div>


                        {*                        菜單*}
                        <div class="col-sm-6">
                            <div class="store-image store-text">
                                {if $item.images != ''}
                                    <a href="{$item.images}" target="_blank" title="點選檢視大圖" class="btn-menu">
                                        <img src="{$item.images}" alt="" class="img-fluid img-thumbnail">
                                    </a>
                                {else}
                                    <img src="./language/img/noimg.jpg" alt="" class="img-fluid img-thumbnail">
                                {/if}
                                <div class="image_show">
                                    <div class="modal">
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="img"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>

    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
