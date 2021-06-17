$(document).ready(function () {
    $("#priceExcludingTax").html($("#productPrice").html());
    $("#totalTax").html($("#tax").html());
    $("#priceIncludingTax").html($("#priceWithTax").html());
});

function disableApproveButton(e){
    $("#menuButton").prop('disabled', true);
    $("#contractApproveContractor").prop('disabled', true);
}