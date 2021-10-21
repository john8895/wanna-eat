{include file="head.tpl"}
{include file="header.tpl"}
<main class="page__group-login" id="app">
    <div class="inner__banner">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="title">登入群組</h1>
                <nav class="jh-breadcrumb">
                    <ol>
                        <li><a href="./index.php">首頁</a></li>
                        <li>登入群組</li>
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
                                <div class="mb-3">
                                    <label for="group_password">密碼</label>
                                    <input type="password" class="form-control" id="password" v-model="registerFormFields.password" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="button" @click="registerGroup">登入群組</button>
                                <div class="text-right mt-2">
                                    <a class="" href="./register-group.php" title="Login">
                                       新建一個群組？
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