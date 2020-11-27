// 使用者點擊【題號】，會進行收合動作
var have = []; // 點擊過的題號

function insert(e , num) {
    
    console.log(e , num); // 輸入值
    

    $.getJSON("formal.json", function (json) {
        // console.log(JSON.stringify(json));  // 印出整個【JSON檔】的內容
        // console.log(json[num].pic);

        var father = document.getElementById(e);
        console.log(father);  // 檢測是否能抓到 tag

        if (json[num].pic != '') { // 判斷 formal.json檔中，【pic】是否具有圖片，若【有】圖，則計算 id【被點擊的次數】
            
            have.push(e);  // 每次點擊有圖的題目時，都會將 id 放入陣列中
            console.log(have);
            
            var count = 0;

            for (let i = 0; i < have.length; i++) {  // 計算 id【該欄位題號】被點擊的次數
                console.log(have[i]);
                
                if (have[i] == e) {
                    count ++;
                } 
            }

            if (count %2 == 1) {  // 若【該欄位題號】被點擊的次數為【奇數】，則針對【該欄位題號】插入對應的圖

                console.log(count , "insert");

                var img = document.createElement('img');
                img.className = "picture";  // 建立 class
                img.id = "img" + e; // 建立 id
                img.src = json[num].pic;
                father.appendChild(img);


            }else if (count %2 == 0) {  // 若【該欄位題號】被點擊的次數為【偶數】，則針對【該欄位題號】移除被插入的圖

                console.log(count , "remove");

                var remove_img = document.getElementById('img' + e);
                father.removeChild(remove_img);
            }

        }
        
    })

    // 展開收合
    $(".panel" + e).slideToggle("slow");
    $(".xs1").toggle();  // 查
    $(".xs2").toggle();  // 查
}


/**
 * 收合問題： (1110)
 * 1) 目前已可以點擊單個選項進行收合【只針對第一欄進行測試】 --> OK
 * 
 * 2) 在 grade.php 部分，由於 img 標籤 是直接寫入，所以當題目無圖片，會出現問題
 * 
 * 3) function insert(編碼)，編碼會重複 => 目前編碼已修正 [形式: 第幾次測驗/第幾列/題庫題號，EX>> 1121 (第1次測驗/第1列/題庫21題)] --> OK (應該是不會重複了)
 * 
 */