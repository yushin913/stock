<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>股價線圖 -- 新手上路 【測驗】</title>

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <style>
        #tmp{
            display: none;
        }
    </style>

</head>
<body>

<?php
    // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']== TRUE):
?>

    <!-- 目標：
        1) 當使用者無紀錄時，由題庫中【隨機(亂數)】選出 6 題
        2) 若使用者有紀錄，則由其 錯誤&沒答過 的題目中【隨機(亂數)】取出 6 題
        3) 使用者答題狀況：[答對：1 , 答錯：2 , 沒回答過：0] -->

    <form action="http://localhost/KLine/php/ansInp.php" method="POST">

        <fieldset>

            <!-- 可用<ol>標籤嗎? -->
            <ol>
                <li>
                    <div class="subject">
                        <label for="" class="sub">題目1</label> <br>
                        <input type="radio" name="num1" id="" value="A" checked><label for="num1" class="reply1">A</label>
                        <input type="radio" name="num1" id="" value="B"><label for="num1" class="reply2">B</label>
                        <input type="radio" name="num1" id="" value="C"><label for="num1" class="reply3">C</label>
                    </div>
                </li>

                <li>
                    <div class="subject">
                        <label for="" class="sub">題目2</label> <br>
                        <input type="radio" name="num2" id="" value="A" checked><label for="num2" class="reply1">A</label>
                        <input type="radio" name="num2" id="" value="B"><label for="num2" class="reply2">B</label>
                        <input type="radio" name="num2" id="" value="C"><label for="num2" class="reply3">C</label>
                    </div>
                </li>

                <li>
                    <div class="subject" class="sub">
                        <label for="" class="sub">題目3</label> <br>
                        <input type="radio" name="num3" id="" value="A" checked><label for="num3" class="reply1">A</label>
                        <input type="radio" name="num3" id="" value="B"><label for="num3" class="reply2">B</label>
                        <input type="radio" name="num3" id="" value="C"><label for="num3" class="reply3">C</label>
                    </div>
                </li>

                <li>
                    <div class="subject">
                        <label for="" class="sub">題目4</label> <br>
                        <input type="radio" name="num4" id="" value="A" checked><label for="num4" class="reply1">A</label>
                        <input type="radio" name="num4" id="" value="B"><label for="num4" class="reply2">B</label>
                        <input type="radio" name="num4" id="" value="C"><label for="num4" class="reply3">C</label>
                    </div>
                </li>

                <li>
                    <div class="subject">
                        <label for="" class="sub">題目5</label> <br>
                        <input type="radio" name="num5" id="" value="A" checked><label for="num5" class="reply1">A</label>
                        <input type="radio" name="num5" id="" value="B"><label for="num5" class="reply2">B</label>
                        <input type="radio" name="num5" id="" value="C"><label for="num5" class="reply3">C</label>
                    </div>
                </li>

                <li>
                    <div class="subject">
                        <label for="" class="sub">題目6</label> <br>
                        <input type="radio" name="num6" id="" value="A" checked><label for="num6" class="reply1">A</label>
                        <input type="radio" name="num6" id="" value="B"><label for="num6" class="reply2">B</label>
                        <input type="radio" name="num6" id="" value="C"><label for="num6" class="reply3">C</label>
                    </div>
                </li>

            </ol>

            <!-- 要用 css 隱藏 -->
            <input type="text" name="choosed" id="tmp"> 
            
        </fieldset>

        <input class='submit' type="submit" value="Submit" >
        <!-- <input type="reset" value="Reset" onclick="alert('請重新填寫!')"> -->

    </form>

    <p><a href='http://localhost/KLine/php/login2/logout.php'>登出點我</a></p>

    <script src="JS/JSON.js"></script>
    
<?php
    else:
        // 若使用【非登入帳密】的方法來後台
        header('Location: http://localhost/KLine/php/login2/login.php');

    endif;
?>

</body>
</html>