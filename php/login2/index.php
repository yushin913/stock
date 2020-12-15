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
    <meta name="author" content="yuShinLin913">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="imgs/favicon.ico" type="image/icon type">
    <title>新手學股票 --【登入】</title>

</head>

<body>

    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://coursesrv.nutn.edu.tw/S10655035/getIn.php');

        else:
            // 留在登入頁面
    ?>
        <div class="login container">

            <div class="nameBlock">
                <div class="logo">
                    <img src="imgs/15.png" alt="">
                </div>
                    
                <h1 id='sysname'>新手學股票</h1>
            </div>
            
            <form method="post" action="http://coursesrv.nutn.edu.tw/S10655035/check.php">
                
                <h2>使用者登入</h2>

                <?php
                    // 使用 isset 判別有沒有此變數可以使用
                    if(isset($_GET['msg'])){
                        echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                    }
                ?>

                <div class="group">
                    <label class="title" for="">帳號：<input class="inp" type="text" name="username" placeholder=""></label>
                    <label class="title" for="">密碼：<input class="inp" type="password" name="password" placeholder=""></label>
                </div>

                <div class="btn-group">
                    <button class="btn" type="submit">登入</button>
                    <button class="btn"><a href="http://coursesrv.nutn.edu.tw/S10655035/signup.php">註冊</a></button>
                </div>
                
            </form>

        </div>
        
    <?php endif; ?>

</body>
</html>