const diveLinker = new DiveLinker("dive1");

$(document).ready(
    function () {
        
        // alert('y'); // 0917 Full Screen 提示方法 - 法2

        var checkStart = setInterval(() => {
            if (diveLinker.getLoadingStatus()) {
                
                diveLinker.enableBlock(false);
                diveLinker.start();
                // clearInterval(checkStart);
            }
        }, 200);

        // 進入【選擇題頁面】
       var page = setInterval(() => {
        var an_page = diveLinker.getAttr("1a29214d54a64449adc2d9de1d68b58d");
        if (an_page == 1) {
            
            document.location.href = "http://coursesrv.nutn.edu.tw/S10655035/back_exam.php";

            clearInterval(page);
        }
       }, 300);


    }
);




// 判斷使用者是否點擊 【跳轉鈕_A部分】
// 同一個 dive 專案中，有多個跳轉鈕
var checkComplete = setInterval(() => {

    // DIVE 跳轉
    if (diveLinker.getLoadingStatus()) {

        var jump1 = diveLinker.getAttr("43594cd0c07b4087bf75317d57d0e183");
        var jump2 = diveLinker.getAttr("a663eff5ae684bc0aa0cfee088fe9072");

        if (jump1 == 1) {

            console.log('check_A');

            diveLinker.setProject(13568); // 換圖 DIVE (已是新版_1118)

            // clearInterval(checkComplete);

        }else if (jump2 == 1) {
            console.log('check_D');

            diveLinker.setProject(13172); // K棒型態 DIVE
        }
    }

    // 返回
    if (diveLinker.checkComplete()) {

        console.log('return');

        diveLinker.setProject(13173); // 教學 DIVE

        // clearInterval(back);

        diveLinker.setInput("43594cd0c07b4087bf75317d57d0e183" , 0);
        diveLinker.setInput("a663eff5ae684bc0aa0cfee088fe9072" , 0);

        console.log('return_end');
    }

}, 300);




// 0: {id: "43594cd0c07b4087bf75317d57d0e183", name: "another1", value: "0"}
// 1: {id: "a663eff5ae684bc0aa0cfee088fe9072", name: "another2", value: "0"}
// 2: {id: "1a29214d54a64449adc2d9de1d68b58d", name: "選擇題", value: "0"}
// 3: {id: "0573a49b04824e7a95851d2435541c98", name: "go_grade" }