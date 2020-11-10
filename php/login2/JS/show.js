// 使用者點擊【題號】，會進行收合動作
function insert(e) {
    console.log(e);
    $("#panel" + e).slideToggle("slow");
    $(".xs1").toggle();  // 查
    $(".xs2").toggle();  // 查
}

/**
 * 收合問題： (1110)
 * 1) 目前已可以點擊單個選項進行收合【只針對第一欄進行測試】
 * 2) 在 grade.php 部分，由於 img 標籤 是直接寫入，所以當題目無圖片，會出現問題
 * 
 */