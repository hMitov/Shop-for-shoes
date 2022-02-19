let element = $(".agent-info");
let wrapper = $(".newEmployee-wrapper");
let fName = $("#firstName");
let lName = $("#lastName");
let agent = $("#agent");

$(document).ready(function () {
    agent.on('focusin', function (event) {
        element.show();
    });

    agent.on('focusout', function (event) {
        element.hide();
    });

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    fName.on('click', function (ev) {
        fName.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (fName.val() != '') {
                    lName.focus();
                    lName.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (lName.val() != '') {
                                agent.focus();
                                agent.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        if(agent.val() != '')
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

    lName.on('click', function (ev) {
        lName.on("keyup", function (ev) {
            if (ev.key === 'Enter') {
                if (lName.val() != '') {
                    agent.focus();
                    agent.on("keyup", function (ev) {
                        if (ev.key === 'Enter') {
                            if (fName.val() != '') {
                                agent.keyup(function (event) {
                                    if (event.key === 'Enter') {
                                        $("#insertButton").click();
                                    }
                                });

                            }
                            else {
                                fName.focus();
                                fName.on("keyup", function (ev) {
                                    if (ev.key === 'Enter') {
                                        if (fName.val() != '') {
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

});