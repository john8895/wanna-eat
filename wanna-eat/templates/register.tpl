{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__login">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">註冊</h1>
                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="./index.php">首頁</a></li>
                        <li>註冊</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 m-auto">
                    {if isset($error)}
                        <div class="form-group text-danger">
                            {$error}
                        </div>
                    {/if}
                    <form method="POST" action="">
                        <input type="hidden" name="_token" value="NZttqQhEB0WRb7SPDYOCPRdc1DHmceOcYJMzGyco">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                Name
                            </label>
                            <input value="john" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" required="required" autofocus="autofocus" autocomplete="name">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Email
                            </label>
                            <input value="test@test.com" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="password">
                                Password
                            </label>
                            <input value="test" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="new-password">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                                Confirm Password
                            </label>
                            <input value="test" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password_confirmation" type="password" name="password_confirmation" required="required" autocomplete="new-password">
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="./login.php" title="Login">
                                已經註冊了？直接登入
                            </a>

                            <button @click="register" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                                註冊
                            </button>
                        </div>
                    </form>
                    {*                    <form class="form-signin" autocomplete="off" method="post">*}

                    {*                        <div class="login-section">*}
                    {*                            <div class="login-header">*}
                    {*                                <h4 class="title"></h4>*}
                    {*                            </div>*}
                    {*                            <div class="login-body">*}
                    {*                                {if isset($error)}*}
                    {*                                    <div class="form-group text-danger">*}
                    {*                                        {$error}*}
                    {*                                    </div>*}
                    {*                                {/if}*}
                    {*                                <div class="form-group">*}
                    {*                                    <input type="text" id="inputAccount"*}
                    {*                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"*}
                    {*                                           placeholder="請輸入帳號" required*}
                    {*                                           autofocus*}
                    {*                                           name="username" {if isset($username)}value="{$username}"{/if} ref="username">*}
                    {*                                </div>*}
                    {*                                <div class="form-group">*}

                    {*                                    <input type="password" id="inputPassword"*}
                    {*                                           class="form-control border-top-0 border-left-0 border-right-0 border-bottom"*}
                    {*                                           placeholder="請輸入密碼"*}
                    {*                                           required*}
                    {*                                           name="password" ref="password">*}
                    {*                                </div>*}
                    {*                                <div class="col-sm-12 text-center mt-4">*}
                    {*                                    <button class="btn btn-default g-recaptcha mr-2" type="submit" data-action="verify1" data-callback="recaptchaHandler" data-sitekey="6LeWwnEcAAAAACR_aD5w2RsmpWSnJEGxI3JppBn1">*}
                    {*                                        登入*}
                    {*                                    </button>*}
                    {*                                </div>*}
                    {*                            </div>*}
                    {*                        </div>*}
                    {*                    </form>*}
                </div>
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}