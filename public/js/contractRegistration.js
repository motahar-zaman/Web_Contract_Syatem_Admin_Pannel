function shopSearchClear(){
    $("#searchShopId").val("");
    $("#searchShopName").val("");
}

function productSearchClear(){
    $("#searchProductId").val("");
    $("#searchProductName").val("");
}

function contractorSearchClear(){
    $("#searchContractorId").val("");
    $("#searchContractorName").val("");
}

function selectedContractor(data, td) {
    let contractorId = $("#contractorId" + data).html();
    let contractorName = $("#contractorName" + data).html();
    let contractorAddress1 = $("#contractorAddress1" + data).html();
    let contractorPhn = $("#contractorPhn" + data).html();
    let contractorMail = $("#contractorMail" + data).html();

    //Push Data To the product contract table
    var markup = "<tr><td id=\"contractorId\">" + contractorId + "</td><td id=\"contractorName\">" + contractorName + "</td><td id=\"contractorAddress1\">"
        + contractorAddress1 + "</td><td id=\"contractorPhn\">" + contractorPhn + "</td><td id=\"contractorMail\">" + contractorMail +
        "</td></tr>";
    $(".contractorSelectTable tbody").html(markup);

    $('#contractorSelectTable td').removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#contractorModalClose").click();
}

function selectedProduct(data, td) {
    // Grab Data From Modal
    let productId = $("#productId" + data).html();
    let productName = $("#productName" + data).html();
    let productNote = $("#productNote" + data).html();
    let productPeriodStartDate = $("#productPeriodStartDate" + data).html();
    let productPeriodEndDate = $("#productPeriodEndDate" + data).html();

    //Push Data To the product contract table
    var markup = "<tr><td id=\"productSelectId\">" + productId + "</td><td id=\"productSelectName\">" + productName + "</td><td id=\"productSelectNote\">"
        + productNote + "</td><td id=\"productSelectStartDate\">" + productPeriodStartDate + "</td><td id=\"productSelectEndDate\">" + productPeriodEndDate +
        "</td></tr>";
    $(".productSelectTable tbody").append(markup);

    $(td).addClass("bg-dark-silver");

    //Push Data To the product info table
    var markup = "<tr><td>" + productId + "</td><td>" + productName + "</td><td>" + productNote + "</td><td>" + productPeriodStartDate + "</td><td>" + productPeriodEndDate + "</td></tr>";
    $(".productInfoTable tbody").append(markup);

    //Push and Pass Data  To the product discount table
    let datalen = data;
    let productDiscountId = 'productDiscountId' + datalen;
    let productDiscountNameId = 'productDiscountName' + datalen;
    let productDiscountNoteId = 'productDiscountNote' + datalen;
    let productDiscountStartDateId = 'productDiscountStartDate' + datalen;
    let productDiscountEndDateId = 'productDiscountEndDate' + datalen;

    var markup = "<tr><td onclick=\'productDiscount("+ datalen +")\'><a href='#'><p id='" + productDiscountId + "'>" + productId + "</p></a></td><td id='" + productDiscountNameId + "'>" + productName + "</td><td id='" + productDiscountNoteId + "'>" + productNote + "</td><td id='" + productDiscountStartDateId + "'>" + productPeriodStartDate + "</td><td id='" + productDiscountEndDateId + "'>" + productPeriodEndDate + "</td></tr>";
    $(".productDiscountTableModal tbody").append(markup);
}

function productDiscount(data) {
    let productDiscountId = $("#productDiscountId" + data).html();
    let productDiscountShop = $("#productDiscountName" + data).html();
    let productDiscountRate = '<input className="form-control" name="productDiscountRate" type="number" id="productDiscountRate">';
    let productDiscountName = '<input className="form-control" name="productDiscountName" type="text" id="productDiscountName">';

    //Push Data To the product discount table
    var markup = "<tr><td>" + productDiscountId + "</td><td>" + productDiscountShop + "</td><td>" + productDiscountRate + "</td><td>" + productDiscountName + "</td></tr>";
    $(".productDiscountTable tbody").append(markup);

}

function selectedShop(data, td) {
    let shopId = $("#shopId" + data).html();
    let shopName = $("#shopName" + data).html();
    let shopRepresentativeName = $("#shopRepresentativeName" + data).html();
    let shopPrefecture = $("#shopPrefecture" + data).html();
    let shopAddress = $("#shopAddress" + data).html();
    let shopPhoneNumber = $("#shopPhoneNumber" + data).html();

    //Push Data To the product contract table
    var markup = "<tr><td id=\"shopId\">" + shopId + "</td><td id=\"shopName\">" + shopName + "</td><td id=\"shopRepresentativeName\">"
        + shopRepresentativeName + "</td><td id=\"shopPrefecture\">" + shopPrefecture + "</td><td id=\"shopAddress\">" + shopAddress + "</td><td id=\"shopPhoneNumber\">" + shopPhoneNumber +
        "</td></tr>";
    $(".shopSelectTable tbody").html(markup);

    $('#shopSelectTable td').removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#shopModalClose").click();
}

function disable() {
    document.getElementById("mySelect").disabled=true;
}

function enable() {
    document.getElementById("mySelect").disabled=false;
}

function contractRegistration() {
    let data = {};
    let data1 = Array();

    $(".productSelectTable tr").each(function(i){
        if (i == 0){
            return;
        }
        $(this).each(function(){
            let data2 = Array();
            data2[0] = $(this).children('#productSelectId').text();
            data2[1] = $(this).children('#productSelectNote').text();
            data2[2] = $(this).children('#productSelectStartDate').text();
            data2[3] = $(this).children('#productSelectEndDate').text();
            data1[i-1] = data2;
        });
    })

    data["productSelectId"] = data1;
    data["shop"] = $("input[type='radio'][name='shop']:checked").val();
    data["shopId"] = $("#shopId").html();
    data["shopName"] = $("#shop_name").val();
    data["shopNameKana"] = $("#shop_name_kana").val();
    data["shopArea"] = $("#area").val();
    data["shopPrefecture"] = $("#prefecture").val();
    data["shopDistrict"] = $("#district").val();
    data["shopAreaSmall"] = $("#areaSmall").val();
    data["shopAreaLarge"] = $("#areaLarge").val();
    data["shopZip"] = $("#postCode").val();
    data["shopAddress01"] = $("#address1").val();
    data["shopAddress02"] = $("#address2").val();
    data["shopTel"] = $("#phone_number").val();
    data["shopMail"] = $("#mail_address").val();
    data["shopRepresentative"] = $("#representative_name").val();
    data["shopRepresentativeKana'"] = $("#rep_name_kana").val();
    data["shopSite"] = $("#shop_site_url").val();
    data["BusinessType"] = $("#BusinessType").val();
    data["note"] = $("#product_registration_remark").val();
    data["notification_letter"] = 0;
    data["contractorId"] = $("#contractorId").html();
    console.log(data);

    if (validateData(data)) {
        $.ajax({
            url: "/contract-registration",
            type: "POST",
            data: data,
            dataType: 'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},

            success: function (data) {
                if (data.status === 1) {
                    window.location.href = "/home";
                } else if (data.status === 3) {
                    window.location.href = "/login";
                }
            },
            error: function (jqXHR, exception) {
                alert("Error occurred");
            }
        });
    }

}

function validateData(data) {
    let is_valid = true;

    /*if (fullNameCheck.value == "") {
        document.getElementById("nameerrormsg").style.display = "inline";
        is_valid = false;
    }
    if (addressCheck.value == "") {
        document.getElementById("addrerrormsg").style.display = "inline";
        is_valid = false;
    }
    if (quantityCheck.value == "") {
        document.getElementById("qtyerrormsg").style.display = "inline";
        is_valid = false;
    }*/
    return is_valid;
}

function shopAddressSearch() {
    let zipCode = $('#postCode').val();
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

function shopTypeCheck() {
    var shopType = document.querySelector('input[name="shop"]:checked').value;
    if (shopType == 0){
        $('#shopInputFields :input').attr('disabled', true);
        $('#shopInputFields :button').attr('disabled', true);
        $('#mySelect').prop('disabled', false);

    }
    if (shopType == 1){
        $('#shopInputFields :input').attr('disabled', false);
        $('#shopInputFields :button').attr('disabled', false);
        $('#mySelect').prop('disabled', true);
    }
}
