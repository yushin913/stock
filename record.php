<!-- 讀取 mySql 資料 -->
<?php
    // 連線
    $host = 'localhost';
    $dbuser = 'root';
    $dbpw = 's10655039';
    $db_name = 'exam_inp';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
        // alert('Connect Error：'.$db->connect_error);
    }

    $db->set_charset("utf8mb4"); // 編碼

    $sql = "SELECT * FROM ansinput"; // 選擇 ansinput 的資料表
    $result = mysqli_query($db , $sql); // 執行 SQL 查詢 (將上面設定的指令送出)

    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 一列一列印出資料 (橫列)

        // 將資料表中每一列的所有值以 Array 的格式印出
        print_r( $row);
       
        // 印出所選欄位的值 => $row['查詢的欄位1']
        // echo $row['id']." ";
        // echo $row['num1']."<br>";

    }

?>


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