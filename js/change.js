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




// 判斷使用者是否點擊 【跳轉鈕】
// 同一個 dive 專案中，有多個跳轉鈕
var checkComplete = setInterval(() => {

    if (diveLinker.getLoadingStatus()) {

        var jump1 = diveLinker.getAttr("097d3bb5f6e94204acc257ea1d0b7e72");

        if (jump1 == 1) {

            console.log('check');

            diveLinker.setProject(13068);

            // clearInterval(checkComplete);
        }
    }
    
}, 300);



// 返回 教學 dive
var back = setInterval(() => {

    if (diveLinker.checkComplete()) {

        console.log('check1');

        diveLinker.setProject(13101);

        // clearInterval(back);

        diveLinker.setInput("097d3bb5f6e94204acc257ea1d0b7e72" , 0);

        console.log('u');
    }
    
}, 300);


/**
    錯誤：0916  [ 0917：目前拿掉 clearInterval 是可以解決以下兩個問題的 ]

    1.返回後，不能再次跳轉 (多個標籤，來回切換會有問題) => 跳轉部分的程式碼要修

    2.浮水印維持關閉
*/


