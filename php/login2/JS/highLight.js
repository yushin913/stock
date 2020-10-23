// Error：只有第一筆資料會變色_1009
// 是 id 重複的問題? __ 1015

function HL(e){
    $('.grade' + e).ready(
        function highLight() {
    
            for (let k = 0; k < 6; k++) {
        
                if ($('#usr' + k).text() != $('#ans' + k).text()) {
                    $('#usr' + k).css("color", "red");
                }
            }
        }
    );
}


