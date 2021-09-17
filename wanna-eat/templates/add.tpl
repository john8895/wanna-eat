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
                    <form method="post" enctype="multipart/form-data" @submit="checkStoreForm($event, 'addStore')">
                        <div>
                            <div class="text-center text-danger" v-if="storeFormField.errors.length">
                                <ul>
                                    <li v-for="error in storeFormField.errors">%% error %%</li>
                                </ul>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳名稱</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="name"
                                               class="form-control" v-model="storeFormField.name" ref="storeName"
                                               {if isset($name)}value="{$name}"{/if} placeholder="請輸入餐廳名稱 *">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳電話</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="phone"
                                               class="form-control" v-model="storeFormField.phone" ref="storePhone"
                                               {if isset($phone)}value="{$phone}"{/if} placeholder="請輸入餐廳電話 *">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">餐廳介紹</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="description" cols="30" rows="3" class="form-control" v-model="storeFormField.description"
                                                  placeholder="請輸入餐廳介紹">{if isset($description)} {$description} {/if}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">外送金額</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="number" name="store_full_price" v-model="storeFormField.fullPrice"
                                               class="form-control" ref="storeFullPrice"
                                               {if isset($store_full_price)}value="{$store_full_price}"{/if}
                                               placeholder="滿多少錢才可外送，不限制請輸入 0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">標籤</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="store_tag" v-model="storeFormField.tags"
                                               class="form-control"
                                               {if isset($store_tag)}value="{$store_tag}"{/if}
                                               placeholder="標籤分類，輸入多個標籤請以逗號「,」分隔">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label text-right">上傳封面 *</label>
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <div class="drop-zone">
                                            <span class="drop-zone__prompt">拖移檔案至此或點選上傳圖片，大小不超過 1 MB</span>
                                            <input type="file" name="store_cover" class="form-control-file drop-zone__input" ref="storeCover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label class="col-sm-2 col-form-label text-right">上傳菜單 *</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">拖移檔案至此或點選上傳圖片，大小不超過 1 MB</span>
                                        <input type="file" name="images" class="form-control-file drop-zone__input" ref="storeMenu">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-default">新增餐廳</button>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <div class="mb-2"><i class="fa fa-file-image mr-2"></i>縮圖小幫手</div>
                                <div class="form-group">
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">拖移大圖至此幫你圖縮小</span>
                                        <input type="file" name="images" class="form-control-file drop-zone__input" ref="resizeImage">
                                    </div>
                                </div>
                            </div>
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
