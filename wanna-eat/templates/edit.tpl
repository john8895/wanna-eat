{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <h1 class="text-center my-3 h3">修改店家「{$item.name}」</h1>
        <hr>
        <div class="row pt-4">
            <div class="col-sm-12">
                <form action="edit.php" method="post" enctype="multipart/form-data">

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
                                        <input type="hidden" name="id" value="{$item.id}">
                                        <input type="text" name="name" class="form-control border-top-0 border-left-0 border-right-0 border-bottom" value="{$item.name}"
                                               placeholder="請輸入店家名稱">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳電話</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control border-top-0 border-left-0 border-right-0 border-bottom" value="{$item.phone}"
                                               placeholder="請輸入店家電話">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳介紹</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="2" class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                                  placeholder="請輸入店家介紹">{$item.description}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳/更新封面</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="file" name="store_cover" class="form-control-file">
                                        <small class="form-text text-muted">
                                            請上傳圖片類型檔案，大小不超過 1 MB
                                        </small>
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

                    <div class="card mt-4">
                        <div class="card-header">
                            <h1 class="h5">上傳菜單</h1>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳/更新菜單</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="file" name="images" class="form-control-file">
                                        <small class="form-text text-muted">
                                            請上傳圖片類型檔案，大小不超過 1 MB
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    {if isset($item.images)}
                                        <img src="{$item.images}" alt="" class="img-thumbnail">
                                    {else}
                                        <img src="http://fakeimg.pl/300x300" alt="" class="img-thumbnail">
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary mb-2 rounded-pill px-4">修改餐廳</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
