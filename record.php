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

    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 一列一列印出資料 (橫列)

        // 將資料表中每一列的所有值以 Array 的格式印出
        print_r( $row);
        echo "<br><br>";
       
        // 印出所選欄位的值 => $row['查詢的欄位1']
        // echo $row['choosed'] ."<br>";
        // echo gettype($row['choosed']); // string

        $jit = explode(",", $row['choosed']); // 把選中題目(的題號)的字串，轉乘 array
        array_push($title , $jit);

    }

    echo " title 為: ";
    print_r($title);
    echo "<br><br><br><br>";

    // $str = "Hello,Friend";
    // $pieces = explode(",", $str); // string to array
    // print_r($pieces);

    // 使用 PHP 讀取 JSON檔
    $get_Json = file_get_contents("subject.json");
    // Converts to an array 
    $myarray = json_decode($get_Json, true);
    var_dump($myarray); // prints array

    echo "<br><br><br>";
    echo " title 陣列長度為: ". sizeof($title) ."<br>";

    // 檢查 user 的【答案】是否正確，並寫入各別 user 的狀態表
    for ($i=0; $i < sizeof($title) ; $i++) { 
        print_r($title[$i]);
        echo "<br>";
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