$(document).ready(function () {
    window.onload = function () {

        let item1 = $("#item1");
        let item2 = $("#item2");
        let item3 = $("#item3");
        let item4 = $("#item4");
        let item5 = $("#item5");
        let item6 = $("#item6");
        let item7 = $("#item7");

        let array = [item1, item2, item3, item4, item5, item6, item7];

        array.forEach((item)=>item.on("click", function () {
            switch (item) {
                case item1:
                    window.open("../sell/sell.php", "_self");
                    break;
                case item2:
                    window.open("../stock/stock.php", "_self");
                    break;
                case item3:
                    window.open("../newItem/newItem.php", "_self");
                    break;
                case item4:
                    window.open("../x-Report/x-report.php", 'targetWindow', `toolbar=no, location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=1000,
                                    height=1000,
                                    left=350`);
                    break;
                case item5:
                    alert("If you press the button, today sell will end and system will close!");
                    window.open("../z-Report/z-report.php", 'targetWindow', `toolbar=no, location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=1000,
                                    height=1000,
                                    left=350`);
                    break;
                case item6:
                    window.open("../change/change.php", "_self");
                    break;
                case item7:
                    window.open("../newEmployee/newEmployee.php", "_self");
                    break;
            }
        }));

        $.ajax({
            type : "post",
            url : "../includes/mainOptionsFilter.php",
            success : function (data) {
                let obj = JSON.parse(data);
                switch (obj['pos']) {
                    case "cashier":
                        item3.hide();
                        item7.hide();
                        break;
                    case "insider":
                        item1.hide();
                        item4.hide();
                        item5.hide();
                        item6.hide();
                        item7.hide();
                        break;
                }
            }
        });
    }
});

