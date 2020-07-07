{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <div class="row ">
            <div class="col-sm-5 m-auto">
                <form class="form-signin" autocomplete="off" action="login.php" method="post">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="h5">登入</h4>
                        </div>
                        <div class="card-body">
                            {if isset($error)}
                                <div class="form-group text-danger">
                                    {$error}
                                </div>
                            {/if}
                            <div class="form-group">
                                <input type="text" id="inputAccount" class="form-control border-top-0 border-left-0 border-right-0 border-bottom" placeholder="請輸入帳號" required
                                       autofocus
                                       name="username" {if isset($username)}value="{$username}"{/if}>
                            </div>
                            <div class="form-group">

                                <input type="password" id="inputPassword" class="form-control border-top-0 border-left-0 border-right-0 border-bottom" placeholder="請輸入密碼"
                                       required
                                       name="password">
                            </div>
                            <div class="checkbox mb-3 text-right">
                                <label>
                                    <input type="checkbox" value="remember-me"> 在這台電腦上記得我
                                </label>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-primary" type="submit">登入</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}
