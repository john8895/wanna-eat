<main>
    <section>
        <div class="container" id="app">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <a href="" class="btn btn-info mr-2" id="wanna_eat">今天要吃啥？</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 訂單狀態-->
    <section id="app">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-12">
                    <h4>進行中的訂單 <span id="current_groupBuy">0</span></h4>
                </div>
                <div class="col-sm-3">
                    <ul>
                        <li>預估金額：$0</li>
                        <li>目前金額：$0</li>
                        <li><span id="group_host">%% item.group_name %%阿翰</span>開的 <span id="store_name">炒飯超人</span></li>
                        <li>
                            <button>我也要訂</button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>


    {*            <div v-if="orderDisplay" class="row">*}
    {*                <div class="form-group">*}
    {*                    <label class="w-75">店家名稱*}
    {*                        <input type="hidden" name="id" :value="orders.id">*}
    {*                        <input type="text" name="name" class="form-control" :value="orders.name"*}
    {*                               placeholder="請輸入店家名稱">*}
    {*                    </label>*}
    {*                </div>*}
    {*                <div class="form-group">*}
    {*                    <label class="w-75">店家電話*}
    {*                        <input type="text" name="phone" class="form-control" :value="orders.phone"*}
    {*                               placeholder="請輸入店家電話">*}
    {*                    </label>*}
    {*                </div>*}
    {*                <div class="form-group">*}
    {*                    <input type="text" value="阿翰-排骨飯/85" v-model="order_items" @keyup.enter="getContent">*}

    {*                </div>*}
    {*                <div class="form-group">*}
    {*                    <button class="btn btn-danger">訂單送出</button>*}
    {*                </div>*}

    {*            </div>*}

    <section>

        <div class="container">

            <div class="row">

                {foreach from=$stores item=item}
                    <div class="col-sm-3">
                        <article class="d-flex store-item mb-3">
                            <div class="store-image">
                                <svg class="icon" viewBox="0 0 416 512">
                                    <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                                </svg>
                            </div>
                            <div class="store-text">
                                <input type="hidden" class="item_id" value="{$item.id}">
                                <ul>
                                    <li>名稱：{$item.name} </li>
                                    <li>電話：{$item.phone} </li>
                                    <li>電話：{$item.description} </li>
                                    <li>
                                        <div class="store-button mt-1">
                                            <a href="{$item.images}"
                                               class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu"
                                               target="_blank">菜單</a>
                                            <a href="group-buy.php?id={$item.id}"
                                               class="btn btn-danger btn-sm btn-pill px-2">
                                                開團
                                            </a>
                                            {if isset($logged) && $logged}
                                                <a href="edit.php?id={$item.id}"
                                                   class="btn btn-outline-info btn-sm px-2">編輯</a>
                                                <a href="delete.php?id={$item.id}"
                                                   class="btn btn-outline-danger btn-sm px-2">刪除</a>
                                            {/if}
                                        </div>
                                    </li>
                                    <li class="image_show">
                                        <div class="modal">
                                            <div class="modal-body d-flex align-items-center justify-content-center">
                                                <div class="img"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </article>
                    </div>
                {/foreach}

            </div>
        </div>
    </section>
</main>