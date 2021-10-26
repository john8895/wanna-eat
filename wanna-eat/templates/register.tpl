{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__login" id="app">
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
                {if isset($error)}
                    <div class="form-group text-danger">
                        {$error}
                    </div>
                {/if}
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 order-md-1 m-auto">
                            <form class="needs-validation">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">要顯示的名稱</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" v-model="registerFormFields.nickName" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email帳號</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com" v-model="registerFormFields.email" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password">密碼</label>
                                    <input type="password" class="form-control" id="password" v-model="registerFormFields.password" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm">密碼確認</label>
                                    <input type="password" class="form-control" id="passwordConfirm" v-model="registerFormFields.passwordConfirm" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="button" @click="register">加入會員</button>
                                <div class="text-right mt-2">
                                    <a class="" href="./login.php" title="Login">
                                        已經註冊了？直接登入
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}
{include file="js.tpl"}