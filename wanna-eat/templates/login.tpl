{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__login">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">我的帳號</h1>
                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li>會員登入</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 m-auto">
                    <form class="form-signin" autocomplete="off" method="post">

                        <div class="login-section">
                            <div class="login-header">
                                <h4 class="title">登入</h4>
                            </div>
                            <div class="login-body">
                                {if isset($error)}
                                    <div class="form-group text-danger">
                                        {$error}
                                    </div>
                                {/if}
                                <div class="form-group">
                                    <input type="text" id="inputAccount"
                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                           placeholder="請輸入帳號" required
                                           autofocus
                                           name="username" {if isset($username)}value="{$username}"{/if} ref="username">
                                </div>
                                <div class="form-group">

                                    <input type="password" id="inputPassword"
                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"
                                           placeholder="請輸入密碼"
                                           required
                                           name="password" ref="password">
                                </div>
                                <div class="col-sm-12 text-center mt-4">
                                    <button class="btn btn-default g-recaptcha mr-2" type="submit" data-action="verify1" data-callback="recaptchaHandler" data-sitekey="6LeWwnEcAAAAACR_aD5w2RsmpWSnJEGxI3JppBn1">
                                        登入
                                    </button>
                                    <a href="./register.php" title="加入會員" class="btn btn-primary">加入會員</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}