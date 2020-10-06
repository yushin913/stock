<!-- 測試用 -->

<!-- 讀取 mySql 資料 -->
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

    $db->set_charset("utf8mb4"); // 編碼
    $sql = "SELECT * FROM ansinput"; // 選擇 ansinput 的資料表
    $result = mysqli_query($db , $sql); // 執行 SQL 查詢 (將上面設定的指令送出)
    

    $title = []; // 放入該位使用者的作答紀錄(題號)
    $usr_ans = [];  // 放入 user【每次測驗】的回答

    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 一列一列印出資料 (橫列)

        // 將資料表中每一列的所有值以 Array 的格式印出
        // print_r($row);
        // echo "<br><br>";

        $jit = explode("," , $row['choosed']); // 把選中題目(的題號)的字串，轉乘 array
        array_push($title , $jit);

        $tmp = []; // 暫時存放 user【一次測驗】中的回答
        for ($a = 1; $a < 7; $a++) { // 取出每次測驗中的答案，以測驗次數為一個單位
            array_push($tmp , $row["num{$a}"]);
            // print_r($tmp);
            // echo "<br>";
        }
        array_push($usr_ans , $tmp);

    }

    echo " usr_ans 為: ";
    print_r($usr_ans);
    echo "<br><br><br><br>";


    // 使用 PHP 讀取 JSON檔 -- 重要！！！
    $get_Json = file_get_contents("subject.json");
    // Converts to an array 
    $myarray = json_decode($get_Json , true);
    // var_dump($myarray); // prints array

    echo "<br><br><br>";
    echo " title 陣列長度為: ". sizeof($title) ."<br>";
    echo " 正解: " . $myarray[0]["right"];  // 印出 JSON 檔中的正解(right)
    echo "<br>";


    // 檢查 user 的【答案】是否正確，並寫入各別 user 的狀態表
    for ($i = 0; $i < sizeof($title) ; $i++) { // i 為測驗的次數
        // print_r($title[$i]);
        echo "<br>";

        for ($j = 0; $j < sizeof($title[$i]) ; $j++) { 
            echo "<br>";
            print_r($title[$i][$j]);  // 印出【選擇的題號】
            echo " => ";

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
    <title>Document</title>
</head>
<body>

<?php

    if($result){
        echo "
        <script>
            alert('get');
        </script>";
    }
?>
    
</body>
</html>