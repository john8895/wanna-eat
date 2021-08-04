# 專案介紹

- 名稱：今天要吃啥？
- 版本：v2.0
- 開發時程：2020/7-2021/2 共七個月（利用下班時間製作）

## 簡述

這是一個 PHP 團購系統，採用 PHP Smarty Template + MySQL + Vue3，開發時間 7 個月，待上線功能： LineBot 點餐(Node.js)。辦公室每天訂便當都會遇到兩個問題：訂餐跟收錢，為了解決這個問題，才萌生製作本專案的想法。最初花 3 週時間製作 v1.0，將資料轉為 String 以當天日期為 ID 存入 Localstorage，可上傳圖片、統計同名餐點且可記錄付款狀態；後來學到新技術就把網站升級。

## 資訊

1. DEMO網址（管理帳號及密碼都是 abc）：[http://eat.jgui.tw/](http://eat.jgui.tw/)
2. Github：[https://github.com/john8895/wanna-eat/](https://github.com/john8895/wanna-eat/)
3. LineBot開發中分支：[https://github.com/john8895/line-bot](https://github.com/john8895/line-bot)

## 主要功能

- 新增、修改、刪除餐廳
- 新增、修改、刪除團購單
- 歷史團購單顯示
- 團購單訂購
- 即時統計：同名餐點數量、價格、訂單總計、訂購人…等
- 已付款/未付款狀態顯示
- 新增、刪除團購負責人
- 餐廳標籤
- 基本會員管理（手動添加）
- 訂單立即收單
- 📣 訂單恢復訂購

# 架設方式：

環境：PHP 5.26 + MySQL 

### 一、Clone

```bash
$ git clone https://github.com/john8895/wanna-eat.git
```

### 二、設定資料庫連接資訊，可設定本機及遠端，以註解切換

wanna-eat/assets/inc/Config.php

```bash
<?php
// Localhost
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'wannaeat');
define('DB_USER', 'apai01');
define('DB_PASSWORD', '123456');

// Remote Server
//define('DB_HOST', 's-cdbr-east-02.cleardb.com');
//define('DB_NAME', 'heroku_a1d5f5db83503a4');
//define('DB_USER', 'b526cf82710b1f');
//define('DB_PASSWORD', '54af1c19');

// 時區 - 如未設定從mysql讀出的中文數據會變亂碼
date_default_timezone_set("Asia/Taipei");
```

### 三、建立資料庫

建立資料庫後，匯入以下SQL即可建立資料表及測試資料

wanna-eat/sql/build.sql

# 作品授權

採用 GNU GPLv3 授權

# 心得

「今天要吃啥？v2.0」是繼「口罩地圖」後又一個對我來說「稍有規模」的專案，以前我曾學過 PHP ，但因接觸不深一知半解，這次為了製作出可以讓同事使用的系統，所以特意認真學習了 PHP，透過實地製作專案大幅練習了常用的 PHP 函數及相關的邏輯處理，也自己寫 API 再用 AJAX 串接。

這個專案讓我對 PHP、JS、AJAX等相關技術的熟練度提升不少，但也發現滿多不足之處，像是程式邏輯的條理性與架構不理想，所以當近專案尾聲時，修改功能或修正 Bug 時有滿多不便，代碼中重複性過高，很多東西應該都可以改寫以大幅重用。

這個專案主要是自己獨力完成，真的遇到不懂的地方就上網查，真的沒辦法才尋求後端同事幫忙，有時候我苦思兩、三天的問題，他們只需要五分鐘就解決了，真是令人佩服。

未來希望採用的技術是，後端採用 PHP Laravel + OOP，前端採用 Vue，用更新、更高效的工具與技術來處理專案。
