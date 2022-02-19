/*let oldBarcode = $("#oldBarcode");
let newBarcode = $("#newBarcode");
let quanttity = $("#quantity");

$(document).ready(function () {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    oldBarcode.on('click', function (ev) {
        oldBarcode.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (oldBarcode.val() != '') {
                    newBarcode.focus();
                    newBarcode.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (newBarcode.val() != '') {
                                quanttity.focus();
                                quanttity.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        if(quanttity.val() != '')
                                            $("#insertButton").click();
                                    }
                                });
                            }
                        }
                    });
                }
            }
        });
    });

    newBarcode.on('click', function (ev) {
        newBarcode.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (newBarcode.val() != '') {
                    quanttity.focus();
                    quanttity.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (oldBarcode.val() != '') {
                                quanttity.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        $("#insertButton").click();
                                    }
                                });

                            }
                            else {
                                oldBarcode.focus();
                                oldBarcode.on("keyup", function (ev) {
                                    if (ev.key === 'Enter') {
                                        if (oldBarcode.val() != '') {
                                            $("#insertButton").click();
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
});*/

