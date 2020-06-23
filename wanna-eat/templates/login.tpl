{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <div class="row ">
            <div class="m-auto w-50">
                <form class="form-signin" autocomplete="off" action="login.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">登入管理</h1>
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <div class="form-group">
                        <input type="text" id="inputAccount" class="form-control" placeholder="account" required autofocus
                               name="username" {if isset($username)}value="{$username}"{/if}>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required
                               name="password">
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> 在這台電腦上記得我
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
                </form>
            </div>
        </div>
    </div>
</main>
{include file="js.tpl"}