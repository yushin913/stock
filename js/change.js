const diveLinker = new DiveLinker("dive1");

$(document).ready(
    function () {
        
        // alert('y'); // 0917 FS提示方法 - 法2

        var checkStart = setInterval(() => {
            if (diveLinker.getLoadingStatus()) {
                
                diveLinker.enableBlock(false);

                diveLinker.start();
                // clearInterval(checkStart);
            }
        }, 200);
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

            diveLinker.setProject(13090);

            // clearInterval(checkComplete);

        }else if (jump2 == 1) {
            console.log('check_D');

            diveLinker.setProject(13172);
        }
    }

    // 返回
    if (diveLinker.checkComplete()) {

        console.log('return');

        diveLinker.setProject(13173);

        // clearInterval(back);

        diveLinker.setInput("43594cd0c07b4087bf75317d57d0e183" , 0);
        diveLinker.setInput("a663eff5ae684bc0aa0cfee088fe9072" , 0);

        console.log('return_end');
    }

}, 300);


/**
    錯誤：0916  [ 0917：目前拿掉 clearInterval 是可以解決以下兩個問題的 ]

    1.返回後，不能再次跳轉 (多個標籤，來回切換會有問題) => 跳轉部分的程式碼要修

    2.浮水印維持關閉
*/

// 0: {id: "43594cd0c07b4087bf75317d57d0e183", name: "another1", value: "0"}
// 1: {id: "a663eff5ae684bc0aa0cfee088fe9072", name: "another2", value: "0"}
