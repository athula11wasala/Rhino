

var jsonObj = {"data": [
        {"day": 1,
            "amount": 50,
            "paid_by": "tanu",
            "friends": ["kasun", "tanu"]
        },
        {"day": 2,
            "amount": 100,
            "paid_by": "kasun",
            "friends": ["kasun", "tanu", "liam"]
        },
        {"day": 3,
            "amount": 100,
            "paid_by": "liam",
            "friends": ["liam", "tanu", "liam"]
        }
    ]}
$(document).ready(function () { 

    $("#div_errors").hide();
    $("#div_success").hide();

    $("#txtjson").val(JSON.stringify(jsonObj));

    $("#submit").click(function () {

        var JsonTxt = JSON.parse($("#txtjson").val());
        validateFlag = false;
        //  if(ValidateJson(JsonTxt) == false){

        ajaxCall(JsonTxt['data']);

//                  }


    });

});



function ajaxCall(data) {


    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/add-order",
        data: {data},
        success: function (response) {

        },
        complete: function (data) {
            console.log(data);
            if (data.status == 422) {
                errorDisplay(data);
            }
            if (data.status == 200) {
                $("#div_errors").hide();
                $("#div_success").html(data.responseText);
                $("#div_success").show();

            }


        }
    });

}


function errorDisplay(data) {

    $("#div_errors").html('');
    $("#div_success").hide();

    var errors = $.parseJSON(data.responseText);
    $("#div_errors").show();
    for (var k in errors) {
        $("#div_errors").append(errors[k] + "<br>");

    }

}




function ValidateJson(JsonTxt) {

    var validateFlag = false;
    if (!Array.isArray(JsonTxt['data'])) {

        alert("Please Prvoide Data Object");
        return true;

    } else {

        $.each(JsonTxt['data'], function (key, val) {
            if (validateFlag) {

                return true;
            }
            if (!JsonTxt['data'][key].hasOwnProperty('day')) {
                alert("Please provide day element");
                validateFlag = true;

            }
            if (!JsonTxt['data'][key].hasOwnProperty('amount')) {
                alert("Please provide amount");
                validateFlag = true;

            }
            if (!JsonTxt['data'][key].hasOwnProperty('paid_by')) {
                alert("Please provide  paid_by");
                validateFlag = true;

            }
            if (!JsonTxt['data'][key].hasOwnProperty('friends')) {
                alert("Please provide  friends");
                validateFlag = true;

            }


        });
        return validateFlag;

    }


}








