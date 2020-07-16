<header class="layout__header">

    <div class="header-top">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="index.php" class="navbar-brand">今天要吃啥<span>？</span></a>
                <div class="account">
                    <a href="javascript:;" class="mr-3">
                        <i class="f-icon fas fa-user-circle"></i>
                    </a>
                    <a href="javascript:;" class="">
                        <i class="f-icon fas fa-cog"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--navbar-expand-lg | sm | md..-->
    <!--對於不需要摺疊的導覽列，在導覽列中加入 .navbar-expand。對於總是摺疊的導覽列，不要加任何 .navbar-expand class-->
    <nav class="navbar navbar-expand-lg navbar-light" id="header__menu">
        <div class="container">
            <button class="navbar-toggler" type="button" data-target="#navbarDemo" data-toggle="collapse"
                    aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarDemo">

                <ul class="navbar-nav">
{*                    <li class="nav-item active">*}
{*                        <a href="index.php" class="nav-link">HOME</a>*}
{*                    </li>*}
                    <li class="nav-item">
                        <a href="group-buy-now.php" class="nav-link">
                            <span class="">進行中團購</span> <span class="badge badge-light" id="group_now_badge">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">餐廳列表</a>
                    </li>

                    {if isset($logged) && !$logged}
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">登入</a>
                        </li>
                    {else}
                        <li class="nav-item">
                            <a href="add.php" class="nav-link">新增餐廳</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">登出</a>
                        </li>
                    {/if}


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
