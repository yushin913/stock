// Error：只有第一筆資料會變色_1009
$(document).ready(

    function highLight() {

        for (let k = 0; k < 6; k++) {

            if ($('#usr' + k).text() != $('#ans' + k).text()) {
                $('#usr' + k).css("color", "red");
            }
        }
    }

);