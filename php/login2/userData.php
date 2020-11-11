<!-- 註冊資料 mySql -->

<?php
    $host = 'localhost';
    $dbuser = 's10655035';
    $dbpw = '6UE637Y3C9';
    $db_name = 'stock';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
        // alert('Connect Error：'.$db->connect_error);
    }

    $db->set_charset("utf8mb4");

    // 取得 userdata 資料
    $get_sql = "SELECT * FROM userdata"; // 選擇 userdata 的資料表
    $get_result = mysqli_query($db , $get_sql);

    // 取出 DB 中，所有註冊者的 data
    $users = array();  // 存放所有【user帳密】的陣列
    while($row = mysqli_fetch_array($get_result , MYSQLI_ASSOC)){ // 一列一列印出資料 (橫列)
        array_push($users , $row);
    }

    // 由 signup 表單中，取得準備要註冊的帳密 -- 有問題(1012)
    $usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];

    $repeat = 0;
    foreach ($users as $person){
        // 將準備註冊的帳密 與 userdata 中的資料進行比對
        if($_POST['usrname'] == $person["usrname"] && $_POST['passwd'] == $person["passwd"]){

            // 已有該名 user
            $repeat++;
        }
    }
    
    if ($repeat != 0) {
        // 已有該名 user
        header('Location: http://coursesrv.nutn.edu.tw/S10655035/signup.php?msg=你所申請的帳密已有人使用，請重新註冊');

    } else {
        // 無該名 user，進行註冊
        $sql = "INSERT INTO userdata (usrname ,passwd ) VALUES ('$usrname','$passwd')";
        $result = mysqli_query($db,$sql); // 執行 SQL 查詢 (將上面的設定送出)
    }
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <?php

        if($result){
            echo "
            <script>
                alert('註冊成功');
                document.location.href='http://coursesrv.nutn.edu.tw/S10655035/index.php';
            </script>";
        }
        
    ?>

    <body>

    </body>
</html>