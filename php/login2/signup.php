<?php
    // 啟用 session (要使用 session 必定要寫)
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/signup.css">
    <title>註冊頁面</title>

</head>
<body>

<!-- 當要傳檔案時，必須加上 enctype='multipart/form-data' -->
    <div class="login container">
        <form action="http://localhost/KLine/php/login2/userData.php" method='post' enctype='multipart/form-data'>

            <h2>SIGN UP</h2>

            <?php
                // 使用 isset 判別有沒有此變數可以使用
                if(isset($_GET['msg'])){
                    echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                }
            ?>

            <div class="group">
                <label class="title" for="">帳號：<input class="inp" type="text" name="usrname" placeholder="註冊帳號"></label>
                <label class="title" for="">密碼：<input class="inp" type="password" name="passwd" placeholder="註冊密碼"></label>
            </div>

            <button class="btn" type="submit">Submit</button>

        </form>
    </div>

</body>
</html>