{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <h1 class="text-center my-3 h3">新增餐廳</h1>
        <hr>
        <div class="row pt-4">
            <div class="col-sm-12">
                <form action="add.php" method="post" enctype="multipart/form-data">

                    <div class="card">

                        <div class="card-header">

                            <h1 class="h5">基本資料</h1>

                        </div>

                        <div class="card-body">

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
                                        <textarea name="description" cols="30" rows="2" class="form-control"
                                                  placeholder="請輸入餐廳介紹">{if isset($description)} {$description} {/if}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳封面</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="file" name="store_cover" class="form-control-file">
                                            <small class="form-text text-muted">
                                                請上傳圖片類型檔案，大小不超過 1 MB
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="h5">上傳菜單</h1>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳菜單</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="file" name="images" class="form-control-file">
                                        <small class="form-text text-muted">
                                            請上傳圖片類型檔案，大小不超過 1 MB
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary mb-2 rounded-pill px-4">新增餐廳</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
