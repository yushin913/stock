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

    $usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];

    $sql = "INSERT INTO userdata (usrname ,passwd ) VALUES ('$usrname','$passwd')";
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
                alert('註冊成功');
                document.location.href='http://localhost/KLine/php/login2/login.php';
            </script>";

        }
    ?>

    <body>

    </body>
</html>