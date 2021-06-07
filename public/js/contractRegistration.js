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
    var markup = "<tr><td id=\"shopId\">" + shopId + "</td><td id=\"shopName\">" + shopName + "</td><td id=\"shopRepresentativeName\">"+ shopRepresentativeName +
        "</td><td id=\"shopPrefecture\">" + shopPrefecture + "</td><td id=\"shopAddress\">" + shopAddress + "</td><td id=\"shopPhoneNumber\">" + shopPhoneNumber +
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

    $(".productInfoTable tr").each(function(i){
        if (i == 0){
            return;
        }
        $(this).each(function(){
            let data2 = Array();
            data2[0] = $(this).children('#productInfoId').text();
            data2[1] = $(this).children('#productInfoNote').text();
            data2[2] = $(this).children('#productInfoStart').text();
            data2[3] = $(this).children('#productInfoEnd').text();
            data2[4] = $(this).children('#productInfoShopId').text();
            data1[i-1] = data2;
        });
    })

    data["productSelectId"] = data1;
    data["tantou"] = $("#tantou").val();
    data["note"] = $("#product_registration_remark").val();
    data["contractorId"] = $("#contractorId").html();
    data["contractType"] = $("#contractType").val();
    data["contractId"] = $("#contractId").val();

    if (validateData(data)) {
        $.ajax({
            url: "/contract-registration",
            type: "POST",
            data: data,
            dataType: 'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},

            success: function (data) {
                if (data.status === 1) {
                    let id = data.contract;
                    window.location.href = "/contract-details/"+id;
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

function checkContractAvailable(){
    let contractId = $("#contractIdSearch").val();
    let data = {};
    data["contractIdSearch"] = contractId
    $.ajax({
        url: "/contract-registration-search",
        type: "GET",
        data: data,
        dataType: 'JSON',
        headers: {'X-Requested-With': 'XMLHttpRequest'},

        success: function (data) {
            if (data.status === 1) {
                $("#ContractSearchForm").attr('action', "/contract-update/"+contractId);
                $("#ContractSearchForm").submit();
            }
            else if(data.status === 0){
                alert("No data available for this contract id");
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        }
    });
}

function checkContractAvailableFromDetails(){
    let contractId = $("#contractIdSearch").val();
    let data = {};
    data["contractIdSearch"] = contractId
    $.ajax({
        url: "/contract-registration-search",
        type: "GET",
        data: data,
        dataType: 'JSON',
        headers: {'X-Requested-With': 'XMLHttpRequest'},

        success: function (data) {
            if (data.status === 1) {
                $("#ContractSearchFromDetails").submit();
            }
            else if(data.status === 0){
                alert("No data available for this contract id");
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        }
    });
}

var shopCount = 0;
function productRegistration(){
    let shop = $("input[type='radio'][name='shop']:checked").val();
    let shopId = "";
    let shopName = "";
    let shopFile = "";
    let productCount = 0;
    shopCount++;

    $(".productSelectTable tr").each(function(i){
        if (i == 0){
            return;
        }

        productCount++;

        if(i == 1){
            if(shop == 1){
                shopRegistration(shopCount);
            }
            else{
                shopId = $("#shopId").html();
                shopName = $("#shopName").html();
                //shopFile = $("#shopFile").html();
            }
        }

        $(this).each(function(){
            let data = Array();
            data[0] = $(this).children('#productSelectId').text();
            data[1] = $(this).children('#productSelectName').text();
            data[2] = $(this).children('#productSelectNote').text();
            data[3] = $(this).children('#productSelectStartDate').text();
            data[4] = $(this).children('#productSelectEndDate').text();

            let file = "";
            if(shopFile){
                file = "<a href='#'>あり</a>";
            }
            else{
                file = "なし";
            }

            let markup = "<tr><td onclick=\"productInfoRemove(this)\" id=\"productInfoRemove\"><a href=\"#\">削除</a></td><td id=\"productInfoId\">" + data[0] +
                "</td><td id=\"productInfoName\">" + data[1] + "</td><td id=\"productInfoNote\">" + data[2] +
                "</td><td id=\"productInfoShopName\" class=\"productInfoShopName"+ shopCount +"\">"+ shopName +
                "</td><td id=\"productInfoShopFile\" class=\"productInfoShopFile"+ shopCount +"\">"+ file +
                "</td> <td id=\"productInfoStart\">" + data[3] + "</td><td id=\"productInfoEnd\">" + data[4] +
                "</td><td style=\"display: none\" id=\"productInfoShopId\" class=\"productInfoShopId"+ shopCount +"\">"+ shopId +"</td></tr>";
            $(".productInfoTable tbody").append(markup);
        });
    });

    if(!productCount){
        alert("No product selected");
    }
    $(".productSelectTable tbody").empty();
    $(".shopSelectTable tbody").empty();
    $('#productSelectTable td').removeClass("bg-dark-silver");
    $('#shopRegistrationForm').find('input:text, input:file, select, textarea')
        .each(function () {
            $(this).val('');
        });
}

function shopRegistration(shopCount){
    let data = {};

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
    data["shopRepresentativeKana"] = $("#rep_name_kana").val();
    data["shopSite"] = $("#shop_site_url").val();
    data["BusinessType"] = $("#BusinessType").val();
    data["notification_letter"] = $("#notification_letter").val();

    if (validateData(data)) {
        $.ajax({
            url: "/shop-registration",
            type: "POST",
            data: data,
            dataType: 'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},

            success: function (data) {
                if (data.status === 1) {
                    let file = "";
                    if(data.shopFile){
                        file = "<a href='#'>あり</a>";
                    }
                    else{
                        file = "なし";
                    }
                    $(".productInfoShopId"+shopCount).html(data.shopId);
                    $(".productInfoShopName"+shopCount).html(data.shopName);
                    $(".productInfoShopFile"+shopCount).html(file);
                }
                else if (data.status === 3) {
                    window.location.href = "/login";
                }
            },
            error: function (jqXHR, exception) {
                alert("Error occurred");
            }
        });
    }
}

function productInfoRemove(td){
    $(td).parents("tr").remove();
}

function filterByProductIdOrName(productId, productName) {
      console.log($.fn.dataTableExt.afnFiltering);
      // Custom filter syntax requires pushing the new filter to the global filter array
      $.fn.dataTableExt.afnFiltering.push(function (
        oSettings,
        aData,
        iDataIndex
      ) {
        console.log(aData);
        var rowProductId = aData[1],
            rowProductName = aData[2];

        if (productId && rowProductId == productId) {
          return true;
        }
        if (productName && rowProductName == productName) {
          return true;
        }
        return false;
      });
    };

$(document).ready(function() {
    $('#shopInputFields :input').attr('disabled', true);
    $('#shopInputFields :button').attr('disabled', true);
    $('#mySelect').prop('disabled', true);

    // Load datatable data for contractors on modal
    var $productDataTable = $("#productSelectTable");
    $productDataTable.DataTable({
      paging: false,
      bProcessing: true,
      serverSide: true,
      scrollCollapse: false,
      ajax: {
        url: baseUrl + "/contract-product-data-table-data", // json data source
        type: "post",
        data: {
          // key1: value1 - in case if we want send data with request
        },
      },
      columns: [
        {
          data: "product_id",
          render: function (datum, type, row) {
            return "<a href='#' style='color: #0099FF'>選択</a>";
          },
        },
        { data: "product_id" },
        { data: "product_name" },
        { data: "product_note" },
        { data: "start_date" },
        { data: "end_date" },
      ],
      columnDefs: [
        {
          targets: 0,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "selectedProduct" + rowData.product_id);
            $(td).attr("onclick", "selectedProduct(" + row + ", this)");
          },
        },
        {
          targets: 1,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "productId" + row);
          },
        },
        {
          targets: 2,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "productName" + row);
          },
        },
        {
          targets: 3,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "productNote" + row);
          },
        },
        {
          targets: 4,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "productPeriodStartDate" + row);
          },
        },
        {
          targets: 5,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).attr("id", "productPeriodEndDate" + row);
          },
        },
        { orderable: false, targets: [0, 1, 2, 3, 4] },
      ],
      bFilter: false, // to display datatable search
      bInfo: false, // to display data-table entries text
    });

    $(document).on("click", "#productSearch", function (e) {
      e.preventDefault();
      var productId = $("#searchProductId").val();
      var productName = $("#searchProductName").val();

      $productDataTable.on("preXhr.dt", function (e, settings, data) {
        data.productId = productId;
        data.productName = productName;
      });

    //   filterByProductIdOrName(productId, productName); // We call our filter function
    //   $productDataTable
    //     .fnSettings()
    //     .aoData.push({ name: "highlight", value: "true" });

      $productDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    //   $productDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });
});
