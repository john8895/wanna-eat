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
    <div class="container">
        <div class="row">

            {foreach from=$stores item=item}
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <div class="store-image">
                            <a href="group-buy.php?id={$item.id}" title="發起{$item.name}的團購">
                                <img src="./language/img/fake_store_img.jpg" alt="" class="w-100">
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
                                        <a href="group-buy.php?id={$item.id}"
                                           class="btn btn-outline-danger btn-sm btn-pill px-2 border-left-0 border-right-0 border-top-0">
                                            發起團購
                                        </a>
                                        {*                                                    <a href="edit.php?id={$item.id}"*}
                                        {*                                                       class="btn btn-outline-info btn-sm px-2">編輯</a>*}
                                        {*                                                <a href="delete.php?id={$item.id}"*}
                                        {*                                                   class="btn btn-outline-danger btn-sm px-2">刪除</a>*}
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