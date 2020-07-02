{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <form action="group-buy.php" method="post">
                <div class="col-sm-12 store-item">
                    <input type="hidden" name="id" value="orders.id">
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <ul class="store-text">
                        <li>負責人：
                            <select name="host">
                                {foreach from=$hosts item=item}
                                    <option value="{$item.host_name}">{$item.host_name}</option>
                                {/foreach}
                            </select>
                            <button>新增負責人</button>
                        </li>
                        <li>店家名稱：<input type="text" value="{$item.name}" name="store_name" readonly class="form-control"></li>
                        <li>店家電話：<input type="text" value="{$item.phone}" name="store_phone" readonly class="form-control"></li>
                        <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
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
                            <label>截止時間：
                                <input type="text" value="1200" name="end_time" required>*
                            </label>
                        </li>
                        <li>
                            <label>注意事項：
                                <input type="text" value="老闆很凶會罵人" name="remark">
                            </label>
                        </li>
                    </ul>

                    <div class="form-group">
                        <button class="btn btn-danger">開始團購囉</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
{include file="js.tpl"}