function selectedContractor(data) {
    $("#contractorId").html($("#contractorId" + data).html());
    $("#contractorName").html($("#contractorName" + data).html());
    $("#contractorAddress1").html($("#contractorAddress1" + data).html());
    $("#contractorPhn").html($("#contractorPhn" + data).html());
    $("#contractorMail").html($("#contractorMail" + data).html());
}

function selectedProduct(data) {
    // Grab Data From Modal
    let productId = $("#productId" + data).html();
    let productName = $("#productName" + data).html();
    let productNote = $("#productNote" + data).html();
    let productPeriodStartDate = $("#productPeriodStartDate" + data).html();
    let productPeriodEndDate = $("#productPeriodEndDate" + data).html();

    //Push Data To the product contract table
    var markup = "<tr><td>" + productId + "</td><td>" + productName + "</td><td>" + productNote + "</td><td>" + productPeriodStartDate + "</td><td>" + productPeriodEndDate + "</td><tr>";
    $(".productSelectTable tbody").append(markup);
}

function selectedShop(data) {
    $("#shopId").html($("#shopId" + data).html());
    $("#shopName").html($("#shopName" + data).html());
    $("#shopRepresentativeName").html($("#shopRepresentativeName" + data).html());
    $("#shopPrefecture").html($("#shopPrefecture" + data).html());
    $("#shopAddress").html($("#shopAddress" + data).html());
    $("#shopPhoneNumber").html($("#shopPhoneNumber" + data).html());
}

function disable() {
    document.getElementById("mySelect").disabled=true;
}
function enable() {
    document.getElementById("mySelect").disabled=false;
}

function shopAddressSearch() {
    let zipCode = $('#post_code').val();
    let setAddressId = "address1";
    var param = {zipcode: zipCode};
    var send_url = "http://zipcloud.ibsnet.co.jp/api/search";

    $.ajax({
        type: "GET",
        cache: false,
        data: param,
        url: send_url,
        dataType: "jsonp",
        success: function (res) {
            if (res.status == 200) {
                if (res.results) {
                    $("#" + setAddressId).val(res.results[0].address1 + res.results[0].address2);
                } else {
                    alert("Invalid Zip Code");
                }
            } else {
                alert(res.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
        }
    });
}
