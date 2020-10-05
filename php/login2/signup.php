<?php
    // 啟用 session (要使用 session 必定要寫)
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊頁面</title>

    <style>
        .error{
                color: red;
                font-weight: 800;
        }
    </style>

</head>
<body>

<!-- 當要傳檔案時，必須加上 enctype='multipart/form-data' -->
    <form action="http://localhost/KLine/php/login2/userData.php" method='post' enctype='multipart/form-data'>

        <fieldset>

            <?php
                // 使用 isset 判別有沒有此變數可以使用
                if(isset($_GET['msg'])){
                    echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                }
            ?>

            <legend>註冊資訊</legend>
            <label for="">帳號：<input type="text" name='usrname' placehodler='請輸入帳號'></label></br>
            <label for="">密碼：<input type="password" name='passwd' placehodler='請輸入密碼'></label></br>
        </fieldset>

        <button type="submit">Submit</button>
    </form>

</body>
</html>