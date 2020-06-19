{include file="head.tpl"}
{include file="header.tpl"}
<main>
    <div class="container">
        <row>
            <form class="form-signin" autocomplete="off">
                <h1 class="h3 mb-3 font-weight-normal">今天要吃啥？</h1>
                <input type="text" id="inputAccount" class="form-control" placeholder="account" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> 在這台電腦上記得我
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
            </form>
        </row>
    </div>
</main>
{include file="js.tpl"}