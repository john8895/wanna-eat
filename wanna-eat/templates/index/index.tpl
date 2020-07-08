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
                            <img src="http://picsum.photos/208/150" alt="">
                        </div>
                        <div class="card-body">
                            <article class="d-flex store-item">

                                <div class="store-text">
                                    <input type="hidden" class="item_id" value="{$item.id}">
                                    <ul>
                                        <li>名稱：{$item.name} </li>
                                        <li>電話：{$item.phone} </li>
                                        <li>簡介：{$item.description} </li>
                                        <li>
                                            <div class="store-button mt-2">
                                                <a href="{$item.images}"
                                                   class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu"
                                                   target="_blank">菜單</a>

                                                {if isset($logged) && $logged}
                                                    <a href="group-buy.php?id={$item.id}"
                                                       class="btn btn-danger btn-sm btn-pill px-2">
                                                        開團
                                                    </a>
                                                    <a href="edit.php?id={$item.id}"
                                                       class="btn btn-outline-info btn-sm px-2">編輯</a>
                                                    {*                                                <a href="delete.php?id={$item.id}"*}
                                                    {*                                                   class="btn btn-outline-danger btn-sm px-2">刪除</a>*}
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
                    </div>
                </div>
            {/foreach}

        </div>
    </div>
</main>