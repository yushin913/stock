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
    <link rel="stylesheet" href="css/login.css">
    <title>註冊頁面</title>

</head>
<body>

<!-- 當要傳檔案時，必須加上 enctype='multipart/form-data' -->
    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://coursesrv.nutn.edu.tw/S10655035/getIn.php');

        else:
            // 留在登入頁面
    ?>
        <div class="login container">
            <form action="http://coursesrv.nutn.edu.tw/S10655035/userData.php" method='post' enctype='multipart/form-data'>

                <h2>使用者註冊</h2>

                <?php
                    // 使用 isset 判別有沒有此變數可以使用
                    if(isset($_GET['msg'])){
                        echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                    }
                ?>

                <div class="group">
                    <label class="title" for="">帳號：<input class="inp" type="text" name="usrname" placeholder="註冊帳號 (限英文、數字)"></label>
                    <label class="title" for="">密碼：<input class="inp" type="password" name="passwd" placeholder="註冊密碼 (限英文、數字)"></label>
                </div>

                <div class="btn-group">
                    <button class="btn" type="submit">註冊</button>
                    <button class="btn"><a href="http://coursesrv.nutn.edu.tw/S10655035/index.php">返回</a></button>
                </div>
                
            </form>
        </div>

    <?php endif; ?>

</body>
</html>