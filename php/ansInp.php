<!-- 將答案傳進 mySql -->

<?php
    $host = 'localhost';
    $dbuser = 'root';
    $dbpw = 's10655039';
    $db_name = 'exam_inp';
    $db = mysqli_connect($host,$dbuser,$dbpw,$db_name);
    if($db->connect_error){
        die('Connect Error：'.$db->connect_error);
        // alert('Connect Error：'.$db->connect_error);
    }

    $db->set_charset("utf8mb4");

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $num5 = $_POST['num5'];
    $num6 = $_POST['num6'];
    

    $sql = "INSERT INTO ansinput (num1 ,num2 ,num3 ,num4 ,num5 ,num6 ) VALUES ('$num1','$num2','$num3','$num4','$num5','$num6')";
    $result = mysqli_query($db,$sql); // 執行 SQL 查詢 (將上面的設定送出)
    // if($result){
    //     // header('location:http://localhost/final/form.html'); // submit 不會跳至 php (網頁重新定向) --> 失敗！

    // }

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
                alert('表單送出成功');
                document.location.href='http://localhost/KLine/exam.html';  /* 網頁導向的頁面 --> 歷程紀錄 */
            </script>";

        }
    ?>

    <body> 
    </body>
</html>