{include file="head.tpl"}
{include file="header.tpl"}
<main class="page-groupbuy">
    <section class="innerpage-banner" style="background-image:url(archive/innerpage-banner.jpg);">
        <div class="innerpage-text">
            <h1 class="innerpage-title">大胖肉羹 中國醫店</h1>
            <ul class="store-meta">
                <li><i class="fa fa-circle"></i>75-100TWD 費用</li>
                <li><i class="fa fa-circle"></i>準時</li>
                <li><i class="fa fa-circle"></i>滿 500 外送</li>
            </ul>
        </div>
        <button class="btn btn-modal-call" type="button" data-bs-toggle="modal" data-bs-target="#groupbuyCallModal">
            <i class="fa fa-user-plus"></i>發起團購訂單
        </button>
        <div class="modal fade groupbuy-modal" id="groupbuyCallModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body groupbuy-body">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="groupbuy-body__content">
                            <div class="text-center"><img src="images/groupbuy-modal.svg" width="200" height="96"></div>
                            <h1 class="title">我的團購訂單</h1>
                            <p class="description">在下一步邀請賓客使用可分享連結新增餐點。所有人都訂完後，再幫大家訂餐及付款。</p>
                            <ul class="store-detail">
                                <li>
                                    <div class="mb-1"><i class="fa fa-chess-pawn"></i>團購負責人<em class="red">*</em></div>
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <input class="form-control" type="text" value="" placeholder="請輸入團購負責人" name="group_host_new">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="group_host">
                                                <option value="0" selected="selected">或選擇團購負責人</option>
                                                <option value="阿翰" name="host_name">阿翰</option>
                                                <option value="Tony" name="host_name">Tony</option>
                                                <option value="岑" name="host_name">岑</option>
                                                <option value="小幫手" name="host_name">小幫手</option>
                                                <option value="帥哥" name="host_name">帥哥</option>
                                                <option value="思" name="host_name">思</option>
                                                <option value="美女" name="host_name">美女</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li><i class="fa fa-heart"></i>大胖肉羹 中國醫店</li>
                                <li><i class="fa fa-phone"></i><a href="tel:0422490558" title="">04-22490558</a></li>
                                <li><i class="fa fa-coins"></i>滿 500 外送</li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <div class="input-group date" id="datetimepicker_date" data-target-input="nearest">
                                                <input class="form-control datetimepicker-input" type="text" data-target="#datetimepicker_date" name="endTime_day" required="required" placeholder="收單日期 *">
                                                <div class="input-group-append" data-target="#datetimepicker_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group date" id="datetimepicker_time" data-target-input="nearest">
                                                <input class="form-control datetimepicker-input" type="text" data-target="#datetimepicker_time" name="end_time_hour" required="required" placeholder="收單時間 *">
                                                <div class="input-group-append" data-target="#datetimepicker_time" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><i class="fa fa-sticky-note"></i>
                                    <label class="mb-1" for="">注意事項</label>
                                    <input class="form-control" type="text" value="" name="remark" placeholder="請輸入注意事項">
                                </li>
                            </ul>
                            <button class="btn-login" onclick="location.href=&quot;order.html&quot;">建立訂單</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="store-info">
        <div class="container-fluid">
            <ul class="d-flex flex-column">
                <li class="category"><i class="fa fa-folder-open"></i>中式美食</li>
                <li class="address"><i class="fa fa-map-marker-alt"></i>台中市北區梅亭街253號, Taichung, 404</li>
                <li class="intro"><i class="fa fa-info-circle"></i>各式炒飯、現炒餐點，每週五公休</li>
                <li class="link"><i class="fa fa-link"></i><a href="javascript:;" title="" target="_blank">相關網站</a></li>
            </ul>
        </div>
    </section>
    <section class="groupbuy">
        <div class="container-fluid">
            <h3 class="groupbuy-title">菜單及圖庫 Restaurant menu</h3>
            <div class="row gx-0">
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
                <article class="groupbuy-meta">
                    <div class="store-image">
                        <a href="archive/menu.jpg" data-lightbox="image-1" data-title="菜單"><img src="archive/menu.jpg" alt=""></a>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <div class="remark">
        <div class="container-fluid"><em>上開資訊是由我們所合作之商家合作夥伴所提供。如對上開資訊有任何疑問，請直接與商家合作夥伴聯繫。</em></div>
    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}