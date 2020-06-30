{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <!-- 開團 -->
        <div v-if="orderDisplay" class="row modal-wrap">
            <div class="col-sm-12">
                <input type="hidden" name="id" :value="orders.id">
                <ul class="store-text">
                    <li>開團人：<select name="" id="">
                            <option value="阿翰">阿翰</option>
                        </select>
                        <button>新增負責人</button>
                    </li>
                    <li>店家名稱：%% orders.name %%</li>
                    <li>店家電話：%% orders.phone %%</li>
                    <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
                    <li>菜單：<a v-bind:href="orders.images"
                              class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a></li>
                    <li class="image_show">
                        <div class="modal">
                            <div class="modal-body d-flex align-items-center justify-content-center">
                                <div class="img"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>截止時間：
                            <input type="text" value="1200">
                        </label>
                    </li>
                    <li>
                        <label>注意事項：
                            <input type="text" value="老闆很凶會罵人">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 ">
                <div class="form-group">
                    <button class="btn btn-danger" @click="saveOrder">開始團購囉</button>
                    <button @click="orderDisplay = false">取消</button>
                </div>
            </div>
        </div>
    </div>
</main>
{include file="js.tpl"}