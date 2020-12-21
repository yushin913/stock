<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="yuShinLin913">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/exam.css">
    <link rel="icon" href="imgs/favicon.ico" type="image/icon type">
    <title>新手學股票 --【測驗】</title>

</head>
<body>

<?php
    // 使用 isset() 方法，判別有沒有 is_login 變數可使用，以及為【已登入】
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']== TRUE):
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style = "box-shadow: 0 30px 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);" >
        <a class="navbar-brand mb-0 h1" href="#" style="font-size: 25px;"><?php echo '使用者：' . $_SESSION['usr_now']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 36px; font-weight: 700;">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="http://coursesrv.nutn.edu.tw/S10655035/getIn.php">首頁</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://coursesrv.nutn.edu.tw/S10655035/FScreen.php">教學</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://coursesrv.nutn.edu.tw/S10655035/back_exam.php">測驗</a>
            <li class="nav-item">
                <a class="nav-link" href="http://coursesrv.nutn.edu.tw/S10655035/grade.php">紀錄</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://coursesrv.nutn.edu.tw/S10655035/logout.php" >登出</a>
            </li>
          </ul>
        </div>
    </nav>


    <!-- 目標：
        1) 當使用者無紀錄時，由題庫中【隨機(亂數)】選出 6 題
        2) 若使用者有紀錄，則由其 錯誤&沒答過 的題目中【隨機(亂數)】取出 6 題
        3) 使用者答題狀況：[答對：1 , 答錯：2 , 沒回答過：0] -->


    <div class="container">
        <form action="http://coursesrv.nutn.edu.tw/S10655035/ansInp.php" method="POST">
            
            <div class="item">
                <label for="" class="sub">題目1：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num1" id="" value="A" checked><label for="num1" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num1" id="" value="B"><label for="num1" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num1" id="" value="C"><label for="num1" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" id="g" src="" alt="">
                    </div>
                </div>
            </div>
            
        
            <div class="item">
                <label for="" class="sub">題目2：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num2" id="" value="A" checked><label for="num2" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num2" id="" value="B"><label for="num2" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num2" id="" value="C"><label for="num2" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" src="" alt="">
                    </div>
                </div>
                
            </div>
            
        
            <div class="item">
                <label for="" class="sub">題目3：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num3" id="" value="A" checked><label for="num3" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num3" id="" value="B"><label for="num3" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num3" id="" value="C"><label for="num3" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" src="" alt="">
                    </div>
                </div>
            </div>
            
        
            <div class="item">
                <label for="" class="sub">題目4：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num4" id="" value="A" checked><label for="num4" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num4" id="" value="B"><label for="num4" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num4" id="" value="C"><label for="num4" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" src="" alt="">
                    </div>
                </div>
            </div>
            
        
            <div class="item">
                <label for="" class="sub">題目5：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num5" id="" value="A" checked><label for="num5" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num5" id="" value="B"><label for="num5" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num5" id="" value="C"><label for="num5" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" src="" alt="">
                    </div>
                </div>
            </div>
            
        
            <div class="item">
                <label for="" class="sub">題目6：<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas et sunt laborum doloremque ipsam cum assumenda? Aspernatur necessitatibus unde quo cupiditate beatae accusamus amet atque.</label>
                <div class="item-block">
                    <div class="son txt">
                        <input type="radio" name="num6" id="" value="A" checked><label for="num6" class="reply1"> (A)lorem</label>
                        <input type="radio" name="num6" id="" value="B"><label for="num6" class="reply2"> (B)lorem</label>
                        <input type="radio" name="num6" id="" value="C"><label for="num6" class="reply3"> (C)lorem</label>
                    </div>
                    <div class="son pic">
                        <img class="image" src="" alt="">
                    </div>
                </div>
            </div>
    
            <input type="text" name="choosed" id="tmp" hidden>  
            <input class='submit btn btn-info btn-lg btn-block' type="submit" value="提交">

        </form>

    </div>


    <script src="JS/JSON.js"></script>
    
<?php
    else:
        // 若使用【非登入帳密】的方法來後台
        header('Location: http://coursesrv.nutn.edu.tw/S10655035/index.php');

    endif;
?>

</body>
</html>