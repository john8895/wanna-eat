{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__group-register" id="app">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">註冊群組</h1>
                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="./index.php">首頁</a></li>
                        <li>註冊群組</li>
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
                                        <label for="firstName">群組名稱</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" v-model="groupRegisterFormFields.groupName" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password">密碼</label>
                                    <input type="password" class="form-control" id="password" v-model="groupRegisterFormFields.password" placeholder="" required>
                                    <div class="text-mute" :class="[checkPasswordLength ? 'is-valid' : 'is-invalid']"></div>
                                    <div class="valid-feedback">
                                        密碼字數超過 6 個字，這樣可以！
                                    </div>
                                    <div class="invalid-feedback" v-if="groupRegisterFormFields.password > 0">
                                        密碼字數太少，目前輸入 %% groupRegisterFormFields.password %% 字
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm">密碼確認</label>
                                    <input type="password" class="form-control" id="passwordConfirm" v-model="groupRegisterFormFields.passwordConfirm" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="button" @click="groupRegister">註冊群組</button>
                                <div class="text-right mt-2">
                                    <a class="" href="./group-login.php" title="Login">
                                        要加入群組？直接前往
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