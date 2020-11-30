// Error：只有第一筆資料會變色_1009【1110_已解決】
// 是 id 重複的問題? yes__ 1015

// y 值得上限有 error【20201129】_已處理
    
$(document).ready(

    function highLight() {
        // id 編碼：您的回答【usr 第幾次測驗/第幾列，EX> 21 (第2次測驗/第2列) 】  正確解答【ans 第幾次測驗/第幾列】

        for (let y = 1; y < 30; y++) {
            for (let s = 1; s < 7; s++) {
                if ($('#usr' + y + s).text() != $('#ans' + y + s).text()) {
                    $('#usr' + y +s ).css("color", "red");
                }
            }
        }
});



