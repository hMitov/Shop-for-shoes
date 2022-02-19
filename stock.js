let barcodeInput = $("#barcode");
let table = $("#table");
let count = 0;

barcodeInput.on('click', function () {
    window.scrollTo({top: 200, behavior: 'smooth'});

});

barcodeInput.on("keyup", function (event) {
    if(event.key === "Enter") {
        console.log("Enter is pressed!");
        let jsonObject = {
            'barcode': barcodeInput.val()
        };
        $.ajax({
            type: "POST",
            url: "../includes/dbShowItem.php",
            dataType: "json",
            data: {
                barcodeInfo: jsonObject
            },
            success: function (data) {
                table.append("<tr class=\"item\"><td>" + ++count + "</td><td>" + data['BrandName'] + "</td><td>" + data['Model'] + "</td><td>" + data['Barcode'] + "</td><td>" + data['Size'] +
                    "</td><td>" + data['Material'] + "</td><td>" + data['Quantity'] + "</td><td>" + data['Color'] + " </td><td>" + data['Price'] + "</td><td>" + data['Sex'] + "</td></tr>");
                barcodeInput.val('');
            }
        });
    }
});

