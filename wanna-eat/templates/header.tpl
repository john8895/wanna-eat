<header class="header header-transparent" id="header">
    <div class="bg-light sidebar" id="navbarHeader">
        <div class="p-4">
            <button class="btn-login" onclick="location.href=&quot;m-index.html&quot;">登入</button>
            <div class="user-info mt-4">
                <a class="user-info__avatar" href="https://github.com/john8895/wanna-eat" title="檢視嗯災吃啥專案資訊" target="_blank"><i class="fab fa-github"></i></a>
                <div class="user-info__account">
                    <div>訂餐小幫手</div>
                    <a href="https://github.com/john8895/wanna-eat" title="檢視嗯災吃啥專案資訊" target="_blank">檢視本專案資訊</a>
                </div>
            </div>
            <ul class="sidebar__nav nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link link-dark" href="groupbuy-now-list.html" title=""><i class="fas fa-bookmark"></i>進行中團購</a>
                </li>
                <li><a class="nav-link link-dark" href="store-list.html" title=""><i class="fas fa-hands-helping"></i>登錄餐廳</a>
                </li>
                <li>
                    <a class="nav-link link-dark" href="history-list.html" title=""><i class="fas fa-history"></i>歷史團購</a>
                </li>
            </ul>
            <a class="link-logout" href="javascript:;" title="">登出</a>
        </div>
        <hr>
        <div class="d-flex align-items-center p-3"><img src="./public/asset/images/mzaieats-applogo.svg" width="56" height="56">
            <div class="app-text ms-3">App 為您帶來更多美食佳餚。</div>
        </div>
    </div>
    <div class="sidebar-layout"></div>
    <div class="navbar navbar-dark bg-lighj shadow-sm">
        <div class="container-fluid">
            <div class="menu-controller d-flex">
                <button class="menu-btn" id="menuBtn" aria-label="主瀏覽選單">
                    <svg aria-hidden="true" focusable="false" viewBox="0 0 20 20">
                        <path d="M19.167 3.333H.833v2.5h18.334v-2.5zm0 5.834H.833v2.5h18.334v-2.5zM.833 15h18.334v2.5H.833V15z"></path>
                    </svg>
                </button>
                <a class="navbar-brand d-flex align-items-center" href="index.html" title=""><img src="./public/asset/images/logo.svg" alt="" width="146" height="24"></a>
            </div>
            <div class="recommend-eat">
                <i class="fas fa-utensils"></i><span class="recommend-text">今天推薦你吃</span><a href="order.html" title=""><span class="store-name">龍品魚丸店</span></a>
            </div>
        </div>
    </div>
</header>

{*<header class="layout__header">*}

{*    <div class="header-top">*}
{*        <div class="container">*}
{*            <div class="d-flex justify-content-between">*}
{*                <a href="index.php" class="navbar-brand">今天要吃啥<span>？</span></a>*}
{*                <nav class="header__account">*}
{*                    <ul class="d-flex header__nav-settings">*}
{*                        {if !isset($logged) || !$logged}*}
{*                            <li class="link-item">*}
{*                                <a href="login.php" class="drop-link mr-3" title="登入">*}
{*                                    <i class="f-icon fas fa-user-circle"></i>*}
{*                                </a>*}
{*                            </li>*}
{*                        {else}*}
{*                            <li class="link-item">*}
{*                                <a href="javascript:;" class="drop-link mr-3" title="會員功能">*}
{*                                    <i class="f-icon fas fa-user-circle"></i>*}
{*                                </a>*}
{*                                <ul class="drop-menu">*}
{*                                    <li class="link-item">*}
{*                                        <a href="logout.php" title="會員登出">會員登出</a>*}
{*                                    </li>*}
{*                                    <li class="link-item">*}
{*                                        <a href="edit-info.php" title="修改資訊">修改資訊</a>*}
{*                                    </li>*}
{*                                </ul>*}
{*                            </li>*}

{*                        <li class="link-item">*}
{*                            <a href="javascript:;" title="設定" class="drop-link">*}
{*                                <i class="f-icon fas fa-cog"></i>*}
{*                            </a>*}
{*                            <ul class="drop-menu">*}
{*                                <li class="link-item">*}
{*                                    <a href="add.php" title="新增餐廳">新增餐廳</a>*}
{*                                </li>*}
{*                                <li class="link-item">*}
{*                                    <a href="edit-res.php" title="編輯餐廳">編輯餐廳</a>*}
{*                                </li>*}
{*                                <li class="link-item">*}
{*                                    <a href="edit-group-buy.php" title="編輯團購單">編輯團購單</a>*}
{*                                </li>*}
{*                            </ul>*}
{*                        </li>*}
{*                        {/if}*}

{*                    </ul>*}


{*                </nav>*}
{*            </div>*}
{*        </div>*}
{*    </div>*}

{*    <nav class="navbar navbar-expand-lg navbar-light" id="header__menu">*}
{*        <div class="container">*}
{*            <button class="navbar-toggler" type="button" data-target="#navbarDemo" data-toggle="collapse"*}
{*                    aria-expanded="false">*}
{*                <span class="navbar-toggler-icon"></span>*}
{*            </button>*}
{*            <div class="collapse navbar-collapse" id="navbarDemo">*}

{*                <ul class="navbar-nav">*}
{*                    <li class="nav-item">*}
{*                        <a href="group-buy-now.php" class="nav-link">*}
{*                            <span class="mr-1">進行中團購</span> <span class="badge badge-light"*}
{*                                                                  id="group_now_badge">0</span>*}
{*                        </a>*}
{*                    </li>*}
{*                    <li class="nav-item">*}
{*                        <a href="res-list.php" class="nav-link">餐廳列表</a>*}
{*                    </li>*}
{*                    <li class="nav-item">*}
{*                        <a href="group-history.php" class="nav-link">歷史團購單</a>*}
{*                    </li>*}

{*                </ul>*}

{*            </div>*}
{*        </div>*}
{*    </nav>*}

{*</header>*}
