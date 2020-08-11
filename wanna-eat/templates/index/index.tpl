<main class="page__index page__res-list">
    {*
    <section>
        <div class="container" id="app">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <a href="" class="btn btn-info mr-2" id="wanna_eat">今天要吃啥？</a>
                </div>
            </div>
        </div>
    </section>
    *}

    <section class="main__slider">
        <div class="owl-carousel owl-theme">
            <div class="slider-item">
                {*                <div class="text-block">*}
                {*                    <h4 class="title">本月訂購最多次餐廳</h4>*}
                {*                    <div class="description">累計訂餐次數 15 次，最熱門的餐點是…</div>*}
                {*                </div>*}
                <img src="./language/img/banner1.jpg" alt="">
            </div>
            <div class="slider-item">
                {*                <div class="text-block">*}
                {*                    <h4 class="title">本月最熱門飲料</h4>*}
                {*                    <div class="description">累計團購人數 80人次</div>*}
                {*                </div>*}
                <img src="./language/img/banner2.jpg" alt="">
            </div>
        </div>
    </section>

    {*    Store list*}
    <section class="section main__group-list">
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-sm-12 mb-3 mt-5 text-center">
                        <h4 class="h1 title">進行中團購</h4>
                        {*                        <div class="sub-title">Group buy in progress</div>*}
                    </div>
                </div>
            </header>

            <!-- 進行中團購-->
            <main id="app" class="mt-3">
                <div class="row mb-4 no-gutters">
                    <div class="col-sm-12">
                        <h4 id="current_groupBuy" class="h5 mb-2"></h4>
                    </div>
                </div>

                {* Order block *}
                <div class="row order-block"></div>
            </main>

        </div>
    </section>

    {*    Store list*}
    <section class="section main__res-list">
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-sm-12 mb-3 mt-5 text-center">
                        <h4 class="h1 title">餐廳列表</h4>
                    </div>
                </div>
            </header>

            <div class="row">

{*                <div id="store_tags">*}
{*                    <ul class="d-flex justify-content-start">*}
{*                        <li><a href="">麵</a></li>*}
{*                        <li>飯</li>*}
{*                        <li>外食</li>*}
{*                        <li>外送</li>*}
{*                    </ul>*}


{*                </div>*}

{*                <div class="wrap">*}
{*                    <ul class="tab">*}
{*                        {foreach from=$stores item=v1}*}
{*                            {foreach from=$v1.tags item=v2}*}
{*                                <li class="tab-item active" data-id="{$v1.id}"><a href="javascript:;">{$v2}</a></li>*}
{*                            {/foreach}*}
{*                        {/foreach}*}
{*                    </ul>*}
{*                    <div class="main-content">*}
{*                        <div class="main-content-item  selected">*}
{*                        </div>*}
{*                    </div>*}
{*                </div>*}

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        {foreach from=$stores item=store}
                            {$store.name}
                            {foreach from=$store.tags item=tag key=tag_key}
                                    {$tag}
{*                                <a class="nav-item nav-link" id="nav-home-{$k2}" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{$v2}</a>*}
                            {/foreach}
                        {/foreach}
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    {foreach from=$stores item=v1}
{*                        {foreach from=$v1.tags item=v2 key=k2}*}
{*                            <div class="tab-pane fade show" id="nav{$k2}" role="tabpanel" aria-labelledby="nav-home-{$k2}">{$v1.name}</div>*}
{*                        {/foreach}*}
                    {/foreach}
                </div>


{* TODO 2020.08.08 要做餐廳的篩選               *}
            </div>

            <div class="row">
                {foreach from=$stores item=item}
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="store-image">
                                <a href="group-buy.php?id={$item.id}" title="發起{$item.name}的團購">
                                    {if $item.store_cover !== ''}
                                        <img src="{$item.store_cover}" alt="" class="">
                                    {else}
                                        <img src="./language/img/noimg.jpg" alt="" class="">
                                    {/if}
                                </a>
                            </div>
                            <div class="store-name text-center store-item store-text my-3 position-relative">
                                <a href="group-buy.php?id={$item.id}" title="發起{$item.name}的團購" class="title">
                                    <span class="mr-2 ">{$item.name}</span>
                                </a>
                                <a href="{$item.images}"
                                   class="btn-default btn-res-menu btn-menu"
                                   target="_blank">菜單</a>
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
                {/foreach}

            </div>
        </div>
    </section>

</main>