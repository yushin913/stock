<!-- 歷程記錄 -- 正式版 -->
<!-- 10/06_缺少 登入檢核機制 -->

<?php

    // 連線
    $host = 'localhost';
    $dbuser = 'root';
    $dbpw = '';
    $db_name = 'stock';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
    }

    // 讀取 mySql 資料
    $db->set_charset("utf8mb4"); // 編碼
    $sql = "SELECT * FROM ansinput"; // 選擇 ansinput 的資料表
    $result = mysqli_query($db , $sql); // 執行 SQL 查詢 (將上面設定的指令送出)

    // 處理 mySql 資料
    // $usr_ans 是 使用者 每次測驗的答案
    $title = []; // 放入該位使用者的作答紀錄(題號)
    $usr_ans = [];  // 放入 user【每次測驗】的回答

    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 將資料表中每一列的所有值以 Array 的格式印出

        // 取出 使用者 回答的 【題號(題目)】
        $jit = explode("," , $row['choosed']); // 把選中題目(的題號)的字串，轉乘 array
        array_push($title , $jit);

        // 取出 使用者 的【回答(答案)】
        $tmp = []; // 暫時存放 user【一次測驗】中的回答
        for ($a = 1; $a < 7; $a++) { // 取出每次測驗中的答案，以測驗次數為一個單位
            array_push($tmp , $row["num{$a}"]);
            // print_r($tmp);
            // echo "<br>";
        }
        array_push($usr_ans , $tmp);
    }
    echo " usr【答案】 為: ";
    print_r($usr_ans);
    echo "<br><br>";

    echo " usr【題號】 為: ";
    print_r($title);
    echo "<br><br>";


    // 使用 PHP 讀取 JSON檔 -- 重要！！！
    $get_Json = file_get_contents("subject.json"); // 讀取 JSON檔 資料
    // Json Data Converts to an array
    $myarray = json_decode($get_Json , true); // 【題庫】的陣列
    // var_dump($myarray); // prints array


    // 檢查 user 的【答案】是否正確，並 寫入各別 user 的狀態表(1006後者--未處理)
    for ($i = 0; $i < sizeof($title) ; $i++) { // i 為測驗的次數
        echo "<br>";

        for ($j = 0; $j < sizeof($title[$i]) ; $j++) { 
            echo "<br>";
            print_r($title[$i][$j]);  // 印出【選擇的題號】
            echo " => ";

            // user【答案】 與 題庫【JSON檔】 作比對
            // 10_06_答案比對(OK)
            if ($usr_ans[$i][$j] == $myarray[$title[$i][$j]]["right"] ) {
                # code... 正解 >> $myarray[$title[$i][$j]]["right"]  / 使用者答案 >> $usr_ans[$i][$j]
                echo "correct";
            }else{
                echo "incorrect! {$usr_ans[$i][$j]} != {$myarray[$title[$i][$j]]['right']} ";
            }

        }
    }

?>


<!-- 歷程記錄 -- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學習紀錄</title>
</head>
<body>
    <!-- 記得補上【登出】 -->
</body>
</html>