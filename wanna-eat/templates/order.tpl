{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <h1 class="text-center my-3 h3"> 訂餐</h1>
        <hr>
        <div class="row pt-4">
            <div class="m-auto w-50">
                <form action="order.php" method="post" enctype="multipart/form-data">


                    <button onclick="getData( {if isset({$id}) } {$id} {/if} ); return false;">接收數據</button>

                    {* todo: 錯誤訊息對應在欄位上                   *}
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <div class="form-group">
                        <label class="w-75">店家名稱
                            <input type="hidden" name="id" value="">
                            <input type="text" name="name" class="form-control" value=""
                                   placeholder="請輸入店家名稱">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家電話
                            <input type="text" name="phone" class="form-control" value=""
                                   placeholder="請輸入店家電話">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>上傳菜單
                            <input type="file" name="images" class="form-control-file">
                        </label>
                        <img src="" alt="">
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
