{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__group-history edit-group page__res-list" id="app" ref="module__groupHistory">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">歷史團購單</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>歷史團購單</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <!-- 進行中團購-->
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mb-3" v-for="(store, storeId) in groupBuyHistory">
                    <div class="card">
                        <div class="store-image">
                            <a :href=`group-buy.php?id={literal}${store.id}{/literal}` :title=`發起的{literal}${store.name}{/literal}團購`>
                                <img :src="store.store_cover" alt="" class="">
                            </a>
                        </div>
                        <div class="store-name text-center store-item store-text my-3 position-relative">
                            <a :href=`group-buy.php?id={literal}${store.id}{/literal}` :title=`發起{literal}${store.name}{/literal}的團購` class="title">
                                <span class="mr-2 ">%% store.name %%</span>
                            </a>
                            <div class="mt-2 text-center">
                                <button class="btn btn-outline-danger del-group-btn  border-top-0 border-left-0 border-right-0" data-groupid="groupBuyData[i].id">
                                    刪除此單
                                </button>
                            </div>
                            {*                            <a :href="store.images"*}
                            {*                               class="btn-default btn-res-menu btn-menu"*}
                            {*                               target="_blank">菜單</a>*}
                            {*                            <div class="image_show">*}
                            {*                                <div class="modal">*}
                            {*                                    <div class="modal-body d-flex align-items-center justify-content-center">*}
                            {*                                        <div class="img"></div>*}
                            {*                                    </div>*}
                            {*                                </div>*}
                            {*                            </div>*}
                        </div>
                    </div>
                </div>
            </div>
            {*            <div class="row mb-4 no-gutters">*}
            {*                <div class="col-sm-12">*}
            {*                    <h4 id="current_groupBuy" class="h5 mb-2"></h4>*}
            {*                </div>*}
            {*            </div>*}

            {*            *}{* Order block *}
            {*            <div class="row order-block"></div>*}
        </div>
    </section>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
