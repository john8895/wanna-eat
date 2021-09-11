{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__add-res">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">新增餐廳</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>新增餐廳</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row pt-4">
                <div class="col-sm-12">
                    <form action="add.php" method="post" enctype="multipart/form-data" id="addStoreForm">

                        <div class="">
                            {if isset($error)}
                                <div class="form-group text-danger">
                                    {$error}
                                </div>
                            {/if}
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳名稱</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="name"
                                               class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                               {if isset($name)}value="{$name}"{/if} placeholder="請輸入餐廳名稱 *">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳電話</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="phone"
                                               class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                               {if isset($phone)}value="{$phone}"{/if} placeholder="請輸入餐廳電話">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳介紹</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="3" class="form-control"
                                                  placeholder="請輸入餐廳介紹">{if isset($description)} {$description} {/if}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">外送金額</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="number" name="store_full_price"
                                               class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                               {if isset($store_full_price)}value="{$store_full_price}"{/if}
                                               placeholder="滿多少錢才可外送，不限制請輸入 0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">標籤</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="store_tag"
                                               class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                               {if isset($store_tag)}value="{$store_tag}"{/if}
                                               placeholder="標籤分類，輸入多個標籤請以逗號「,」分隔">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳封面</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="file" name="store_cover" class="form-control-file" id="input_addStoreCover">
                                        <small class="form-text text-muted">
                                            請上傳圖片類型檔案，大小不超過 1 MB
                                        </small>
                                        <div id="store_cover_preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-5">
                            <div class="text-center">
                                <div class="sec-title">
                                    <h3>上傳菜單</h3>
                                    <div class="sub-title">Restaurant menu upload</div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <label class="col-sm-2 col-form-label text-right">上傳菜單</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="file" name="images" class="form-control-file" id="input_addStoreMenu">
                                        <small class="form-text text-muted">
                                            請上傳圖片類型檔案，大小不超過 1 MB
                                        </small>
                                        <div id="store_menu_preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-default">新增餐廳</button>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12">
                    <a href="javascript:window.history.back()" class="btn btn-dark mt-5 px-3 rounded-0">
                        <i class="fas fa-reply mr-2"></i>回上一頁
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
