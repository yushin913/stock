<!-- 將答案傳進 mySql -->

<?php
    $host = 'localhost';
    $dbuser = 'root';
    $dbpw = '';
    $db_name = 'stock';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
        // alert('Connect Error：'.$db->connect_error);
    }

    $db->set_charset("utf8mb4");

    // 寫入 DB
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $num5 = $_POST['num5'];
    $num6 = $_POST['num6'];
    $choosed = $_POST['choosed'];

    // 抓出目前 load 進【測驗頁面】的時間
    date_default_timezone_set("Asia/Taipei");  // 設定時區
    $settime = date("F d, Y => h:i:s A");
    

    $sql = "INSERT INTO ansinput (num1 ,num2 ,num3 ,num4 ,num5 ,num6 ,choosed ,settime ) VALUES ('$num1','$num2','$num3','$num4','$num5','$num6','$choosed','$settime')";
    $result = mysqli_query($db,$sql); // 執行 SQL 查詢 (將上面的設定送出)

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
                alert('恭喜！測驗提交成功');
                document.location.href='http://localhost/KLine/php/login2/grade.php';  /* 網頁導向的頁面 --> 歷程紀錄 */
            </script>";

        }
    ?>

    <body> 
    </body>
</html>