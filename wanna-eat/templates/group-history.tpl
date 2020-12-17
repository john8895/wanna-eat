{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__group-history edit-group page__res-list" id="app">
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
    <section id="app" class="mt-3">
        <div class="container">
            <div class="row mb-4 no-gutters">
                <div class="col-sm-12">
                    <h4 id="current_groupBuy" class="h5 mb-2"></h4>
                </div>
            </div>

            {* Order block *}
            <div class="row order-block"></div>
        </div>
    </section>


</main>
{include file="footer.tpl"}
{include file="js.tpl"}
