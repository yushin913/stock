<?php
    session_start();

    // 清除 session
    session_unset();

    header('Location: http://localhost/KLine/php/login2/login.php'); // 返回登入頁面 (因 session 紀錄已清空 => 代表 【登出】 )
?>