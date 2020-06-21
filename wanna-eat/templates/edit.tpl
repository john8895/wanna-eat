{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <h1 class="text-center my-3 h3">修改店家「{$item.name}」</h1>
        <hr>
        <div class="row pt-4">
            <div class="m-auto w-50">
                <form action="edit.php" method="post" enctype="multipart/form-data">

                    {* todo: 錯誤訊息對應在欄位上                   *}
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <div class="form-group">
                        <label class="w-75">店家名稱
                            <input type="hidden" name="id" value="{$item.id}">
                            <input type="text" name="name" class="form-control" value="{$item.name}"
                                   placeholder="請輸入店家名稱">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家電話
                            <input type="text" name="phone" class="form-control" value="{$item.phone}"
                                   placeholder="請輸入店家電話">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>上傳菜單
                            <input type="file" name="images" class="form-control-file">
                        </label>
                        <img src="{if isset($item.images)}{$item.images}{/if}" alt="">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mb-2 rounded-0 px-4">送出</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
{include file="js.tpl"}
