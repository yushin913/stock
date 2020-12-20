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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
    <link rel="icon" href="imgs/favicon.ico" type="image/icon type">
    <title>新手學股票 --【註冊】</title>

</head>
<body class="body">

<!-- 當要傳檔案時，必須加上 enctype='multipart/form-data' -->
    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，有則為為【已登入】
        if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
            header('Location: http://coursesrv.nutn.edu.tw/S10655035/getIn.php');

        else:
            // 留在登入頁面
    ?>

        <div class="login-page">
            <div class="form">

                <form method='post' action="http://coursesrv.nutn.edu.tw/S10655035/userData.php" enctype='multipart/form-data'>

                    <img src="imgs/logo.png" alt="logo">

                    <?php
                        // 使用 isset 判別有沒有此變數可以使用
                        if(isset($_GET['msg'])){
                            echo "<p class='error'>{$_GET['msg']}</p>"; // 印出 $_GET['msg'] 的資料(內容)
                        }
                    ?>
                        
                    <input type="text" name="usrname" placeholder="&#xf007; 取個使用者名稱吧！"/>
                    <input type="password" name="passwd" placeholder="&#xf023; 註冊使用者密碼"/>

                    <button type="submit">SIGN UP</button>
                
                </form>

                <button id='back' onclick="back();">BACK</button>
                
                
            </div>
        </div>

    <script>
        function back() {
            location.href = "http://coursesrv.nutn.edu.tw/S10655035/index.php";
        }
    </script>

    <?php endif; ?>

</body>
</html>