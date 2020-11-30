<?php

    session_start();

    // 讀取 mySql 資料
    $host = 'localhost';
    $dbuser = 's10655035';
    $dbpw = '6UE637Y3C9';
    $db_name = 'stock';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
    }
    
    $db->set_charset("utf8mb4"); // 編碼

    $sql = "SELECT * FROM userdata"; // 選擇 userdata 的資料表
    $result = mysqli_query($db , $sql); // 執行 SQL 查詢 (將上面設定的指令送出)

    // 取出 DB 中，所有註冊者的 data
    $users = array();  // 存放所有【user帳密】的陣列
    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 一列一列印出資料 (橫列)
        // 將資料表中每一列的所有值以 Array 的格式印出
        // print_r($row);

        array_push($users , $row);
    }
    print_r($users);

    // 使用 isset 判別有沒有此變數可以使用(是否存在) 或 此變數 is not null
    if(isset($_POST['username']) && isset($_POST['password'])){

        // 直接對傳進來的帳密(資料)進行比對，看該使用者是否註冊
        for ($i=0 ; $i < count($users) ; $i++) { 
            # code...
            if($_POST['username'] == $users[$i]["usrname"] && $_POST['password'] == $users[$i]["passwd"] && $_POST['username'] != "" && $_POST['password'] != ""){
            
                // 將 session 加入一個【已登入】的值(紀錄)
                $_SESSION['is_login'] = TRUE;

                // 將 session 加入一個【目前登入者 名稱】的值(紀錄)
                $_SESSION['usr_now'] = $users[$i]["usrname"];

                // echo "帳號：" . $_POST['username'] ."=" . $users[$i]["usrname"];
                // echo "密碼：" .$_POST['password'] ."=" . $users[$i]["passwd"] . "<br>";

                // 透過 header 轉址
                header('Location: http://coursesrv.nutn.edu.tw/S10655035/getIn.php');
                break;
    
            }else {

                $_SESSION['is_login'] = false;
                // echo "wrong <br>";
                
                // msg?
                header('Location: http://coursesrv.nutn.edu.tw/S10655035/index.php?msg=登入失敗，請確認帳密或進行註冊');
            }
        }

    }else {
        header('Location: http://coursesrv.nutn.edu.tw/S10655035/index.php?msg=請輸入帳密!');
    }


?>