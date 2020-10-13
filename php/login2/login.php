<!--
    利用 session 來檢查 【是否已經登入的】機制 => login2、check2、backend2、logout2 檔
-->

<?php
    // 啟用 session (要使用 session 必定要寫)
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>登入</title>

</head>

<body>

    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://localhost/KLine/php/login2/getIn.php');

        else:
            // 留在登入頁面
    ?>
        <div class="login">
            <form method="post" action="http://localhost/KLine/php/login2/check.php">
                <h2>USER　LOGIN</h2>

                <?php
                    // 使用 isset 判別有沒有此變數可以使用
                    if(isset($_GET['msg'])){
                        echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                    }
                ?>

                <div class="group">
                    <input type="text" name="username" placeholder="使用者 帳號">
                    <input type="password" name="password" placeholder="使用者 密碼">
                </div>

                <div class="btn-group">
                    <button class="btn" type="submit">登入</button>
                    <button class="btn"><a href="http://localhost/KLine/php/login2/signup.php">註冊</a></button>
                </div>
                

            </form>
        </div>
        
    <?php endif; ?>

</body>
</html>