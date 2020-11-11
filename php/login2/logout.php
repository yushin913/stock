<?php
    session_start();

    // 清除 session
    session_unset();

    header('Location: http://coursesrv.nutn.edu.tw/S10655035/index.php'); // 返回登入頁面 (因 session 紀錄已清空 => 代表 【登出】 )
?>