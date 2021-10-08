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