var sub = document.getElementsByClassName('sub');
var reply1 = document.getElementsByClassName('reply1');
var reply2 = document.getElementsByClassName('reply2');
var reply3 = document.getElementsByClassName('reply3');
var image = document.getElementsByClassName('image');
var tmp = document.getElementById("tmp");

// 讀取 JSON檔
$.getJSON("formal.json", function (json) {

    console.log("success"); // 測試是否有讀取到

    console.log("選擇題題數：" + sub.length);

    // 當使用者【無紀錄】時，由題庫中【隨機且不重複】選出 6 題
    var arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]; // 題庫中的題數 (原有陣列放全部數字)
    var result = []; // 存放挑選出來的題目
    
    for (var i = 0; i < sub.length; i++) {
        var ran = Math.floor(Math.random() * arr.length);
        result.push(arr.splice(ran, 1)[0]); // 將舊陣列中，亂數選重的數字移除，並新增至新陣列 result
    }
    console.log("choosed：" + result);
    tmp.value = result;

    // 得出 JSON檔 的 Object陣列 後，依照 result陣列 的元素值，依序將對應的 JSON物件(題目) 放入 1~6 題
    var order = 0; // exam 的測驗題【順序】
    for (var j in json) {
        
        order ++; 
        sub[j].innerHTML = "題目" + order + "：<br>" + json[result[j]].test; // 題目的陣列

        reply1[j].innerText = json[result[j]].A; // 選項 A 的陣列
        reply2[j].innerText = json[result[j]].B; // 選項 B 的陣列
        reply3[j].innerText = json[result[j]].C; // 選項 C 的陣列

        image[j].src = json[result[j]].pic; // 選項若有圖片，則放置圖片；若無圖則，空著
        
    }
    
})