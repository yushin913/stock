<!-- 歷程記錄 -- 正式版 -->
<!-- 10/06_缺少 登入檢核機制 -->

<?php

    session_start();


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
    $timer = [];

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

        // 取出 使用者 啥時【開始作答】
        array_push($timer , $row['settime']);
        // echo " ROW: ";
        // print_r($row);
        // echo "<br>";
    }

    // echo " timer: ";
    // print_r($timer);

    // echo " usr【答案 / usr_ans】 為: ";
    // print_r($usr_ans);
    // echo "<br>";

    // echo " usr【題號 / title】 為: ";
    // print_r($title);
    // echo "<br>";



    // 使用 PHP 讀取 JSON檔 -- 重要！！！
    $get_Json = file_get_contents("formal.json"); // 讀取 JSON檔 資料
    // Json Data Converts to an array
    $myarray = json_decode($get_Json , true); // 【formal 題庫】的陣列
    // var_dump($myarray); // prints array


    // 檢查 user 的【答案】是否正確，並 寫入各別 user 的狀態表(1006_user狀態表--未處理)
    for ($i = 0; $i < sizeof($title) ; $i++) { // i 為測驗的次數

        for ($j = 0; $j < sizeof($title[$i]) ; $j++) { 
            // echo "<br>";
            // print_r($title[$i][$j]);  // 印出【選擇的題號】
            // echo " => ";


            // user【答案】 與 題庫【JSON檔】 作比對
            // 10_06_答案比對(OK)
            if ($usr_ans[$i][$j] == $myarray[$title[$i][$j]]['right'] ) {
                # code... 正解 >> $myarray[$title[$i][$j]]["right"]  / 使用者答案 >> $usr_ans[$i][$j]
                // echo "correct";
            }else{
                // echo "incorrect! {$usr_ans[$i][$j]} != {$myarray[$title[$i][$j]]['right']} ";
            }

        }
        // echo "<br>";
    }

?>


<!-- 歷程記錄 -- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/grade.css">
    <title>股價線圖 -- 新手上路 【學習歷程】</title>
    
</head>
<body>

<?php
    // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']== TRUE):
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand mb-0 h1" href="#" style="font-size: 25px;"><?php echo '使用者：' . $_SESSION['usr_now']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 36px; font-weight: 700;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/KLine/php/login2/getIn.php">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/KLine/php/login2/FScreen.php">教學</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/KLine/php/login2/back_exam.php">測驗</a>
                <li class="nav-item active">
                    <a class="nav-link" href="#">紀錄</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/KLine/php/login2/logout.php" style="color: #fff;">登出</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">

        <?php

            for ($i = 0; $i < sizeof($title) ; $i++) { // i 為測驗的次數
                $count = $i + 1;

                echo "<div class='grade'>
                        <p class='time'>第 {$count} 次測驗：{$timer[$i]}</p>
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='col'>測驗題順序</th>
                                    <th scope='col'>題庫題號</th>
                                    <th scope='col'>您的回答</th>
                                    <th scope='col'>正確解答</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class='number bg-info' scope='row'>1</th>
                                <td><a href='#'>{$title[$i][0]}</a></td>
                                <td id='usr1'>{$usr_ans[$i][0]}</td>
                                <td id='ans1'>{$myarray[$title[$i][0]]['right']}</td>
                            </tr>

                            <tr>
                                <th class='number bg-info' scope='row'>2</th>
                                <td><a href='#'>{$title[$i][1]}</a></td>
                                <td id='usr2'>{$usr_ans[$i][1]}</td>
                                <td id='ans2'>{$myarray[$title[$i][1]]['right']}</td>
                            </tr>

                            <tr>
                                <th class='number bg-info' scope='row'>3</th>
                                <td><a href='#'>{$title[$i][2]}</a></td>
                                <td id='usr3'>{$usr_ans[$i][2]}</td>
                                <td id='ans3'>{$myarray[$title[$i][2]]['right']}</td>
                            </tr>

                            <tr>
                                <th class='number bg-info' scope='row'>4</th>
                                <td><a href='#'>{$title[$i][3]}</a></td>
                                <td id='usr4'>{$usr_ans[$i][3]}</td>
                                <td id='ans4'>{$myarray[$title[$i][3]]['right']}</td>
                            </tr>

                            <tr>
                                <th class='number bg-info' scope='row'>5</th>
                                <td><a href='#'>{$title[$i][4]}</a></td>
                                <td id='usr5'>{$usr_ans[$i][4]}</td>
                                <td id='ans5'>{$myarray[$title[$i][4]]['right']}</td>
                            </tr>

                            <tr>
                                <th class='number bg-info' scope='row'>6</th>
                                <td><a href='#'>{$title[$i][5]}</a></td>
                                <td id='usr6'>{$usr_ans[$i][5]}</td>
                                <td id='ans6'>{$myarray[$title[$i][5]]['right']}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div> ";
                
            }
        ?>

    </div>

<?php
else:
    // 若使用【非登入帳密】的方法來後台
    header('Location: http://localhost/KLine/php/login2/login.php');

endif;
?>


<!-- <script src="JS/highLight.js"></script>  -->
</body>
</html>