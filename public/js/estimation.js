$(document).ready(function () {
    $("#priceExcludingTax").html($("#productPrice").html());
    $("#totalTax").html($("#tax").html());
    $("#priceIncludingTax").html($("#priceWithTax").html());
});