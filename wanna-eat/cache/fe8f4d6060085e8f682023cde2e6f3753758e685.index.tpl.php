<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-19 16:49:24
  from 'D:\xampp\htdocs\myphp\projects\wanna-eat\wanna-eat\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eecd074223114_09136191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '623f66f3a6ebff2bab620813d860b605e3037006' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myphp\\projects\\wanna-eat\\wanna-eat\\templates\\index.tpl',
      1 => 1592578139,
      2 => 'file',
    ),
    '129f418d96e3f7074f3cc41eb9d91cedb2fea1b0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myphp\\projects\\wanna-eat\\wanna-eat\\templates\\head.tpl',
      1 => 1592578033,
      2 => 'file',
    ),
    '9cf9af57158ea1bc874403a8a5dad0ace6329403' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myphp\\projects\\wanna-eat\\wanna-eat\\templates\\header.tpl',
      1 => 1592578163,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5eecd074223114_09136191 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>今天要吃啥？</title>
    <link rel="stylesheet" href="../language/css/bootstrap.css">
    <link rel="stylesheet" href="../language/css/common.css">
    <link rel="stylesheet" href="../language/css/index.css">
</head><body>
<header>
    <div class="container">
        <h1 class="text-center mb-3">今天要吃啥？</h1>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <a href="login.php" class="btn btn-outline-primary btn-sm mr-2">登入</a>
                <a href="add.php" class="btn btn-outline-info btn-sm mr-2">新增店家</a>
                <a href="logout.php" class="btn btn-outline-secondary btn-sm text-dark">登出</a>
            </div>
        </div>
    </div>
</header>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <article class="d-flex store-item pick-color">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm btn-pill">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </article>
                </div>
                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="col-sm-3">
                    <article class="d-flex store-item">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <ul>
                                <li>名稱：龍皮魚丸店</li>
                                <li>電話：04-12345678</li>
                                <li>
                                    <div class="store-button">
                                        <button class="btn btn-outline-primary btn-sm">菜單</button>
                                        <button class="btn btn-outline-info btn-sm">編輯</button>
                                        <button class="btn btn-outline-danger btn-sm">刪除</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script>
    $(function () {

    })
</script>
</body>
</html><?php }
}
