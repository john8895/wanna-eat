{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__group-buy-now page__res-list" id="app" ref="module__groupBuyNow">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">進行中團購</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>進行中團購</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <!-- 進行中團購-->
    <section class="section main__group-list">
        <div class="container">

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
</main>
{include file="footer.tpl"}
{include file="js.tpl"}