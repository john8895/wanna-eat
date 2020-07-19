{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__res-list">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">編輯餐廳</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>編輯餐廳</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <section class="index__section main__res-list">
        <div class="container">

            <div class="row">
                {foreach from=$stores item=item}
                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="store-image">
                                <a href="edit.php?id={$item.id}" title="編輯 {$item.name} 的資訊">
                                    {if isset($item.store_cover)}
                                        <img src="{$item.store_cover}" alt="" class="">
                                    {else}
                                        <img src="http://fakeimg.pl/550x440" alt="">
                                    {/if}
                                </a>
                            </div>
                            <div class="store-name text-center store-item store-text my-3">
                                <h4 class="mr-2 title">{$item.name}</h4>
                                <a href="{$item.images}"
                                   class="btn btn-outline-primary btn-sm py-1 btn-pill px-2 btn-menu mr-2 border-left-0 border-right-0 border-top-0"
                                   target="_blank">菜單</a>
                                <a href="edit.php?id={$item.id}"
                                   class="btn btn-outline-dark text-muted py-1 btn-sm px-2 border-left-0 border-right-0 border-top-0">編輯</a>
                                <a href="" data-itemId="{$item.id}"
                                   class="btn btn-outline-dark text-muted py-1 btn-sm px-2 border-left-0 border-right-0 border-top-0 btn-del-store">刪除</a>
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

                <div class="col-sm-12 mt-4">
                    <div class="jh-pagination-wraper">
                        <div class="pagination">
                            <form id="searchFormPage" name="searchFormPage" method="GET">
                                <ul class="pagination-numbers">
                                    <li><a class="active" href="pdt-list.html">1</a></li>
                                    <li><a href="pdt-list.html">2</a></li>
                                    <li><a href="pdt-list.html">3</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}