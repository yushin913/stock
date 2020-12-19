const diveLinker = new DiveLinker("dive1");

$(document).ready(
    function () {

        // 去除浮水印，直接開始專案
        var checkStart = setInterval(() => {
            if (diveLinker.getLoadingStatus()) {
                
                diveLinker.enableBlock(false);
                diveLinker.start();
                // clearInterval(checkStart);
            }
        }, 300);


        // 進入【選擇題頁面】
       var page = setInterval(() => {
        var an_page = diveLinker.getAttr("1a29214d54a64449adc2d9de1d68b58d");
        if (an_page == 1) {
            
            document.location.href = "http://coursesrv.nutn.edu.tw/S10655035/back_exam.php";

            clearInterval(page);
        }
       }, 300);


       // 判斷使用者是否點擊 【跳轉鈕_A部分】
       var checkComplete = setInterval(() => {

            // DIVE 跳轉
            if (diveLinker.getLoadingStatus()) {

                var A = diveLinker.getAttr("c14fb301619e43b2853d9f3b6ad1ce83");
                var D = diveLinker.getAttr("0acfcb03ee2040c8967fbf4b43f12190");

                if (A == 1) {

                    console.log('check_A');

                    diveLinker.setProject(13568); // 換圖 DIVE (已是新版_1118)

                    // clearInterval(checkComplete);

                }else if (D == 1) {
                    console.log('check_D');

                    diveLinker.setProject(13751); // K棒型態 DIVE

                    // clearInterval(checkComplete);
                }
            }

        }, 300);

        // 返回
        var back = setInterval(() => {

            if (diveLinker.checkComplete()) {

                console.log('return');

                diveLinker.setProject(13765); // 教學 DIVE

                // clearInterval(back);

                diveLinker.setInput("c14fb301619e43b2853d9f3b6ad1ce83" , 0);
                diveLinker.setInput("0acfcb03ee2040c8967fbf4b43f12190" , 0);

                console.log('return_end');
            }

        }, 300);


    });




// 0: {id: "1a29214d54a64449adc2d9de1d68b58d", name: "選擇題", value: "0"}
// 1: {id: "c14fb301619e43b2853d9f3b6ad1ce83", name: "A", value: "0"}
// 2: {id: "0acfcb03ee2040c8967fbf4b43f12190", name: "D", value: "0"}