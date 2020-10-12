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
    <title>登入</title>

    <style>

        form{
            border: #aaa solid 2px;
            margin: 20px auto;
            padding: 30px;
            width: 300px;
        }

        .error{
            color: red;
            font-weight: 800;
        }

        a{
            text-decoration: none;
        }
    
    </style>

</head>

<body>

    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://localhost/KLine/php/login2/getIn.php');

        else:
            // 留在登入頁面
    ?>
        
        <div>KLine 登入/註冊頁面</div>
        <form method="post" action="http://localhost/KLine/php/login2/check.php">

            <?php
                // 使用 isset 判別有沒有此變數可以使用
                if(isset($_GET['msg'])){
                    echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                }
            ?>

            <div>
                帳號：<input type="text" name="username">
            </div>
            <div>
                密碼：<input type="password" name="password">
            </div>
            <button type="submit">登入</button>
            <button><a href="http://localhost/KLine/php/login2/signup.php">註冊</a></button>

        </form>
    <?php endif; ?>

</body>
</html>