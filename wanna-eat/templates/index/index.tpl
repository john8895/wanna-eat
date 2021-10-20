<main class="page__index page__res-list" id="app" ref="module__index">
    <section class="main__slider">
        <div class="owl-carousel owl-theme">
            <div class="slider-item">
                <img src="./language/img/banner1.jpg" alt="">
            </div>
            <div class="slider-item">
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
                    </div>
                </div>
            </header>

            <!-- 進行中團購-->
            <main id="app" class="mt-3">
                <div class="row mb-4 no-gutters">
                    <div class="col-sm-12">
                        <h4 id="current_groupBuy" class="h5 mb-2">%% getGroupBuyState %%</h4>
                    </div>
                </div>

                {* Order block *}
                <div class="row order-block">
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-3" v-for="(groupBuy, groupBuyKey) in allContinueGroupBuys">
                        <div class="card group-list-item">
                            <div class="store-image">
                                <div class="group-status">
{*                                    ${groupFull}*}
{*                                    <div class="item group-countName">{oneOrderNum}人</div>*}
{*                                    <div class="item group-leftTime">&nbsp;${left_time}收單</div>*}
                                </div>
                                <a :href=`order.php?id={literal}${groupBuy.groupId}{/literal}` :title=`我要跟{literal}${groupBuy.groupHost}{/literal}開的{literal}${groupBuy.storeName}{/literal}`>
                                    <img :src="groupBuy.storeCover" alt="" class="img-fluid">
                                </a>
                            </div>

                            <div class="card-body text-center">
                                <a :href=`order.php?id={literal}${groupBuy.groupId}{/literal}` :title=`我要跟{literal}${groupBuy.groupHost}{/literal}開的{literal}${groupBuy.storeName}{/literal}`>
                                    %% groupBuy.storeName %%
                                </a>
                                <ul>
                                    <li class="orderBtn">
                                        <div class="mt-2 text-center">
                                            <button class="btn btn-outline-danger del-group-btn  border-top-0 border-left-0 border-right-0" :data-groupid="groupBuy.groupId">
                                                刪除此單
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div

                </div>
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
                <div class="col-sm-4 mb-3" v-for="(store, storeId) in allStores">
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
                            <a :href="store.images"
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
            </div>
        </div>
    </section>
</main>