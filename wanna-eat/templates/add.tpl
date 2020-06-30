{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <h1 class="text-center my-3 h3">今天要吃啥？新增店家</h1>
        <hr>
        <div class="row pt-4">
            <div class="m-auto w-50">
                <form action="add.php" method="post" enctype="multipart/form-data">

                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <div class="form-group">
                        <label class="w-75">店家名稱
                            <input type="text" name="name" class="form-control" {if isset($name)}value="{$name}"{/if} placeholder="請輸入店家名稱">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家電話
                            <input type="text" name="phone" class="form-control" {if isset($phone)}value="{$phone}"{/if} placeholder="請輸入店家電話">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家介紹
                            <textarea name="description" cols="30" rows="2" class="form-control" placeholder="請輸入店家介紹">{if isset($description)} {$description} {/if}</textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>上傳菜單
                            <input type="file" name="images" class="form-control-file">
                        </label>
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
