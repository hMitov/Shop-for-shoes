let barcodeInput = $("#barcode");
let quantityInput = $("#quantity");
let priceInput = $("#price");
let insertButton = $("#system-insert-button");


$(document).ready(function () {

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    barcodeInput.on('click', function (ev) {
        barcodeInput.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (barcodeInput.val() != '') {
                    quantityInput.focus();
                    quantityInput.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (quantityInput.val() != '') {
                                priceInput.focus();
                                priceInput.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        if(priceInput.val() != '')
                                            $("#system-insert-button").click();
                                    }
                                });
                            }
                        }
                    });
                }
            }
        });
    });

    quantityInput.on('click', function (ev) {
        quantityInput.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (quantityInput.val() != '') {
                    priceInput.focus();
                    priceInput.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (barcodeInput.val() != '') {
                                priceInput.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        $("#system-insert-button").click();
                                    }
                                });

                            }
                            else {
                                barcodeInput.focus();
                                barcodeInput.on("keyup", function (ev) {
                                    if (ev.key === 'Enter') {
                                        if (barcodeInput.val() != '') {
                                            $("#system-insert-button").click();
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
            }
        });
    });

});