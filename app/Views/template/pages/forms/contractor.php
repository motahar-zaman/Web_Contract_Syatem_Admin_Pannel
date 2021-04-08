<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="container-fluid">
    <div class="row">
      <div class="row col-md-12 pt-2 pl-4">
        <span class="pl-2">WEB契約システム</span>
      </div>
      <div class="row col-md-12">
        <div class="col-md-6">
          <h1 class="mb-0 pt-2 pl-5">契約者情報登録</h1>
        </div>
        <div class="col-md-6 text-right pt-4 pr-5">
            <span>
              [<?= session()->get("userId")?>]：[<?= session()->get("userName")?>]
            </span>
        </div>
      </div>
    </div>
    <div class="underline mt-2"></div>
    <div class="row pt-5 pl-5">
      <div class="contractor-form pl-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">【契約者情報】</h3>
          </div>
          <div class="card-body">
            <table class="table" id="contractor-table">
              <tbody>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">契約者ID(contractorId)</td>
                  <td class="col-4">
                    <input name="contractorId" type="text" id="contractorId" value="<?php old('contractorId')?>abcd" readonly>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="contractorSelect" class="col-2 bg-dark-silver">契約者選択(contractorSelect)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">契約者名(contractorName)</td>
                  <td class="col-4">
                    <input name="contractorName" type="text" id="contractorName" value="<?php old('contractorName')?>" required>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td class="col-2 bg-light-sky">契約者名カナ(contractorKana)</td>
                  <td class="col-4">
                    <input name="contractorKana" type="text" id="contractorKana" value="<?php old('contractorKana')?>" required>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">郵便番号(contractorPostCode)</td>
                  <td class="col-4">
                    <input name="contractorPostCode" type="text" id="contractorPostCode" value="<?php old('contractorPostCode')?>" required>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="contractorAddressSearch" class="col-2 bg-dark-silver">住所検索(contractorAddressSearch)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所１(contractorAddress1)</td>
                  <td class="col-10">
                    <input name="contractorAddress1" type="text" id="contractorAddress1" value="<?php old('contractorAddress1')?>" required>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所２(contractorAddress2)</td>
                  <td class="col-10">
                    <input name="contractorAddress2" type="text" id="contractorAddress2" value="<?php old('contractorAddress2')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">電話番号(contractorPhn)</td>
                  <td class="col-10">
                    <input name="contractorPhn" type="text" id="contractorPhn" value="<?php old('contractorPhn')?>" required>
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">メールアドレス(contractorMail)</td>
                  <td class="col-10">
                    <input name="contractorMail" type="text" id="contractorMail" value="<?php old('contractorMail')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5 pl-5">
      <div class="contractor-form pl-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">【契約者会社情報】</h3>
          </div>
          <div class="card-body">
            <table class="table" id="company-table">
              <tbody>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">会社ID(companyId)</td>
                  <td class="col-4">
                    <input name="companyId" type="text" id="companyId" value="<?php old('companyId')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="companySelect" class="col-2 bg-dark-silver">会社選択(companySelect)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">会社名(companyName)</td>
                  <td class="col-4">
                    <input name="companyName" type="text" id="companyName" value="<?php old('companyName')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td class="col-2 bg-light-sky">会社名カナ(companyKana)</td>
                  <td class="col-4">
                    <input name="companyKana" type="text" id="companyKana" value="<?php old('companyKana')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">代表者名(companyRepresentative)</td>
                  <td class="col-4">
                    <input name="companyRepresentative" type="text" id="companyRepresentative" value="<?php old('companyRepresentative')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td class="col-2 bg-light-sky">代表者名(companyRepresentativeKana)</td>
                  <td class="col-4">
                    <input name="companyRepresentativeKana" type="text" id="companyRepresentativeKana" value="<?php old('companyRepresentativeKana')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">郵便番号(companyPostCode)</td>
                  <td class="col-4">
                    <input name="companyPostCode" type="text" id="companyPostCode" value="<?php old('companyPostCode')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="companyAddressSearch" class="col-2 bg-dark-silver">住所検索(companyAddressSearch)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所１(companyAddress1)</td>
                  <td class="col-10">
                    <input name="companyAddress1" type="text" id="companyAddress1" value="<?php old('companyAddress1')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所２(companyAddress2)</td>
                  <td class="col-10">
                    <input name="companyAddress2" type="text" id="companyAddress2" value="<?php old('companyAddress2')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">電話番号(companyPhn)</td>
                  <td class="col-10">
                    <input name="companyPhn" type="text" id="companyPhn" value="<?php old('companyPhn')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">メールアドレス(companyMail)</td>
                  <td class="col-10">
                    <input name="companyMail" type="text" id="companyMail" value="<?php old('companyMail')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5 pl-5">
      <div class="contractor-form pl-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">【グループ情報】</h3>
          </div>
          <div class="card-body">
            <table class="table" id="group-table">
              <tbody>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">グループID(groupId)</td>
                  <td class="col-4">
                    <input name="groupId" type="text" id="groupId" value="<?php old('groupId')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="groupSelect" class="col-2 bg-dark-silver">グループ選択(groupSelect)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">グループ選択(groupName)</td>
                  <td class="col-4">
                    <input name="groupName" type="text" id="groupName" value="<?php old('groupName')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td class="col-2 bg-light-sky">グループ名カナ(groupKana)</td>
                  <td class="col-4">
                    <input name="groupKana" type="text" id="groupKana" value="<?php old('groupKana')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">代表者名(groupRepresentative)</td>
                  <td class="col-4">
                    <input name="groupRepresentative" type="text" id="groupRepresentative" value="<?php old('groupRepresentative')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td class="col-2 bg-light-sky">代表者名カナ(groupRepresentativeKana)</td>
                  <td class="col-4">
                    <input name="groupRepresentativeKana" type="text" id="groupRepresentativeKana" value="<?php old('groupRepresentativeKana')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">郵便番号(groupPostCode)</td>
                  <td class="col-4">
                    <input name="groupPostCode" type="text" id="groupPostCode" value="<?php old('groupPostCode')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                  <td id="groupAddressSearch" class="col-2 bg-dark-silver">住所検索(groupAddressSearch)</td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所１(groupAddress1)</td>
                  <td class="col-10">
                    <input name="groupAddress1" type="text" id="groupAddress1" value="<?php old('groupAddress1')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">住所２(groupAddress2)</td>
                  <td class="col-10">
                    <input name="groupAddress2" type="text" id="groupAddress2" value="<?php old('groupAddress2')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">電話番号(groupPhn)</td>
                  <td class="col-10">
                    <input name="groupPhn" type="text" id="groupPhn" value="<?php old('groupPhn')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
                <tr class="row ml-0 mr-0">
                  <td class="col-2 bg-light-sky">メールアドレス(groupMail)</td>
                  <td class="col-10">
                    <input name="groupMail" type="text" id="groupMail" value="<?php old('groupMail')?>">
                    <span class="errormsg" id="contractorNameError"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="underline"></div>
    <div class="row pt-3 pb-3 pl-5">
      <div class="col-md-6 text-left pl-5">
        <button id="ContractorRegistration" class="button-primary pl-3 pr-3 text-bold">登録</button>
      </div>
      <div class="col-md-6 text-right pr-5">
        <span>アクセス日時：<?= date("Y/m/d")?>	</span>
      </div>
    </div>
  </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>

      $( document ).ready(function() {
        var request;
        $("#ContractorRegistration").click(function (event){
          var data = {};
          data["contractorId"] = $("#contractorId").val();
          data["contractorName"] = $("#contractorName").val();
          data["contractorKana"] = $("#contractorKana").val();
          data["contractorPostCode"] = $("#contractorPostCode").val();
          data["contractorAddress1"] = $("#contractorAddress1").val();
          data["contractorAddress2"] = $("#contractorAddress2").val();
          data["contractorPhn"] = $("#contractorPhn").val();
          data["contractorMail"] = $("#contractorMail").val();

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

          if(validateData(data)){
            event.preventDefault();
            if (request) {
              request.abort();
            }

            request = $.ajax({
              url: "/contractor-registration",
              type: "POST",
              data: data,
              dataType:'JSON',

              success: function(data){
                if(data.status === 1){
                  window.location.href = "/home";
                }

              },
              error: function (jqXHR, exception){
                console.log("Error occured");
              }
            });
          }
        });
      });


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

    </script>
  </body>
</html>
