<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="yuShinLin913">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/favicon.ico" type="image/icon type">
    <title>新手學股票 --【K線圖教學】</title>

</head>
<body>

<?php
    // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']== TRUE):
?>

    <!-- 點擊 button / F11 變為 FullScreen -->
    <div id="container">

      <iframe src="https://dive.nutn.edu.tw/Experiment/kaleTestExperiment5.jsp?eid=13765&record=false" id="KLine" name="dive1"></iframe>

      <!-- FS 提示方法 - 法1 -->
      <div class="notice">
        <button class="button">Click me to fullscreen the iframe</button>
      </div>

      <div class="error"></div>
        
    </div>

    <!-- <p><a href='http://localhost/KLine/php/login2/logout.php'>登出點我</a></p> -->


    <!-- 讓 iframe 滿版 -->
    <script>

      var reset = setInterval(() => {

        var btn = document.getElementById('KLine');
        btn.style.width = document.body.clientWidth.toString() + "px";
        
      }, 300);

    </script>

    <!-- 全螢幕 JS -->
    <script src="JS/fullScreen.js"></script>
    <!-- Dive 跳轉 JS -->
    <script src="https://dive.nutn.edu.tw/Experiment/js/dive.linker.min.js"></script>
    <script src="JS/change.js"></script>

<?php
else:
    // 若使用【非登入帳密】的方法來後台
    header('Location: http://coursesrv.nutn.edu.tw/S10655035/index.php');

endif;
?>

</body>
</html>