<header>
    <div class="container">
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
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="" class="btn btn-info mr-2" id="wanna_eat">今天要吃啥？</a>
            </div>
        </div>
    </div>
</header>
