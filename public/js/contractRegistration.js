// $(function () {
//     //Initialize Select2 Elements
//     $('.select2').select2()
//     //Initialize Select2 Elements
//     $('.select2bs4').select2({
//         theme: 'bootstrap4'
//     })
// })

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
