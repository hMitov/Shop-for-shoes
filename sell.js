let barcodeInput = $("#barcode");
let quantityInput = $("#quantity");
let sellButton = $("#insertButton");
let payBackContainer = $(".pay-back-container");
let payButton = $("#payment-button");
let backButton = $("#back-button");
let wayToPay = $(".cash-card-choice-container");
let table = $("#table");
let count = 0;
let finalPrice = 0.;
let pricePayMethod = $(".finalPriceAndPayMethod");
let btn = document.createElement("button");



function inputEvents() {
    barcodeInput.on('click', function () {
        window.scrollTo({top: 200, behavior: 'smooth'});
        console.log("Scrolled");
        barcodeInput.on("keyup", function (event) {
            if (event.key === 'Enter') {
                console.log("Barcode entered");
                console.log(barcodeInput.val());
                if (barcodeInput.val() != "") {
                    quantityInput.val('1');
                    quantityInput.focus();
                    console.log(quantityInput.val());
                }
            }
        });
    });

    barcodeInput.on('keydown', function (event) {
        $(".attention").hide();
    })

    let jsonObject = '';

    quantityInput.on("keyup", function (e) {
        if (e.key === 'Enter') {
            console.log("In it");
            if (barcodeInput.val() != "") {
                jsonObject = {
                    'barcode': barcodeInput.val(),
                    'quantity': quantityInput.val()
                }
                ajaxCall();
            }
        }
    });

    function ajaxCall() {
        console.log('Entered ajax');
        console.log(jsonObject);
        $.ajax({
            type: "POST",
            url: "../includes/dbMakeSellList.php",
            dataType: "json",
            data: {
                sellDetails: jsonObject
            },
            success: function (data) {
                barcodeInput.val('');
                quantityInput.val('1');
                barcodeInput.focus();

                console.log(data.info);
                if (data.info === 'valid') {
                    table.append("<tr class=\"item\"><td>" +  ++count + "</td><td>" + data['BrandName'] + "</td><td>" + data['Model'] + "</td><td>" + data['Barcode'] + "</td><td>" + data['Size'] +
                        "</td><td>" + data['Material'] + "</td><td>" + data['Quantity'] + "</td><td>" + data['Color'] + "</td>><td>" + data['Price'] + "</td>><td>" + data['Sex'] + "</td></tr>");
                    payBackContainer.show();
                    finalPrice += parseFloat(data['finalPrice']);
                }
                if (data.info === 'invalid') {
                    $(".attention").show();
                }
            }
        });
    }
}

$(document).ready(function () {
    inputEvents();
});


let payMethod = '';

payButton.on("click", function (e) {
    backButton.show();
    wayToPay.css('display', 'flex');
    barcodeInput.prop('disabled', true);
    quantityInput.prop('disabled', true);
});

$(".cash-card").on('change', function () {
    $(".insertButton-wrapper").css('display', 'flex');
});

backButton.on("click", function (e) {
    barcodeInput.prop('disabled', false);
    quantityInput.prop('disabled', false);
    $("#cash").prop('checked', false);
    $("#card").prop('checked', false);
    barcodeInput.focus();
    payMethod = '';
    $(".cash-card-choice-container").hide();
    $("#back-button").hide();
    $(".insertButton-wrapper").hide();
});

sellButton.on("click", function (event) {
    if($('#cash').is(':checked'))
        payMethod = 'cash';
    if($('#card').is(':checked'))
        payMethod = 'card';
    if(payMethod.value != '') {
        console.log('sell button works');
        console.log(payMethod);
        let jsonObject = {
            'pay' : payMethod,
        };
        $.ajax({
            type: "POST",
            url: "../includes/dbMakeSellList.php",
            dataType: "json",
            data : {
                paymentMethod : jsonObject
            },
        });
        pricePayMethod.css('display', 'flex');
        if(payMethod === "cash") {
            pricePayMethod.html('<h3>' + 'В брой' + '</h3>');
        }
        if(payMethod === 'card') {
            pricePayMethod.html('<h3>' + 'С карта' + '</h3>');
        }
        pricePayMethod.html('<h3>' + 'Общо: ' + finalPrice + ' лв' + '</h3>');

    }
});

pricePayMethod.on('click', function () {
    let tableRows = $('#table tr').length;
    $("tr.item").each(function() {
        let item = $(this);
        if(item.index() !=0) {
            item.remove();
        }
    });
    barcodeInput.prop('disabled', false);
    quantityInput.prop('disabled', false);
    $("#cash").prop('checked', false);
    $("#card").prop('checked', false);
    barcodeInput.focus();
    $(".cash-card-choice-container").hide();
    $("#back-button").hide();
    $(".insertButton-wrapper").hide();
    pricePayMethod.remove('h3');
    pricePayMethod.hide();
    finalPrice = 0;
});







