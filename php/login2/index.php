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
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'> 
    <link rel="icon" href="imgs/favicon.ico" type="image/icon type">
    <title>新手學股票 --【登入】</title>

</head>

<body class="body">

    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://coursesrv.nutn.edu.tw/S10655035/getIn.php');

        else:
            // 留在登入頁面
    ?>
        <div class="login-page">
            <div class="form">

                <form method="post" action="http://coursesrv.nutn.edu.tw/S10655035/check.php">
                
                    <img src="imgs/logo.png" alt="logo">

                    <?php
                        // 使用 isset 判別有沒有此變數可以使用
                        if(isset($_GET['msg'])){
                            echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                        }
                    ?>

                    <input type="text" name="username" placeholder="&#xf007;  使用者名稱"/>
                    <input type="password" name="password" placeholder="&#xf023;  使用者密碼"/>
                    <button>LOGIN</button>
                    <!-- <p class="message"></p> -->
                </form>

                
                    <button id='signup' onclick="sign();">SIGN UP</button>
                
            </div>
        </div>

        <script>
            function sign() {
                location.href = "http://coursesrv.nutn.edu.tw/S10655035/signup.php";
            }
        </script>
        
    <?php endif; ?>

</body>
</html>