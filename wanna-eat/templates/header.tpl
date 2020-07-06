<header>

    <!--navbar-expand-lg | sm | md..-->
    <!--對於不需要摺疊的導覽列，在導覽列中加入 .navbar-expand。對於總是摺疊的導覽列，不要加任何 .navbar-expand class-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header__menu">
        <a href="#" class="navbar-brand">Navbar</a>
        <button class="navbar-toggler" type="button" data-target="#navbarDemo" data-toggle="collapse" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarDemo">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link">HOME</a>
                </li>
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
            </ul>

        </div>

    </nav>


    <div class="container mb-4">
        <a href="index.php">
            <h1 class="text-center mb-3">今天要吃啥？</h1></a>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                {if isset($logged) && !$logged}
                    <a href="login.php" class="btn btn-outline-primary btn-sm mr-2">登入</a>
                {else}
                    <a href="logout.php" class="btn btn-outline-secondary btn-sm text-dark mr-2">登出</a>
                    <a href="add.php" class="btn btn-outline-info btn-sm mr-2">新增店家</a>
                {/if}
                <a href="index.php" class="btn btn-outline-success btn-sm mr-2">首頁</a>
            </div>
        </div>

    </div>
</header>
