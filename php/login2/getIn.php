<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>股價線圖 -- 新手上路</title>

</head>
<body>

<?php
    // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']== TRUE):
?>

    <!-- 點擊 button / F11 變為 FullScreen -->
    <div id="container">

      <iframe src="https://dive.nutn.edu.tw/Experiment/kaleTestExperiment5.jsp?eid=13217&record=false" id="KLine" name="dive"></iframe>
        
    </div>

    <!-- <p><a href='http://localhost/KLine/php/login2/logout.php'>登出點我</a></p> -->
    


    <!-- Dive 跳轉 JS -->
    <script src="https://dive.nutn.edu.tw/Experiment/js/dive.linker.min.js"></script>
    <script src="JS/two_choose.js"></script>

<?php
else:
    // 若使用【非登入帳密】的方法來後台
    header('Location: http://localhost/KLine/php/login2/login.php');

endif;
?>

</body>
</html>