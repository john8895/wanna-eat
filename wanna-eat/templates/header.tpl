<header class="layout__header">

    <div class="header-top">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="index.php" class="navbar-brand">今天要吃啥<span>？</span></a>
                <nav class="header__account">
                    <ul class="d-flex header__nav-settings">
                        {if !isset($logged) || !$logged}
                            <li class="link-item">
                                <a href="login.php" class="drop-link mr-3" title="登入">
                                    <i class="f-icon fas fa-user-circle"></i>
                                </a>
                            </li>
                        {else}
                            <li class="link-item">
                                <a href="javascript:;" class="drop-link mr-3" title="會員功能">
                                    <i class="f-icon fas fa-user-circle"></i>
                                </a>
                                <ul class="drop-menu">
                                    <li class="link-item">
                                        <a href="logout.php" title="會員登出">會員登出</a>
                                    </li>
                                    <li class="link-item">
                                        <a href="edit-info.php" title="修改資訊">修改資訊</a>
                                    </li>
                                </ul>
                            </li>

                        <li class="link-item">
                            <a href="javascript:;" title="設定" class="drop-link">
                                <i class="f-icon fas fa-cog"></i>
                            </a>
                            <ul class="drop-menu">
                                <li class="link-item">
                                    <a href="add.php" title="新增餐廳">新增餐廳</a>
                                </li>
                                <li class="link-item">
                                    <a href="edit-res.php" title="編輯餐廳">編輯餐廳</a>
                                </li>
                                <li class="link-item">
                                    <a href="edit-group-buy.php" title="編輯團購單">編輯團購單</a>
                                </li>
                            </ul>
                        </li>
                        {/if}

                    </ul>


                </nav>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light" id="header__menu">
        <div class="container">
            <button class="navbar-toggler" type="button" data-target="#navbarDemo" data-toggle="collapse"
                    aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarDemo">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="group-buy-now.php" class="nav-link">
                            <span class="mr-1">進行中團購</span> <span class="badge badge-light"
                                                                  id="group_now_badge">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="res-list.php" class="nav-link">餐廳列表</a>
                    </li>

                        <li class="nav-item">
                            <a href="group-history.php" class="nav-link">歷史團購單</a>
                        </li>

                    {*
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <!-- first dropdown-->
                        <ul class="dropdown-menu" aria-labelledby="dropdown_1">
                            <li class="nav-item dropdown">
                                <a href="javascript:;" class="nav-link dropdown-toggle" id="dropdown_1_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                <!-- second dropdown-->
                                <ul class="dropdown-menu" aria-labelledby="dropdown_1_1">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Action</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Action</a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Action</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Action</a>
                            </li>
                        </ul>
                    </li>
*}
                </ul>

            </div>
        </div>
    </nav>

</header>
