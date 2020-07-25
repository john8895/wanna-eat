{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__edit-info">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">修改團購負責人</h1>
                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>修改團購負責人</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row pt-4">
                <div class="col-sm-12">
                    <div class="form-group text-danger"></div>
                    <div class="row no-gutters">
                        <label class="col-sm-2 col-form-label text-right">負責人：</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="add_host_name"
                                       class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                       placeholder="請輸入團購負責人名稱">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-default mb-2 ml-2" id="add_hostName">確認新增</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5"></div>
            <small class="text-muted">※ 如果要修改的話，請刪除之後新增即可</small>

            <div class="row hostname-block" id="hostname_block"></div>

        </div>
    </section>
    <div class="section">
        <div class="container">
            <div class="row pt-4">
                <div class="col-sm-12 mt-4 px-0">
                    <div class="text-center">
                        <div class="sec-title">
                            <h3>店家標籤</h3>
                            <div class="sub-title">Restaurant Tag</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group text-danger"></div>
                    <div class="row no-gutters">
                        <label class="col-sm-2 col-form-label text-right">新增標籤：</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="add_host_name"
                                       class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                       placeholder="請輸入新標籤名稱">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-default mb-2 ml-2" id="add_storeTag">確認新增</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5"></div>
            <small class="text-muted">※ 如果要修改的話，請刪除之後新增即可</small>

            <div class="row hostname-block" id="storeTag_block"></div>

            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:window.history.back()" class="btn btn-dark mt-5 px-3 rounded-0">
                        <i class="fas fa-reply mr-2"></i>回上一頁
                    </a>
                </div>
            </div>
        </div>
    </div>




        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}