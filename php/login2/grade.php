<!-- 歷程記錄 -- 正式版 -->
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
    $now = []; // 存放【當前】登入者的所有資料比數

    $title = []; // 放入該位使用者的作答紀錄(題號)
    $usr_ans = [];  // 放入 user【每次測驗】的回答  // $usr_ans 是【使用者】每次測驗的答案
    $timer = [];

    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){ // 將資料表中每一列的所有值以 Array 的格式印出

        if ($row['who'] == $_SESSION['usr_now']) {
            # 由DB中，只取出【目前】登入者的資料
            array_push($now , $row);
        }
    }

    // 對【當前】使用者的資料做處理
    for ($m  =0; $m < sizeof($now) ; $m++) {
        // 取出 使用者 回答的 【題號(題目)】
        $jit = explode("," , $now[$m]['choosed']); // 把選中題目(的題號)的字串，轉乘 array
        array_push($title , $jit);

        // 取出 使用者 的【回答(答案)】
        $tmp = []; // 暫時存放 user【一次測驗】中的回答
        for ($a = 1; $a < 7; $a++) { // 取出每次測驗中的答案，以測驗次數為一個單位
            array_push($tmp , $now[$m]["num{$a}"]);
            // print_r($tmp);
            // echo "<br>";
        }
        array_push($usr_ans , $tmp);

        // 取出使用者【開始作答的時間點】
        array_push($timer , $now[$m]['settime']);
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
    for ($a = 0; $a < sizeof($title) ; $a++) { // i 為測驗的次數

        for ($b = 0; $b < sizeof($title[$a]) ; $b++) { 
            // echo "<br>";
            // print_r($title[$i][$j]);  // 印出【選擇的題號】
            // echo " => ";


            // user【答案】 與 題庫【JSON檔】 作比對
            // 10_06_答案比對(OK)
            if ($usr_ans[$a][$b] == $myarray[$title[$a][$b]]['right'] ) {
                # code... 正解 >> $myarray[$title[$a][$b]]["right"]  / 使用者答案 >> $usr_ans[$a][$j]
                // echo "correct";
            }else{
                // echo "incorrect! {$usr_ans[$a][$b]} != {$myarray[$title[$a][$b]]['right']} ";
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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

    <?php
        // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
        if(sizeof($title) != 0 ):
    ?>


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
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}1{$title[$i][0]});'>
                                                <span class='1'>{$title[$i][0]}</span>
                                            </div>
                                            <div id='panel{$count}1{$title[$i][0]}' class='block'>
                                                <p>{$myarray[$title[$i][0]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][0]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}1'>{$usr_ans[$i][0]}</td>
                                        <td id='ans{$count}1'>{$myarray[$title[$i][0]]['right']}</td>
                                    </tr>

                                    <tr>
                                        <th class='number bg-info' scope='row'>2</th>
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}2{$title[$i][1]});'>
                                                <span class='1'>{$title[$i][1]}</span>
                                            </div>
                                            <div id='panel{$count}2{$title[$i][1]}' class='block'>
                                                <p>{$myarray[$title[$i][1]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][1]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}2'>{$usr_ans[$i][1]}</td>
                                        <td id='ans{$count}2'>{$myarray[$title[$i][1]]['right']}</td>
                                    </tr>

                                    <tr>
                                        <th class='number bg-info' scope='row'>3</th>
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}3{$title[$i][2]});'>
                                                <span class='1'>{$title[$i][2]}</span>
                                            </div>
                                            <div id='panel{$count}3{$title[$i][2]}' class='block'>
                                                <p>{$myarray[$title[$i][2]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][2]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}3'>{$usr_ans[$i][2]}</td>
                                        <td id='ans{$count}3'>{$myarray[$title[$i][2]]['right']}</td>
                                    </tr>

                                    <tr>
                                        <th class='number bg-info' scope='row'>4</th>
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}4{$title[$i][3]});'>
                                                <span class='1'>{$title[$i][3]}</span>
                                            </div>
                                            <div id='panel{$count}4{$title[$i][3]}' class='block'>
                                                <p>{$myarray[$title[$i][3]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][3]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}4'>{$usr_ans[$i][3]}</td>
                                        <td id='ans{$count}4'>{$myarray[$title[$i][3]]['right']}</td>
                                    </tr>

                                    <tr>
                                        <th class='number bg-info' scope='row'>5</th>
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}5{$title[$i][4]});'>
                                                <span class='1'>{$title[$i][4]}</span>
                                            </div>
                                            <div id='panel{$count}5{$title[$i][4]}' class='block'>
                                                <p>{$myarray[$title[$i][4]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][4]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}5'>{$usr_ans[$i][4]}</td>
                                        <td id='ans{$count}5'>{$myarray[$title[$i][4]]['right']}</td>
                                    </tr>

                                    <tr>
                                        <th class='number bg-info' scope='row'>6</th>
                                        <td class='show'>
                                            <div class='flip' onclick='insert({$count}6{$title[$i][5]});'>
                                                <span class='1'>{$title[$i][5]}</span>
                                            </div>
                                            <div id='panel{$count}6{$title[$i][5]}' class='block'>
                                                <p>{$myarray[$title[$i][5]]['test']}</p>
                                                <img class='picture' src='{$myarray[$title[$i][5]]['pic']}'>
                                            </div>
                                        </td>
                                        <td id='usr{$count}6'>{$usr_ans[$i][5]}</td>
                                        <td id='ans{$count}6'>{$myarray[$title[$i][5]]['right']}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> ";
                    
                }
            ?>

        </div>

        <script src="JS/show.js"></script>

    <?php
        else:
           // 
            echo "<div class='center'>
                    <div class='svgPic'>
                        <svg id='icon-page' viewBox='0 0 178 211' xmlns='http://www.w3.org/2000/svg' clip-rule='evenodd' stroke-linejoin='round' stroke-miterlimit='1.5'>
                            <path class='page-outline' fill='none' stroke='#000' stroke-width='15' d='M5.208 5.208h166.667v200H5.208z' />
                            <path class='page-line blink' d='M138.542 65.778a4.167 4.167 0 0 0-4.167-4.166H42.708a4.166 4.166 0 0 0-4.166 4.166v8.334a4.166 4.166 0 0 0 4.166 4.166h91.667a4.167 4.167 0 0 0 4.167-4.166v-8.334zM138.542 136.305a4.167 4.167 0 0 0-4.167-4.167H42.708a4.167 4.167 0 0 0-4.166 4.167v8.334a4.166 4.166 0 0 0 4.166 4.166h91.667a4.167 4.167 0 0 0 4.167-4.166v-8.334z'
                                        fill='#ff4776' />
                        </svg>
                    </div>
                    <p id='noLog'>尚無學習紀錄</p>
                 </div>";

        endif;
    ?>

<?php
else:
    // 若使用【非登入帳密】的方法來後台
    header('Location: http://localhost/KLine/php/login2/login.php');

endif;
?>


<script src="JS/highLight.js"></script>
</body>
</html>