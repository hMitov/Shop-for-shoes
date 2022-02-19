let table = $("#table");
let count = 0;

$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: "../includes/dbzReport.php",
        dataType: "json",
        success: function (data) {
            for(let i = 1; i <= (data[0] - 1) / 10; i++) {
                table.append("<tr class=\"item\"><td>" + ++count + "</td><td>" + data[((i - 1) * 10) + 1] + "</td><td>" + data[((i - 1) * 10) + 2] + "</td><td>" + data[((i - 1) * 10) + 3] + "</td><td>" + data[((i - 1) * 10) + 4] +
                    "</td><td>" + data[((i - 1) * 10) + 5] + "</td><td>" + data[((i - 1) * 10) + 6] + "</td><td>" + data[((i - 1) * 10) + 7] + " <td>" + data[((i - 1) * 10) + 8] + "</td><td>" + data[((i - 1) * 10) + 9] + "</td><td>" + data[((i - 1) * 10) + 10] + "</td></tr>");
            }
        }
    });
});
