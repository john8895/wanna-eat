<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>今天要吃啥？ - 新增店家</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
<main>
    <section>
        <div class="container">
            <h1 class="text-center my-3 h4">今天要吃啥？新增店家</h1>
            <hr>
            <div class="row pt-4">
                <div class="m-auto w-50">
                    <form action="">
                        <div class="form-group">
                            <label class="w-100">店家名稱
                                <input type="text" name="" class="form-control form-control-lg" value="" placeholder="請輸入店家名稱">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="w-100">店家電話
                                <input type="text" name="" class="form-control  form-control-lg" value="" placeholder="請輸入店家電話">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>上傳菜單
<!--                                <svg class="icon" viewBox="0 0 640 512" id="upfile1" style="cursor:pointer"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"></path></svg>-->
                                <input type="file" name="" class="form-control-file" id="choose_file" >
                            </label>
                        </div>
                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-primary mb-2 rounded-0 px-4">送出</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script>
    $(function () {
        // $('#upfile1').click(function () {
        //     $('#choose_file').trigger('click');
        // })
    })
</script>
</body>
</html>