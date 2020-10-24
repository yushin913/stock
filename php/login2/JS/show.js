// 使用者點擊，秀出題目

function show(e) {
    // 題號
    console.log(e);

    // 讀取JSON
    $.getJSON("formal.json", function (tit){

        // console.log("success"); // 測試是否有讀取到
        console.log(tit[e].test);
    });
    
}
