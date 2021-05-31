<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row col-md-12 pt-2 pl-4">
                            <span class="pl-2">WEB契約システム</span>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <h1 class="mb-0 pt-2 pl-5">契約者詳細</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>[<?= session()->get("userId") ?>]：[<?= session()->get("userName") ?>]</span>
                            </div>
                        </div>
                    </div>
                    <div class="underline mt-2"></div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    【契約者情報】
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row " id="shopInputFields">
                                    <div class="col-md-6">
                                        <div id="mySelect">
                                            <div class="form-group " >
                                                <label>契約者ID</label>
                                                <input type="text" class="form-control " name="contractorDetailsId" id="contractorDetailsId" value="<?php echo $contractorDetails->contractor_id; ?>" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>契約者名</label>
                                            <input type="text" name="contractorDetailsName" id="contractorDetailsName" class="form-control" value="<?php echo $contractorDetails->contractor_name; ?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsPostcode" id="contractorDetailsPostcode" class="form-control" value="<?php echo $contractorDetails->zipcode; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>契約者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsContractor" id="contractorDetailsContractor" value="<?php echo $contractorDetails->contractor_name_kana; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsAddress1" type="text" id="contractorDetailsAddress1" value="<?php echo $contractorDetails->address_01; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsAddress2" type="text" id="contractorDetailsAddress2" value="<?php echo $contractorDetails->address_02; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsPhoneNumber" type="text" id="contractorDetailsPhoneNumber" value="<?php echo $contractorDetails->tel_no; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsMailAddress" type="text" id="contractorDetailsMailAddress" value="<?php echo $contractorDetails->mail_address; ?>" readonly>
                                        </div>
                                    </div>
                                    <button onclick="" id="contractorDetailsBtn" class="btn btn-primary ml-2 k1Btn k1Btn2">
                                        <a href="/contractor-update/<?= $contractorDetails->contractor_id ?>">契約者修正</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    【契約者会社情報】
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row " id="shopInputFields">
                                    <div class="col-md-6">
                                        <div id="mySelect">
                                            <div class="form-group " >
                                                <label>会社ID</label>
                                                <input type="text" class="form-control " name="contractorDetailsComId" id="contractorDetailsComId" value="<?php echo $contractorDetails->company_id; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>会社名</label>
                                            <input type="text" name="contractorDetailsComName" id="contractorDetailsComName" class="form-control" value="<?php echo $contractorDetails->company_name; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名</label>
                                            <input type="text" name="contractorDetailsComRepName" id="contractorDetailsComRepName" class="form-control" value="<?php echo $contractorDetails->companyDaihyousha; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsComPostCode" id="contractorDetailsComPostCode" class="form-control" value="<?php echo $contractorDetails->companyZip; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>会社名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsComName2" id="contractorDetailsComName2" value="<?php echo $contractorDetails->company_name_kana; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsComRepName2" id="contractorDetailsComRepName2" value="<?php echo $contractorDetails->companyDaihyoushaKana; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsComAddress1" type="text" id="contractorDetailsComAddress1" value="<?php echo $contractorDetails->companyAddress01; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsComAddress2" type="text" id="contractorDetailsComAddress2" value="<?php echo $contractorDetails->companyAddress02; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsComPhoneNumber" type="text" id="contractorDetailsComPhoneNumber" value="<?php echo $contractorDetails->companyPhn; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsComMailAddress" type="text" id="contractorDetailsComMailAddress" value="<?php echo $contractorDetails->companyMail; ?>" readonly>
                                        </div>
                                    </div>
                                    <button onclick="" id="contractorDetailsComUpdate" class="btn btn-primary ml-2 k1Btn k1Btn2">
                                        <a href="/contractor-update/<?= $contractorDetails->contractor_id ?>">会社修正</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    【グループ情報】
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row " id="shopInputFields">
                                    <div class="col-md-6">
                                        <div id="mySelect">
                                            <div class="form-group " >
                                                <label>グループID</label>
                                                <input type="text" class="form-control " name="contractorDetailsGrpId" id="contractorDetailsGrpId" value="<?php echo $contractorDetails->group_id; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>グループ名</label>
                                            <input type="text" name="contractorDetailsGrpName" id="contractorDetailsGrpName" class="form-control" value="<?php echo $contractorDetails->group_name; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名</label>
                                            <input type="text" name="contractorDetailsGrpRepName" id="contractorDetailsGrpRepName" class="form-control" value="<?php echo $contractorDetails->groupDaihyousha; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsGrpPostCode" id="contractorDetailsGrpPostCode" class="form-control" value="<?php echo $contractorDetails->groupZip; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>グループ名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsGrpName2" id="contractorDetailsGrpName2" value="<?php echo $contractorDetails->group_name_kana; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsGrpRepName2" id="contractorDetailsGrpRepName2" value="<?php echo $contractorDetails->groupDaihyoushaKana; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsGrpAddress1" type="text" id="contractorDetailsGrpAddress1" value="<?php echo $contractorDetails->groupAddress01; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsGrpAddress2" type="text" id="contractorDetailsGrpAddress2" value="<?php echo $contractorDetails->groupAddress02; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsGrpPhoneNumber" type="text" id="contractorDetailsGrpPhoneNumber" value="<?php echo $contractorDetails->groupPhn; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsGrpMailAddress" type="text" id="contractorDetailsGrpMailAddress" value="<?php echo $contractorDetails->groupMail; ?>" readonly>
                                        </div>
                                    </div>
                                    <button onclick="" id="contractorDetailsGrpUpdate" class="btn btn-primary ml-2 k1Btn k1Btn2">
                                        <a href="/contractor-update/<?= $contractorDetails->contractor_id ?>">グループ修正</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row mx-auto pb-3" style="max-width: 950px">
                        <div class="col-md-6 pl-0">
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" href="/home">メニュー</a>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript" src="../../js/contractRegistration.js"></script>
        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="../../plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="../../plugins/moment/moment.min.js"></script>
        <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
    </body>
</html>