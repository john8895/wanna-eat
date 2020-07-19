{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">修改餐廳資訊</h1>

                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>修改餐廳資訊</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <div class="container innerPage-section">
        <div class="row pt-4">
            <div class="col-sm-12">
                <form action="edit.php" method="post" enctype="multipart/form-data" id="addStoreForm">
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
                                    <input type="hidden" name="id" value="{$item.id}">
                                    <input type="text" name="name"
                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                           value="{$item.name}"
                                           placeholder="請輸入店家名稱">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">餐廳電話</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" name="phone"
                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                           value="{$item.phone}"
                                           placeholder="請輸入店家電話">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">餐廳介紹</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                        <textarea name="description" cols="30" rows="2"
                                                  class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                                  placeholder="請輸入店家介紹">{$item.description}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">外送金額</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                        <input name="store_full_price"
                                                  class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                                  placeholder="請輸入外送金額" value="{$item.store_full_price}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">上傳/更新封面</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="file" name="store_cover" class="form-control-file" id="input_addStoreCover">
                                    <small class="form-text text-muted">
                                        請上傳圖片類型檔案，大小不超過 1 MB
                                    </small>
                                    <div id="store_cover_preview">
                                        <div class="image mt-3 img-thumbnail img-fluid" style="max-width: 300px">
                                            {if isset($item.store_cover)}
                                                <img src="{$item.store_cover}" alt="">
                                            {else}
                                                <img src="http://fakeimg.pl/300x300" alt="">
                                            {/if}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-5 text-center">
                        <div class="sec-title">
                            <h3>更新菜單</h3>
                            <div class="sub-title">Restaurant menu update</div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label text-right">上傳/更新菜單</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="file" name="images" class="form-control-file" id="input_addStoreMenu">
                                <small class="form-text text-muted">
                                    請上傳圖片類型檔案，大小不超過 1 MB
                                </small>
                                <div id="store_menu_preview">
                                    {if isset($item.images)}
                                        <img src="{$item.images}" alt="" class="img-thumbnail">
                                    {else}
                                        <img src="http://fakeimg.pl/300x300" alt="" class="img-thumbnail">
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-sm-12 form-group text-center mt-4">
                <button type="submit" class="btn btn-default mb-2">確認修改</button>
            </div>
            </form>
            <div class="col-sm-12">
                <a href="javascript:window.history.back()" class="btn btn-dark mt-5 px-3 rounded-0">
                    <i class="fas fa-reply mr-2"></i>回上一頁
                </a>
            </div>
        </div>
    </div>


    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
