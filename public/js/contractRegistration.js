function shopSearchClear() {
    $("#searchShopId").val("");
    $("#searchShopName").val("");
}

function contractorSearchClear() {
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
    var markup =
        '<tr><td id="contractorId">' +
        contractorId +
        '</td><td id="contractorName">' +
        contractorName +
        '</td><td id="contractorAddress1">' +
        contractorAddress1 +
        '</td><td id="contractorPhn">' +
        contractorPhn +
        '</td><td id="contractorMail">' +
        contractorMail +
        "</td></tr>";
    $(".contractorSelectTable tbody").html(markup);

    $("#contractorSelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#contractorModalClose").click();
}

function selectedProduct(data, td) {
    let isSelected = $(td).attr("data-selected");

    if (isSelected === "false") {
        $(td).addClass("bg-dark-silver");
        $(td).attr("data-selected", true);
    } else if (isSelected === "true") {
        $(td).removeClass("bg-dark-silver");
        $(td).attr("data-selected", false);
    }
}

function productDiscount(data) {
    let productDiscountId = $("#productDiscountId" + data).html();
    let productDiscountShop = $("#productDiscountName" + data).html();
    let productDiscountRate =
        '<input className="form-control" name="productDiscountRate" type="number" id="productDiscountRate">';
    let productDiscountName =
        '<input className="form-control" name="productDiscountName" type="text" id="productDiscountName">';

    //Push Data To the product discount table
    var markup =
        "<tr><td>" +
        productDiscountId +
        "</td><td>" +
        productDiscountShop +
        "</td><td>" +
        productDiscountRate +
        "</td><td>" +
        productDiscountName +
        "</td></tr>";
    $(".productDiscountTable tbody").append(markup);
}

function selectedShop(data, td) {
    let shopId = $("#shopId" + data).html();
    let shopName = $("#shopName" + data).html();
    let shopRepresentativeName = $("#shopRepresentativeName" + data).val();
    let shopPrefecture = $("#shopPrefecture" + data).val();
    let shopAddress = $("#shopAddress" + data).html();
    let shopPhoneNumber = $("#shopPhoneNumber" + data).val();
    let shopFile = $("#notificateFile" + data).val();

    //Push Data To the product contract table
    var markup =
        '<tr><td id="shopId">' +
        shopId +
        '</td><td id="shopName">' +
        shopName +
        '</td><td id="shopRepresentativeName">' +
        shopRepresentativeName +
        '</td><td id="shopPrefecture">' +
        shopPrefecture +
        '</td><td id="shopAddress">' +
        shopAddress +
        '</td><td id="shopPhoneNumber">' +
        shopPhoneNumber +
        '</td><td class="d-none" id="shopFile">' +
        shopFile +
        '</td></tr>';
    $(".shopSelectTable tbody").html(markup);

    $("#shopSelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#shopModalClose").click();
}

function disable() {
    document.getElementById("mySelect").disabled = true;
}

function enable() {
    document.getElementById("mySelect").disabled = false;
}

function contractRegistration() {
    removePreviousErrorClass();
    $("#contractRegistration").prop('disabled', true);
    let data = {};
    let products = Array();
    let ringis = Array();

    $(".productInfoTable tr").each(function (i) {
        if (i == 0) {
            return;
        }
        $(this).each(function () {
            let data2 = Array();
            data2[0] = $(this).children('#productInfoId').text();
            data2[1] = $(this).children('#productInfoNote').text();
            data2[2] = $(this).children('#productInfoStart').text();
            data2[3] = $(this).children('#productInfoEnd').text();
            data2[4] = $(this).children('#productInfoShopId').text();
            products[i-1] = data2;
        });
    });

    $(".productDiscountTable tr").each(function(i){
        if (i == 0){
            return;
        }
        $(this).each(function(){
            ringis[i-1] = $(this).children('#ringiNo').text();
        });
    })

    data["productSelectId"] = products;
    data["tantou"] = $("#tantou").val();
    data["note"] = $("#product_registration_remark").val();
    data["contractorId"] = $("#contractorId").html();
    data["contractType"] = $("#contractType").val();
    data["contractId"] = $("#contractId").val();
    data["ringis"] = ringis;

    $("#tantou").removeClass("error");
    $("#contractorSelectButton").removeClass("error");
    $(".productInfoTable").removeClass("error");

    if(data["tantou"] === "0"){
        $('html,body').animate({
            scrollTop: $("#contractIdSearch").offset().top},
        'slow');
        $("#tantou").addClass("error");
        $("#contractRegistration").prop('disabled', false);
        return false;
    }
    else if(!data["contractorId"]){
        $('html,body').animate({
            scrollTop: $("#contractIdSearch").offset().top},
        'slow');
        $("#contractorSelectButton").addClass("error");
        $("#contractRegistration").prop('disabled', false);
        return false;
    }
    else if(data["productSelectId"].length <= 0){
        $(".productInfoTable").addClass("error");
        $("#contractRegistration").prop('disabled', false);
        return false;
    }

    $.ajax({
        url: "/contract-registration",
        type: "POST",
        data: data,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },

        success: function (data) {
            if (data.status === 1) {
                let id = data.contract;
                window.location.href = "/contract-details/" + id;
            } else if (data.status === 3) {
                window.location.href = "/login";
            }
        },
        error: function (jqXHR, exception) {
            $("#contractRegistration").prop('disabled', false);
            alert("Error occurred");
        },
    });
}

function shopAddressSearch() {
    let zipCode = $("#postCode").val();
    let setAddressId = "address1";
    var param = { zipcode: zipCode };
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
                    $("#" + setAddressId).val(
                        res.results[0].address1 + res.results[0].address2
                    );
                } else {
                    alert("Invalid Zip Code");
                }
            } else {
                alert(res.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
        },
    });
}

function shopTypeCheck() {
    var shopType = document.querySelector('input[name="shop"]:checked').value;
    if (shopType == 0) {
        $("#shopInputFields :input").attr("disabled", true);
        $("#shopInputFields :button").attr("disabled", true);
        $("#mySelect").prop("disabled", false);
    }
    if (shopType == 1) {
        $("#shopInputFields :input").attr("disabled", false);
        $("#shopInputFields :button").attr("disabled", false);
        $("#mySelect").prop("disabled", true);
    }
}

function checkContractAvailable() {
    let contractId = $("#contractIdSearch").val();
    let data = {};
    data["contractIdSearch"] = contractId;
    $.ajax({
        url: "/contract-registration-search",
        type: "GET",
        data: data,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },

        success: function (data) {
            if (data.status === 1) {
                $("#ContractSearchForm").attr(
                    "action",
                    "/contract-update/" + contractId
                );
                $("#ContractSearchForm").submit();
            }
            else if (data.status === 0) {
                $("#contractIdSearch").addClass("error");
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        },
    });
}

function checkContractAvailableFromDetails() {
    let contractId = $("#contractIdSearch").val();
    let data = {};
    data["contractIdSearch"] = contractId;
    $.ajax({
        url: "/contract-registration-search",
        type: "GET",
        data: data,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },

        success: function (data) {
            if (data.status === 1) {
                $("#ContractSearchFromDetails").submit();
            }
            else if (data.status === 0) {
                $("#contractIdSearch").addClass("error");
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        },
    });
}

var shopCount = 0;
function productRegistration() {
    removePreviousErrorClass();
    let shop = $("input[type='radio'][name='shop']:checked").val();
    let shopId = "";
    let shopName = "";
    let shopFile = "";
    let productCount = 0;
    let validator = false;
    shopCount++;

    if (shop == 1){
        if($("#shop_name").val() === ""){
            $('html,body').animate({
                scrollTop: $("#mySelect").offset().top},
            'slow');
            $("#shop_name").addClass("error");
            validator = true;
        }
        else if($("#phone_number").val() === ""){
            $('html,body').animate({
                scrollTop: $("#mySelect").offset().top},
            'slow');
            $("#phone_number").addClass("error");
            validator = true;
        }
    }
    if(validator){
        return false;
    }

    $(".productSelectTable tr").each(function (i) {
        if (i == 0) {
            return;
        }

        productCount++;

        if (i == 1) {
            if (shop == 1) {
                shopRegistration(shopCount);
            }
            else {
                shopId = $("#shopId").html();
                shopName = $("#shopName").html();
                shopFile = $("#shopFile").html();
            }
        }

        $(this).each(function () {
            let data = Array();
            data[0] = $(this).children("#productSelectId").text();
            data[1] = $(this).children("#productSelectName").text();
            data[2] = $(this).children("#productSelectNote").text();
            data[3] = $(this).children("#productSelectStartDate").text();
            data[4] = $(this).children("#productSelectEndDate").text();

            let file = "";
            if (shopFile) {
                file = "<a target = '_blank' href='/shopFiles/"+shopFile+"'>あり</a>";
            }
            else {
                file = "なし";
            }

            let markup =
                '<tr><td onclick="productInfoRemove(this)" id="productInfoRemove"><a href="javascript:void(0);">削除</a></td><td id="productInfoId">' +
                data[0] +
                '</td><td id="productInfoName">' +
                data[1] +
                '</td><td id="productInfoNote">' +
                data[2] +
                '</td><td id="productInfoShopName" class="productInfoShopName' +
                shopCount +
                '">' +
                shopName +
                '</td><td id="productInfoShopFile" class="productInfoShopFile' +
                shopCount +
                '">' +
                file +
                '</td> <td id="productInfoStart">' +
                data[3] +
                '</td><td id="productInfoEnd">' +
                data[4] +
                '</td><td style="display: none" id="productInfoShopId" class="productInfoShopId' +
                shopCount +
                '">' +
                shopId +
                "</td></tr>";
            $(".productInfoTable tbody").append(markup);
        });
    });

    if (!productCount) {
        alert("No product selected");
    }
    $(".productSelectTable tbody").empty();
    $(".shopSelectTable tbody").empty();
    $("#productSelectTable td").removeClass("bg-dark-silver");
    $("#shopRegistrationForm")
        .find("input:text, input:file, select, textarea")
        .each(function () {
            $(this).val("");
        });
}

function shopRegistration(shopCount) {

    let formData = new FormData();
    formData.append("notification_letter", notification_letter.files[0]);

    formData.append("shopName", $("#shop_name").val());
    formData.append("shopNameKana", $("#shop_name_kana").val());
    formData.append("shopArea", $("#area").val());
    formData.append("shopPrefecture", $("#prefecture").val());
    formData.append("shopDistrict", $("#district").val());
    formData.append("shopAreaSmall", $("#areaSmall").val());
    formData.append("shopAreaLarge", $("#areaLarge").val());
    formData.append("shopZip", $("#postCode").val());
    formData.append("shopAddress01", $("#address1").val());
    formData.append("shopAddress02", $("#address2").val());
    formData.append("shopTel", $("#phone_number").val());
    formData.append("shopMail", $("#mail_address").val());
    formData.append("shopRepresentative", $("#representative_name").val());
    formData.append("shopRepresentativeKana", $("#rep_name_kana").val());
    formData.append("shopSite", $("#shop_site_url").val());
    formData.append("BusinessType", $("#BusinessType").val());

    $.ajax({
        url: "/shop-registration",
        type: "POST",
        data: formData,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        processData: false,
        contentType: false,

        success: function (data) {
            if (data.status === 1) {
                let file = "";
                let fileName = data.shopFile;
                if (fileName) {
                    file = "<a target='_blank\' href='/shopFiles/"+fileName+"'>あり</a>";
                }
                else {
                    file = "なし";
                }
                $(".productInfoShopId" + shopCount).html(data.shopId);
                $(".productInfoShopName" + shopCount).html(data.shopName);
                $(".productInfoShopFile" + shopCount).html(file);
            }
            else if (data.status === 3) {
                window.location.href = "/login";
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        },
    });
}

function productInfoRemove(td) {
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
}

function loadProductDataTable() {
    // Load datatable data for products on modal
    var $productDataTable = $("#productSelectTable");
    $productDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url: baseUrl + "/contract-product-data-table-data", // json data source
            type: "post",
            data: {},
        },
        columns: [
            {
                data: "product_id",
                render: function (datum, type, row) {
                    return "<a href='javascript:void(0);' style='color: #0099FF'>選択</a>";
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
                    $(td).attr("data-selected", false);
                    $(td).attr("onclick", "selectedProduct(" + row + ", this)");
                    $(td).attr("data-row-index", row);
                    $(td).attr("data-identifier", rowData.product_id);
                    $(td).addClass("select-product-column");
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
            { orderable: false, targets: [0, 1, 2, 3, 4, 5] },
        ],
        language: {
            emptyTable: "<h3>データがありません！</h3>",
        },
        bFilter: false, // to display data-table search
        bInfo: false, // to display data-table entries text
    });

    // Handle product search
    $(document).on("submit", "#productSearchForm", function (e) {
        e.preventDefault();
        var productId = $("#searchProductId").val();
        var productName = $("#searchProductName").val();

        $productDataTable.on("preXhr.dt", function (e, settings, data) {
            data.productId = productId;
            data.productName = productName;
        });

        $productDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    // Clear Product Search
    $(document).on("click", "#clearProductSearch", function (e) {
        e.preventDefault();
        $("#searchProductId").val("");
        $("#searchProductName").val("");

        $productDataTable.on("preXhr.dt", function (e, settings, data) {
            delete data.productId;
            delete data.productName;
        });

        $productDataTable.dataTable().fnDraw();
    });

    $(document).on("click", "#addSelectedProductsBtn", function (e) {
        e.preventDefault();
        let selectedProducts = $(
            "#productSelectTable > tbody > tr > td.select-product-column[data-selected='true']"
        );
        let markup = "";
        $.each(selectedProducts, function (key, product) {
            // Grab Data From Modal
            let rowIndex = $(product).attr("data-row-index");

            let productId = $("#productId" + rowIndex).html();
            let productName = $("#productName" + rowIndex).html();
            let productNote = $("#productNote" + rowIndex).html();
            let productPeriodStartDate = $(
                "#productPeriodStartDate" + rowIndex
            ).html();
            let productPeriodEndDate = $(
                "#productPeriodEndDate" + rowIndex
            ).html();

            //Push Data To the product contract table
            markup +=
                '<tr><td id="productSelectId" class="product-select-id" data-identifier="' +
                productId +
                '">' +
                productId +
                '</td><td id="productSelectName">' +
                productName +
                '</td><td id="productSelectNote">' +
                productNote +
                '</td><td id="productSelectStartDate">' +
                productPeriodStartDate +
                '</td><td id="productSelectEndDate">' +
                productPeriodEndDate +
                "</td></tr>";
        });
        $(".productSelectTable tbody").html("");
        $(".productSelectTable tbody").append(markup);
    });
}

function loadContractorDataTable() {
    // Load data-table data for contractors on modal
    var $contractorDataTable = $("#contractorSelectTable");
    $contractorDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url: baseUrl + "/contract-contractor-data-table-data", // json data source
            type: "post",
            data: {},
        },
        columns: [
            {
                data: "contractor_id",
                render: function (datum, type, row) {
                    return "<a href='javascript:void(0);'>選択</a>";
                },
            },
            { data: "contractor_id" },
            { data: "contractor_name" },
            { data: "address_01" },
            { data: "tel_no" },
            { data: "mail_address" },
        ],
        columnDefs: [
            {
                targets: 0,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr(
                        "id",
                        "selectedContractor" + rowData.contractor_id
                    );
                    $(td).attr(
                        "onclick",
                        "selectedContractor(" + row + ", this)"
                    );
                    $(td).attr("data-row-index", row);
                    let hiddenInputs =
                        "<input id='contractorNameKana" +
                        row +
                        "' type='hidden' value='" +
                        rowData.contractor_name_kana +
                        "'>" +
                        "<input id='contractorPostCode" +
                        row +
                        "' type='hidden' value='" +
                        rowData.zipcode +
                        "'>" +
                        "<input id='contractorAddress2" +
                        row +
                        "' type='hidden' value='" +
                        rowData.address_02 +
                        "'>";
                    $(td).append(hiddenInputs);
                },
            },
            {
                targets: 1,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "contractorId" + row);
                },
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "contractorName" + row);
                },
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "contractorAddress1" + row);
                },
            },
            {
                targets: 4,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "contractorPhn" + row);
                },
            },
            {
                targets: 5,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "contractorMail" + row);
                },
            },
            { orderable: false, targets: [0, 1, 2, 3, 4, 5] },
        ],
        language: {
            emptyTable: "<h3>データがありません！</h3>",
        },
        bFilter: false, // to display data-table search
        bInfo: false, // to display data-table entries text
    });

    // Handle contractor search
    $(document).on("submit", "#contractorSearchForm", function (e) {
        e.preventDefault();
        var contractorId = $("#searchContractorId").val();
        var contractorName = $("#searchContractorName").val();

        $contractorDataTable.on("preXhr.dt", function (e, settings, data) {
            data.contractorId = contractorId;
            data.contractorName = contractorName;
        });

        $contractorDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    // Clear contractor search
    $(document).on("click", "#clearContractorSearch", function (e) {
        e.preventDefault();
        $("#searchContractorId").val("");
        $("#searchContractorName").val("");

        $contractorDataTable.on("preXhr.dt", function (e, settings, data) {
            delete data.contractorId;
            delete data.contractorName;
        });

        $contractorDataTable.dataTable().fnDraw();
    });
}

function loadShopDataTable() {
    // Load data-table data for shops on modal
    var $shopDataTable = $("#shopSelectTable");
    $shopDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url: baseUrl + "/contract-shop-data-table-data", // json data source
            type: "post",
            data: {},
        },
        columns: [
            {
                data: "shop_id",
                render: function (datum, type, row) {
                    return "<a href='javascript:void(0);'>選択</a>";
                },
            },
            { data: "shop_id" },
            { data: "shop_name" },
            { data: "address_01" },
        ],
        columnDefs: [
            {
                targets: 0,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "selectedShop" + rowData.shop_id);
                    $(td).attr("onclick", "selectedShop(" + row + ", this)");
                    $(td).attr("data-row-index", row);
                    let hiddenInputs =
                        "<input id='shopRepresentativeName" +
                        row +
                        "' type='hidden' value=''>" +
                        "<input id='shopPrefecture" +
                        row +
                        "' type='hidden' value='" +
                        rowData.prefecture +
                        "'>" +
                        "<input id='shopDaihyoName" +
                        row +
                        "' type='hidden' value='" +
                        rowData.shop_daihyo_name +
                        "'>" +
                        "<input id='notificateFile" +
                        row +
                        "' type='hidden' value='" +
                        rowData.notificate_file_path +
                        "'>" +
                        "<input id='shopPhoneNumber" +
                        row +
                        "' type='hidden' value='" +
                        rowData.tel_no +
                        "'>";
                    $(td).append(hiddenInputs);
                },
            },
            {
                targets: 1,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "shopId" + row);
                },
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "shopName" + row);
                },
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "shopAddress" + row);
                },
            },
            { orderable: false, targets: [0, 1, 2, 3] },
        ],
        language: {
            emptyTable: "<h3>データがありません！</h3>",
        },
        bFilter: false, // to display data-table search
        bInfo: false, // to display data-table entries text
    });

    // Handle shop search
    $(document).on("submit", "#shopSearchForm", function (e) {
        e.preventDefault();
        var shopId = $("#searchShopId").val();
        var shopName = $("#searchShopName").val();

        $shopDataTable.on("preXhr.dt", function (e, settings, data) {
            data.shopId = shopId;
            data.shopName = shopName;
        });

        $shopDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    // Clear contractor search
    $(document).on("click", "#clearShopSearch", function (e) {
        e.preventDefault();
        $("#searchShopId").val("");
        $("#searchShopName").val("");

        $shopDataTable.on("preXhr.dt", function (e, settings, data) {
            delete data.shopId;
            delete data.shopName;
        });

        $shopDataTable.dataTable().fnDraw();
    });
}

function loadProductSelectModal() {
    $(document).on("click", "#loadProductSelectModal", function (e) {
        e.preventDefault();
        var selectedProductsArray = [];
        var selectedProducts = $(document).find(
            "#productSelectionTable > tbody > tr > td.product-select-id"
        );
        $.each(selectedProducts, function (index, value) {
            selectedProductsArray.push($(value).attr("data-identifier"));
        });
        var modalProducts = $(document).find(
            "#productSelectTable > tbody > tr > td.select-product-column"
        );
        $.each(modalProducts, function (index, value) {
            var productIdentifier = $(value).attr("data-identifier");
            if (selectedProductsArray.indexOf(productIdentifier) !== -1) {
                $(value).attr("data-selected", true);
                $(value).addClass("bg-dark-silver");
            } else {
                $(value).attr("data-selected", false);
                $(value).removeClass("bg-dark-silver");
            }
        });
        $("#product-select-modal").modal("show");
    });
}

$(document).ready(function () {
    $("#shopInputFields :input").attr("disabled", true);
    $("#shopInputFields :button").attr("disabled", true);
    $("#mySelect").prop("disabled", true);

    loadProductDataTable();

    loadContractorDataTable();

    loadShopDataTable();

    loadProductSelectModal();
});

function ringiSearch(){
    let data = {};
    data["ringiNo"] = $("#ringiNoSearch").val();
    $("#ringiNoSearch").removeClass('error');

    if (ringiNo !== "" ) {
        $.ajax({
            url: "/ringi-search",
            type: "GET",
            data: data,
            dataType: 'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},

            success: function (data) {
                if (data.status === 1) {
                    fillUpRingiForm(data.ringi);
                }
                else if (data.status === 2) {
                    $("#ringiNoSearch").addClass('error');
                    $("#ringiNoSearch").val("");
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

function fillUpRingiForm(ringi){
    $("#ringiNo").html(ringi["ringi_no"]);
    $("#applicantName").html(ringi["applicant_name"]);
    $("#ringiType").html(ringi["ringi_type"]);
    $("#targetArea").html(ringi["target_area"]);
    $("#targetName").html(ringi["target_name"]);
    $("#discountServiceType").html(ringi["discount_service_type"]);
    $("#ringiDetail").html(ringi["ringi_detail"]);
    $("#summaryCondition").html(ringi["summary_condition"]);
    $("#beforeSummaryPrice").html(ringi["before_summary_price"]);
    $("#afterSummaryPrice").html(ringi["after_summary_price"]);
    $("#summaryPeriod").html(ringi["summary_period"]);
    $("#startDate").html(ringi["start_date"]);
    $("#endDate").html(ringi["end_date"]);
    $("#purpose").html(ringi["purpose"]);
    $("#memo").html(ringi["memo"]);
}

function addDiscountWithContract(){
    let tableBody = "<tr>" +
        "<td onclick=\"productInfoRemove(this)\" id=\"ringiRemove\"><a href=\"javascript:void(0);\">削除</a></td>" +
        "<td id=\"ringiNo\">"+$("#ringiNo").html()+"</td>\n" +
        "<td id=\"ringiType\">"+$("#ringiType").html()+"</td>\n" +
        "<td id=\"targetArea\">"+$("#targetArea").html()+"</td>\n" +
        "<td id=\"targetName\">"+$("#targetName").html()+"</td>\n" +
        "<td id=\"discountServiceType\">"+$("#discountServiceType").html()+"</td>\n" +
        "<td id=\"ringiDetail\">"+$("#ringiDetail").html()+"</td>\n" +
        "<td id=\"summaryCondition\">"+$("#summaryCondition").html()+"</td>\n" +
        "<td id=\"beforeSummaryPrice\">"+$("#beforeSummaryPrice").html()+"</td>\n" +
        "<td id=\"afterSummaryPrice\">"+$("#afterSummaryPrice").html()+"</td>\n" +
        "<td id=\"summaryPeriod\">"+$("#summaryPeriod").html()+"</td>\n" +
        "<td id=\"startDate\">"+$("#startDate").html()+"</td>\n" +
        "<td id=\"endDate\">"+$("#endDate").html()+"</td>\n" +
        "<td id=\"purpose\">"+$("#purpose").html()+"</td>\n" +
        "<td id=\"memo\">"+$("#memo").html()+"</td>\n" +
        "<td id=\"applicantName\">"+$("#applicantName").html()+"</td>" +
        "</tr>";
    $(".productDiscountTable tbody").append(tableBody);
}

$('#district').on('change', function (e) {
    let data = {};
    data["district"] = this.value;

    getAddressRelatedData(1, data, "/district-address");
});

$('#prefecture').on('change', function () {
    let data = {};
    data["district"] = $("#district option:selected").val();
    data["prefecture"] = $("#prefecture option:selected").val();

    getAddressRelatedData(2, data, "/prefecture-address");
});

$('#areaLarge').on('change', function () {
    let data = {};
    data["district"] = $("#district option:selected").val();
    data["prefecture"] = $("#prefecture option:selected").val();
    data["areaLarge"] = $("#areaLarge option:selected").val();

    getAddressRelatedData(3, data, "/area-large-address");
});

$('#areaSmall').on('change', function () {
    let data = {};
    data["district"] = $("#district option:selected").val();
    data["prefecture"] = $("#prefecture option:selected").val();
    data["areaLarge"] = $("#areaLarge option:selected").val();
    data["areaSmall"] = $("#areaSmall option:selected").val();

    getAddressRelatedData(4, data, "/area-small-address");
});

function getAddressRelatedData(addressType, data, url){
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },

        success: function (data) {
            if (data.status === 1) {
                if(addressType === 1){
                    fillUpAddressesForDistrictSelect(data);
                }

                else if(addressType === 2){
                    fillUpAddressesForPrefectureSelect(data);
                }

                else if(addressType === 3){
                    fillUpAddressesForAreaLargeSelect(data);
                }

                else if(addressType === 4){
                    fillUpAddressesForAreaSmallSelect(data);
                }
            }
            else if (data.status === 3) {
                window.location.href = "/login";
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        },
    });
}

function fillUpAddressesForDistrictSelect(data){

    let prefectureOption = "<option value=\"0\"></option>";
    let areaLargeOption = "<option value=\"0\"></option>";
    let areaSmallOption = "<option value=\"0\"></option>";
    let areaOption = "<option value=\"0\"></option>";

    let pref = data[0].prefecture;
    let large = data[0].areaLarge;
    let small = data[0].areaSmall;
    let area = data[0].area;
    let i;

    for(i = 0; i < pref.length; i++){
        prefectureOption += "<option value=\""+pref[i]["prefecture_id"]+"\">"+pref[i]["area_name"]+"</option>"
    }
    for(i = 0; i < large.length; i++){
        areaLargeOption += "<option value=\""+large[i]["large_area_id"]+"\">"+large[i]["area_name"]+"</option>"
    }
    for(i = 0; i < small.length; i++){
        areaSmallOption += "<option value=\""+small[i]["small_area_id"]+"\">"+small[i]["area_name"]+"</option>"
    }
    for(i = 0; i < area.length; i++){
        areaOption += "<option value=\""+area[i]["area_id"]+"\">"+area[i]["area_name"]+"</option>"
    }

    $("#prefecture").html(prefectureOption);
    $("#areaLarge").html(areaLargeOption);
    $("#areaSmall").html(areaSmallOption);
    $("#area").html(areaOption);
}

function fillUpAddressesForPrefectureSelect(data){

    let areaLargeOption = "<option value=\"0\"></option>";
    let areaSmallOption = "<option value=\"0\"></option>";
    let areaOption = "<option value=\"0\"></option>";

    let large = data[0].areaLarge;
    let small = data[0].areaSmall;
    let area = data[0].area;
    let i;


    for(i = 0; i < large.length; i++){
        areaLargeOption += "<option value=\""+large[i]["large_area_id"]+"\">"+large[i]["area_name"]+"</option>"
    }
    for(i = 0; i < small.length; i++){
        areaSmallOption += "<option value=\""+small[i]["small_area_id"]+"\">"+small[i]["area_name"]+"</option>"
    }
    for(i = 0; i < area.length; i++){
        areaOption += "<option value=\""+area[i]["area_id"]+"\">"+area[i]["area_name"]+"</option>"
    }

    $("#areaLarge").html(areaLargeOption);
    $("#areaSmall").html(areaSmallOption);
    $("#area").html(areaOption);
}

function fillUpAddressesForAreaLargeSelect(data){

    let areaSmallOption = "<option value=\"0\"></option>";
    let areaOption = "<option value=\"0\"></option>";

    let small = data[0].areaSmall;
    let area = data[0].area;
    let i;


    for(i = 0; i < small.length; i++){
        areaSmallOption += "<option value=\""+small[i]["small_area_id"]+"\">"+small[i]["area_name"]+"</option>"
    }
    for(i = 0; i < area.length; i++){
        areaOption += "<option value=\""+area[i]["area_id"]+"\">"+area[i]["area_name"]+"</option>"
    }

    $("#areaSmall").html(areaSmallOption);
    $("#area").html(areaOption);
}

function fillUpAddressesForAreaSmallSelect(data){

    let areaOption = "<option value=\"0\"></option>";

    let area = data.area;
    let i;

    for(i = 0; i < area.length; i++){
        areaOption += "<option value=\""+area[i]["area_id"]+"\">"+area[i]["area_name"]+"</option>"
    }

    $("#area").html(areaOption);
}

function clearRingiForm(){
    $("#ringiNoSearch").val("");
    $("#ringiNo").html("");
    $("#applicantName").html("");
    $("#ringiType").html("");
    $("#targetArea").html("");
    $("#targetName").html("");
    $("#discountServiceType").html("");
    $("#ringiDetail").html("");
    $("#summaryCondition").html("");
    $("#beforeSummaryPrice").html("");
    $("#afterSummaryPrice").html("");
    $("#summaryPeriod").html("");
    $("#startDate").html("");
    $("#endDate").html("");
    $("#purpose").html("");
    $("#memo").html("");
}

function disableApproveButton(e){
    $("#contractApproveEmployee").prop('disabled', true);
    $("#contractApproveContractor").prop('disabled', true);
}

function removePreviousErrorClass(){
    let elems = document.querySelectorAll(".error");

    [].forEach.call(elems, function(el) {
        el.classList.remove("error");
    });
}
