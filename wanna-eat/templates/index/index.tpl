<main class="page__index">
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


    {*    Store list*}
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 mb-3">
                <h4 class="h5 mb-1">餐廳列表</h4>
                <small class="text-muted">看看你今天要吃啥？</small>
            </div>

            {foreach from=$stores item=item}
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="store-image">
                            <a href="group-buy.php?id={$item.id}" title="發起{$item.name}的團購">
                                {if isset($item.store_cover)}
                                    <img src="{$item.store_cover}" alt="" class="">
                                {else}
                                    <img src="http://fakeimg.pl/550x440" alt="" class="">
                                {/if}
                            </a>
                        </div>
                        <div class="store-name text-center mt-3">
                            {$item.name}
                        </div>
                        <article class="d-flex store-item text-center">
                            <div class="store-text m-auto">
                                <input type="hidden" class="item_id" value="{$item.id}">

                                {*                                        <li>電話：{$item.phone} </li>*}
                                <div class="store-button mt-2 mb-3">
                                    <a href="{$item.images}"
                                       class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu mr-2 border-left-0 border-right-0 border-top-0"
                                       target="_blank">菜單</a>

                                    {if isset($logged) && $logged}
{*                                        <a href="group-buy.php?id={$item.id}"*}
{*                                           class="btn btn-outline-danger btn-sm btn-pill px-2 border-left-0 border-right-0 border-top-0">*}
{*                                            發起團購*}
{*                                        </a>*}
                                        <div class="mt-2">
                                        <a href="edit.php?id={$item.id}"
                                           class="btn btn-outline-dark text-muted btn-sm px-2 border-left-0 border-right-0 border-top-0">編輯</a>
                                        <a href="delete.php?id={$item.id}"
                                           class="btn btn-outline-dark text-muted btn-sm px-2 border-left-0 border-right-0 border-top-0">刪除</a>
                                        </div>
                                    {/if}

                                </div>
                                <div class="image_show">
                                    <div class="modal">
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="img"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </article>
                    </div>
                </div>
            {/foreach}

        </div>
    </div>
</main>