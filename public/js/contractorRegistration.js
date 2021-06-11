function contractorRegistration() {
    let data = getContractorRegistrationData();
    let validateContractor = validateContractorData(data);
    let validateCompany = validateCompanyData(data);
    let validateGroup = validateGroupData(data);

    if (!validateContractor) {
        return false;
    }

    if (validateCompany === "error") {
        return false;
    }
    else if (validateCompany === "escape") {
        data["contractorCompany"] = "escape";
    }
    else{
        data["contractorCompany"] = "insert";
    }

    if (validateGroup === "error") {
        return false;
    }
    else if (validateGroup === "escape") {
        data["contractorGroup"] = "escape";
    }
    else{
        data["contractorGroup"] = "insert";
    }

    $.ajax({
        url: "/contractor-registration",
        type: "POST",
        data: data,
        dataType: "JSON",
        headers: { "X-Requested-With": "XMLHttpRequest" },

        success: function (data) {
            if (data.status === 1) {
                let id = data.contractor;
                window.location.href = "/contractor-details/" + id;
            } else if (data.status === 3) {
                window.location.href = "/login";
            }
        },
        error: function (jqXHR, exception) {
            alert("Error occurred");
        },
    });
}

function contractorAddressSearch() {
    let zipCode = $("#contractorPostCode").val();
    getAddressFromZipCode(zipCode, "contractorAddress1");
}

function companyAddressSearch() {
    let zipCode = $("#companyPostCode").val();
    getAddressFromZipCode(zipCode, "companyAddress1");
}

function groupAddressSearch() {
    let zipCode = $("#groupPostCode").val();
    getAddressFromZipCode(zipCode, "groupAddress1");
}

function getAddressFromZipCode(zipCode, setAddressId) {
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

function validateContractorData(data) {
    let is_valid = true;

    $("#contractorName").removeClass("error");
    $("#contractorKana").removeClass("error");
    $("#contractorPostCode").removeClass("error");
    $("#contractorAddress1").removeClass("error");
    $("#contractorPhn").removeClass("error");

    if (data["contractorName"] === "") {
        $("#contractorName").addClass("error");
        is_valid = false;
    }
    if (data["contractorKana"] === "") {
        $("#contractorKana").addClass("error");
        is_valid = false;
    }
    if (data["contractorPostCode"] === "") {
        $("#contractorPostCode").addClass("error");
        is_valid = false;
    }

    if (data["contractorAddress1"] === "") {
        $("#contractorAddress1").addClass("error");
        is_valid = false;
    }
    if (data["contractorPhn"] === "") {
        $("#contractorPhn").addClass("error");
        is_valid = false;
    }
    return is_valid;
}

function selectedGroup(data, td) {
    $("#groupId").val($("#groupId" + data).html());
    $("#groupInsert").val("update");
    $("#groupName").val($("#groupName" + data).html());
    $("#groupKana").val($("#groupNameKana" + data).val());
    $("#groupRepresentative").val($("#groupRepresentative" + data).html());
    $("#groupRepresentativeKana").val(
        $("#groupRepresentativeKana" + data).val()
    );
    $("#groupPostCode").val($("#groupPostCode" + data).val());
    $("#groupAddress1").val($("#groupAddress1" + data).html());
    $("#groupAddress2").val($("#groupAddress2" + data).val());
    $("#groupPhn").val($("#groupPhn" + data).html());
    $("#groupMail").val($("#groupMail" + data).html());

    $("#groupSelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#groupModalClose").click();
}

function selectedCompany(data, td) {
    $("#companyId").val($("#companyId" + data).html());
    $("#companyInsert").val("update");
    $("#companyName").val($("#companyName" + data).html());
    $("#companyKana").val($("#companyNameKana" + data).val());
    $("#companyRepresentative").val($("#companyRepresentative" + data).html());
    $("#companyRepresentativeKana").val(
        $("#companyRepresentativeKana" + data).val()
    );
    $("#companyPostCode").val($("#companyPostCode" + data).val());
    $("#companyAddress1").val($("#companyAddress1" + data).html());
    $("#companyAddress2").val($("#companyAddress2" + data).val());
    $("#companyPhn").val($("#companyPhn" + data).html());
    $("#companyMail").val($("#companyMail" + data).html());

    $("#companySelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#companyModalClose").click();
}

function selectedContractor(data, td) {
    $("#contractorId").val($("#contractorId" + data).html());
    $("#contractorInsert").val("update");
    $("#contractorName").val($("#contractorName" + data).html());
    $("#contractorKana").val($("#contractorNameKana" + data).val());
    $("#contractorPostCode").val($("#contractorPostCode" + data).val());
    $("#contractorAddress1").val($("#contractorAddress1" + data).html());
    $("#contractorAddress2").val($("#contractorAddress2" + data).val());
    $("#contractorPhn").val($("#contractorPhn" + data).html());
    $("#contractorMail").val($("#contractorMail" + data).html());

    $("#contractorSelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#contractorModalClose").click();
}

function contractorSearchClear() {
    $("#searchContractorId").val("");
    $("#searchContractorName").val("");
}

function groupSearchClear() {
    $("#searchGroupId").val("");
    $("#searchGroupName").val("");
}

function companySearchClear() {
    $("#searchCompanyId").val("");
    $("#searchCompanyName").val("");
}

function selectedContractorWithCompanyGroup(id, td) {
    let contractorCompany = $("#contractorCompany" + id).val();
    let contractorGroup = $("#contractorGroup" + id).val();
    let contractorCompanyData = contractorCompany.split("=>");
    let contractorGroupData = contractorGroup.split("=>");

    //contractor data populate
    $("#contractorId").val($("#contractorId" + id).html());
    $("#contractorName").val($("#contractorName" + id).html());
    $("#contractorKana").val($("#contractorNameKana" + id).val());
    $("#contractorPostCode").val($("#contractorPostCode" + id).val());
    $("#contractorAddress1").val($("#contractorAddress1" + id).html());
    $("#contractorAddress2").val($("#contractorAddress2" + id).val());
    $("#contractorPhn").val($("#contractorPhn" + id).html());
    $("#contractorMail").val($("#contractorMail" + id).html());
    $("#contractorInsert").val("update");

    $("#updateContractorSelectTable td").removeClass("bg-dark-silver");
    $(td).addClass("bg-dark-silver");
    $("#updateContractorModalClose").click();

    //company data populate
    $("#companyId").val(contractorCompanyData[0]);
    $("#companyName").val(contractorCompanyData[1]);
    $("#companyKana").val(contractorCompanyData[2]);
    $("#companyRepresentative").val(contractorCompanyData[3]);
    $("#companyRepresentativeKana").val(contractorCompanyData[4]);
    $("#companyPostCode").val(contractorCompanyData[5]);
    $("#companyAddress1").val(contractorCompanyData[6]);
    $("#companyAddress2").val(contractorCompanyData[7]);
    $("#companyPhn").val(contractorCompanyData[8]);
    $("#companyMail").val(contractorCompanyData[10]);
    $("#companyInsert").val("update");

    //group data populate
    $("#groupId").val(contractorGroupData[0]);
    $("#groupName").val(contractorGroupData[1]);
    $("#groupKana").val(contractorGroupData[2]);
    $("#groupRepresentative").val(contractorGroupData[3]);
    $("#groupRepresentativeKana").val(contractorGroupData[4]);
    $("#groupPostCode").val(contractorGroupData[5]);
    $("#groupAddress1").val(contractorGroupData[6]);
    $("#groupAddress2").val(contractorGroupData[7]);
    $("#groupPhn").val(contractorGroupData[10]);
    $("#groupMail").val(contractorGroupData[12]);
    $("#groupInsert").val("update");
}

function loadContractorDataTable() {
    // Load data-table data for contractors on modal
    var $contractorDataTable = $("#updateContractorSelectTable");
    $contractorDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url:
                baseUrl +
                "/contractor-registration-get-contractor-data-table-data", // json data source
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
                        "selectedContractorUpdate" + rowData.contractor_id
                    );
                    $(td).attr(
                        "onclick",
                        "selectedContractorWithCompanyGroup(" + row + ", this)"
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
                        "'>" +
                        "<input id='contractorCompany" +
                        row +
                        "' type='hidden' value='" +
                        rowData.company_data +
                        "'>" +
                        "<input id='contractorGroup" +
                        row +
                        "' type='hidden' value='" +
                        rowData.group_data +
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

function loadCompanyDataTable() {
    // Load data-table data for companies on modal
    var $companyDataTable = $("#companySelectTable");
    $companyDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url:
                baseUrl +
                "/contractor-registration-get-company-data-table-data", // json data source
            type: "post",
            data: {},
        },
        columns: [
            {
                data: "company_id",
                render: function (datum, type, row) {
                    return "<a href='javascript:void(0);'>選択</a>";
                },
            },
            { data: "company_id" },
            { data: "company_name" },
            { data: "daihyousha_name" },
            { data: "address_01" },
            { data: "tel_no" },
            { data: "mail_address" },
        ],
        columnDefs: [
            {
                targets: 0,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "selectedCompany" + rowData.company_id);
                    $(td).attr("onclick", "selectedCompany(" + row + ", this)");
                    $(td).attr("data-row-index", row);
                    let hiddenInputs =
                        "<input id='companyNameKana" +
                        row +
                        "' type='hidden' value='" +
                        rowData.company_name_kana +
                        "'>" +
                        "<input id='companyRepresentativeKana" +
                        row +
                        "' type='hidden' value='" +
                        rowData.daihyousha_name_kana +
                        "'>" +
                        "<input id='companyPostCode" +
                        row +
                        "' type='hidden' value='" +
                        rowData.zipcode +
                        "'>" +
                        "<input id='companyAddress2" +
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
                    $(td).attr("id", "companyId" + row);
                },
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "companyName" + row);
                },
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "companyRepresentative" + row);
                },
            },
            {
                targets: 4,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "companyAddress1" + row);
                },
            },
            {
                targets: 5,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "companyPhn" + row);
                },
            },
            {
                targets: 6,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "companyMail" + row);
                },
            },
            { orderable: false, targets: [0, 1, 2, 3, 4, 5, 6] },
        ],
        language: {
            emptyTable: "<h3>データがありません！</h3>",
        },
        bFilter: false, // to display data-table search
        bInfo: false, // to display data-table entries text
    });

    // Submit company search
    $(document).on("submit", "#companySearchForm", function (e) {
        e.preventDefault();
        var companyId = $("#searchCompanyId").val();
        var companyName = $("#searchCompanyName").val();

        $companyDataTable.on("preXhr.dt", function (e, settings, data) {
            data.companyId = companyId;
            data.companyName = companyName;
        });

        $companyDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    // Clear company search
    $(document).on("click", "#clearCompanySearch", function (e) {
        e.preventDefault();
        $("#searchCompanyId").val("");
        $("#searchCompanyName").val("");

        $companyDataTable.on("preXhr.dt", function (e, settings, data) {
            delete data.companyId;
            delete data.companyName;
        });

        $companyDataTable.dataTable().fnDraw();
    });
}

function loadGroupDataTable() {
    // Load data-table data for groups on modal
    var $groupDataTable = $("#groupSelectTable");
    $groupDataTable.DataTable({
        paging: false,
        bProcessing: true,
        serverSide: true,
        scrollCollapse: false,
        ajax: {
            url: baseUrl + "/contractor-registration-get-group-data-table-data", // json data source
            type: "post",
            data: {},
        },
        columns: [
            {
                data: "group_id",
                render: function (datum, type, row) {
                    return "<a href='javascript:void(0);'>選択</a>";
                },
            },
            { data: "group_id" },
            { data: "group_name" },
            { data: "daihyousha_name" },
            { data: "address_01" },
            { data: "tel_no" },
            { data: "mail_address" },
        ],
        columnDefs: [
            {
                targets: 0,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "selectedGroup" + rowData.group_id);
                    $(td).attr("onclick", "selectedGroup(" + row + ", this)");
                    $(td).attr("data-row-index", row);
                    let hiddenInputs =
                        "<input id='groupNameKana" +
                        row +
                        "' type='hidden' value='" +
                        rowData.group_name_kana +
                        "'>" +
                        "<input id='groupRepresentativeKana" +
                        row +
                        "' type='hidden' value='" +
                        rowData.daihyousha_name_kana +
                        "'>" +
                        "<input id='groupPostCode" +
                        row +
                        "' type='hidden' value='" +
                        rowData.zipcode +
                        "'>" +
                        "<input id='groupAddress2" +
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
                    $(td).attr("id", "groupId" + row);
                },
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "groupName" + row);
                },
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "groupRepresentative" + row);
                },
            },
            {
                targets: 4,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "groupAddress1" + row);
                },
            },
            {
                targets: 5,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "groupPhn" + row);
                },
            },
            {
                targets: 6,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr("id", "groupMail" + row);
                },
            },
            { orderable: false, targets: [0, 1, 2, 3, 4, 5, 6] },
        ],
        language: {
            emptyTable: "<h3>データがありません！</h3>",
        },
        bFilter: false, // to display data-table search
        bInfo: false, // to display data-table entries text
    });

    // Submit company search
    $(document).on("submit", "#groupSearchForm", function (e) {
        e.preventDefault();
        var groupId = $("#searchGroupId").val();
        var groupName = $("#searchGroupName").val();

        $groupDataTable.on("preXhr.dt", function (e, settings, data) {
            data.groupId = groupId;
            data.groupName = groupName;
        });

        $groupDataTable.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    // Clear company search
    $(document).on("click", "#clearGroupSearch", function (e) {
        e.preventDefault();
        $("#searchGroupId").val("");
        $("#searchGroupName").val("");

        $groupDataTable.on("preXhr.dt", function (e, settings, data) {
            delete data.groupId;
            delete data.groupName;
        });

        $groupDataTable.dataTable().fnDraw();
    });
}

$(document).ready(function () {
    loadContractorDataTable();

    loadCompanyDataTable();

    loadGroupDataTable();
});

function getContractorRegistrationData(){
    let data = {};
    data["contractorId"] = $("#contractorId").val();
    data["contractorName"] = $("#contractorName").val();
    data["contractorKana"] = $("#contractorKana").val();
    data["contractorPostCode"] = $("#contractorPostCode").val();
    data["contractorAddress1"] = $("#contractorAddress1").val();
    data["contractorAddress2"] = $("#contractorAddress2").val();
    data["contractorPhn"] = $("#contractorPhn").val();
    data["contractorMail"] = $("#contractorMail").val();
    data["contractorInsert"] = $("#contractorInsert").val();

    data["companyId"] = $("#companyId").val();
    data["companyName"] = $("#companyName").val();
    data["companyKana"] = $("#companyKana").val();
    data["companyRepresentative"] = $("#companyRepresentative").val();
    data["companyRepresentativeKana"] = $("#companyRepresentativeKana").val();
    data["companyPostCode"] = $("#companyPostCode").val();
    data["companyAddress1"] = $("#companyAddress1").val();
    data["companyAddress2"] = $("#companyAddress2").val();
    data["companyPhn"] = $("#companyPhn").val();
    data["companyMail"] = $("#companyMail").val();
    data["companyInsert"] = $("#companyInsert").val();

    data["groupId"] = $("#groupId").val();
    data["groupName"] = $("#groupName").val();
    data["groupKana"] = $("#groupKana").val();
    data["groupRepresentative"] = $("#groupRepresentative").val();
    data["groupRepresentativeKana"] = $("#groupRepresentativeKana").val();
    data["groupPostCode"] = $("#groupPostCode").val();
    data["groupAddress1"] = $("#groupAddress1").val();
    data["groupAddress2"] = $("#groupAddress2").val();
    data["groupPhn"] = $("#groupPhn").val();
    data["groupMail"] = $("#groupMail").val();
    data["groupInsert"] = $("#groupInsert").val();

    return data;
}

function validateCompanyData(data){
    let is_valid = true;
    let nonempty = $('.companyRegistrationData').filter(function() {
        return this.value !== ''
    });

    if(nonempty.length > 0){
        $("#companyName").removeClass("error");
        $("#companyKana").removeClass("error");
        $("#companyRepresentative").removeClass("error");
        $("#companyRepresentativeKana").removeClass("error");
        $("#companyPostCode").removeClass("error");
        $("#companyAddress1").removeClass("error");
        $("#companyPhn").removeClass("error");

        if (data["companyName"] === "") {
            $("#companyName").addClass("error");
            is_valid = false;
        }
        if (data["companyKana"] === "") {
            $("#companyKana").addClass("error");
            is_valid = false;
        }
        if (data["companyRepresentative"] === "") {
            $("#companyRepresentative").addClass("error");
            is_valid = false;
        }
        if (data["companyRepresentativeKana"] === "") {
            $("#companyRepresentativeKana").addClass("error");
            is_valid = false;
        }
        if (data["companyPostCode"] === "") {
            $("#companyPostCode").addClass("error");
            is_valid = false;
        }

        if (data["companyAddress1"] === "") {
            $("#companyAddress1").addClass("error");
            is_valid = false;
        }
        if (data["companyPhn"] === "") {
            $("#companyPhn").addClass("error");
            is_valid = false;
        }
    }

    if(nonempty.length > 0){
        if(is_valid){
            return "insert";
        }
        else{
            return "error";
        }
    }
    else{
        return "escape";
    }
}

function validateGroupData(data){
    let is_valid = true;
    let nonempty = $('.groupRegistrationData').filter(function() {
        return this.value !== ''
    });

    if(nonempty.length > 0){
        $("#groupName").removeClass("error");
        $("#groupKana").removeClass("error");
        $("#groupRepresentative").removeClass("error");
        $("#groupPostCode").removeClass("error");
        $("#groupAddress1").removeClass("error");
        $("#groupPhn").removeClass("error");

        if (data["groupName"] === "") {
            $("#groupName").addClass("error");
            is_valid = false;
        }
        if (data["groupKana"] === "") {
            $("#groupKana").addClass("error");
            is_valid = false;
        }
        if (data["groupRepresentative"] === "") {
            $("#groupRepresentative").addClass("error");
            is_valid = false;
        }
        if (data["groupPostCode"] === "") {
            $("#groupPostCode").addClass("error");
            is_valid = false;
        }

        if (data["groupAddress1"] === "") {
            $("#groupAddress1").addClass("error");
            is_valid = false;
        }
        if (data["groupPhn"] === "") {
            $("#groupPhn").addClass("error");
            is_valid = false;
        }
    }

    if(nonempty.length > 0){
        if(is_valid){
            return "insert";
        }
        else{
            return "error";
        }
    }
    else{
        return "escape";
    }
}
