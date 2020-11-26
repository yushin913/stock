const dive = new DiveLinker("dive");

// 讓 iframe 布滿整個螢幕
var reset = setInterval(() => {

    var KLine = document.getElementById('KLine');
    KLine.style.width = document.body.clientWidth.toString() + "px";
    
  }, 300);


// DIVE 控制部分
$(document).ready(
    function () {
        var checkStart = setInterval(() => {

            if (dive.getLoadingStatus()) {
                
                dive.enableBlock(false);
                dive.start();

                var loca = setInterval(() => {
                    var LD = dive.getAttr("db8f71dc0c744426b40b72ae5ca35c45");
                    var grade = dive.getAttr("bf7352f1cf4e48fe96147ffc705bf604");

                    if (LD == 1) {
                        // console.log("FS");
                        document.location.href = "http://coursesrv.nutn.edu.tw/S10655035/Leading.php";

                    }else if (grade == 1) {
                        // console.log("gr");
                        document.location.href = "http://coursesrv.nutn.edu.tw/S10655035/grade.php";
                    }
                    
                }, 200);

                clearInterval(checkStart);
            }
        }, 200);

        var out = setInterval(() => {

            if (dive.checkComplete()) {

                document.location.href = "http://coursesrv.nutn.edu.tw/S10655035/logout.php";

                clearInterval(out);
            }
            
        }, 300);

        
    }
);

// 登入後，有兩個選項頁面【教學與測驗 / 學習歷程】
// 0: {id: "db8f71dc0c744426b40b72ae5ca35c45", name: "go_FS", value: "0"}
// 1: {id: "bf7352f1cf4e48fe96147ffc705bf604", name: "go_grade", value: "0"}