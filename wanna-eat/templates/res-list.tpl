{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__res-list">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">餐廳列表</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>餐廳列表</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    {*    Store list*}
    <section class="section main__res-list">
        <div class="container">

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
{include file="footer.tpl"}
{include file="js.tpl"}
