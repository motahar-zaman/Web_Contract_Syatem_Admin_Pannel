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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?= $this->include('modals\companySelect') ?>
        <?= $this->include('modals\groupSelect') ?>
        <div class="wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row col-md-12 pt-2 pl-4">
                            <span class="pl-2">WEB契約システム</span>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <h1 class="mb-0 pt-2 pl-5">仮契約者情報登録</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>
                                    [<?= session()->get("userId")?>]：[<?= session()->get("userName")?>]
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="underline mt-2"></div>
                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title">【契約者情報】</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6 pl-0">
                                            <label for="contractorId">契約者ID</label>
                                            <input class="form-control" type="text" name="contractorId" id="contractorId" value="<?php echo $contractorId ?>" readonly>
                                            <input type="hidden" name="contractorInsert" id="contractorInsert" value="insert">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contractorName" class="required">契約者名</label>
                                            <input class="form-control"  name="contractorName" type="text" id="contractorName" value="<?php old('contractorName')?>">
                                            <span class="errormsg" id="contractorNameError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="contractorPostCode" class="required">郵便番号</label>
                                            <input class="form-control" type="text" name="contractorPostCode" id="contractorPostCode" maxlength="7" value="<?php old('contractorPostCode')?>">
                                            <span class="errormsg" id="contractorPostCodeError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contractorKana" class="required">契約者名カナ</label>
                                            <input class="form-control" name="contractorKana" type="text" id="contractorKana" value="<?php old('contractorKana')?>">
                                            <span class="errormsg" id="contractorKanaError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="contractorAddressSearch">住所検索</label>
                                            <div class="select2-purple">
                                                <button onclick="contractorAddressSearch()" id="contractorAddressSearch" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2">住所検索</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contractorAddress1" class="required">住所１</label>
                                            <input class="form-control" name="contractorAddress1" type="text" id="contractorAddress1" value="<?php old('contractorAddress1')?>">
                                            <span class="errormsg" id="contractorAddress1Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="contractorAddress2">住所２</label>
                                            <input class="form-control" name="contractorAddress2" type="text" id="contractorAddress2" value="<?php old('contractorAddress2')?>">
                                            <span class="errormsg" id="contractorAddress2Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="contractorPhn" class="required">電話番号</label>
                                            <input class="form-control" type="number" name="contractorPhn" id="contractorPhn" value="<?php old('contractorPhn')?>">
                                            <span class="errormsg" id="contractorPhnError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="contractorMail">メールアドレス</label>
                                            <input class="form-control" type="email"  name="contractorMail" id="contractorMail" value="<?php old('contractorMail')?>">
                                            <span class="errormsg" id="contractorMailError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title">【契約者会社情報】</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyId">会社ID</label>
                                            <input class="form-control" type="text" name="companyId" id="companyId" value="<?php echo $companyId ?>" readonly>
                                            <input type="hidden" name="companyInsert" id="companyInsert" value="insert">
                                        </div>
                                        <div class="form-group">
                                            <label for="companyName" class="required">会社名</label>
                                            <input class="form-control"  name="companyName" type="text" id="companyName" value="<?php old('companyName')?>">
                                            <span class="errormsg" id="companyNameError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyRepresentative" class="required">代表者名</label>
                                            <input class="form-control"  name="companyRepresentative" type="text" id="companyRepresentative" value="<?php old('companyRepresentative')?>">
                                            <span class="errormsg" id="companyRepresentativeError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyPostCode" class="required">郵便番号</label>
                                            <input class="form-control" name="companyPostCode" type="text" id="companyPostCode" maxlength="7" value="<?php old('companyPostCode')?>">
                                            <span class="errormsg" id="companyPostCodeError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companySelect">会社選択</label>
                                            <div class="select2-purple">
                                                <button type="button" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#company-select-modal">
                                                    会社選択
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyKana" class="required">会社名カナ</label>
                                            <input class="form-control" name="companyKana" type="text" id="companyKana" value="<?php old('companyKana')?>">
                                            <span class="errormsg" id="companyKanaError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyRepresentativeKana" class="required">代表者名</label>
                                            <input class="form-control" name="companyRepresentativeKana" type="text" id="companyRepresentativeKana" value="<?php old('companyRepresentativeKana')?>">
                                            <span class="errormsg" id="companyRepresentativeKanaError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyAddressSearch">住所検索</label>
                                            <div class="select2-purple">
                                                <button  onclick="companyAddressSearch()" id="companyAddressSearch" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2">住所検索</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="companyAddress1" class="required">住所１</label>
                                            <input class="form-control" name="companyAddress1" type="text" id="companyAddress1" value="<?php old('companyAddress1')?>">
                                            <span class="errormsg" id="companyAddress1Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyAddress2">住所２</label>
                                            <input class="form-control" name="companyAddress2" type="text" id="companyAddress2" value="<?php old('companyAddress2')?>">
                                            <span class="errormsg" id="companyAddress2Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyPhn" class="required">電話番号</label>
                                            <input class="form-control" type="number" name="companyPhn" id="companyPhn" value="<?php old('companyPhn')?>">
                                            <span class="errormsg" id="companyPhnError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyMail">メールアドレス</label>
                                            <input class="form-control" type="email"  name="companyMail" id="companyMail" value="<?php old('companyMail')?>">
                                            <span class="errormsg" id="companyMailError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title">【グループ情報】</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="groupId">グループID</label>
                                            <input class="form-control" type="text" name="groupId" id="groupId" value="<?php echo $groupId ?>" readonly>
                                            <input type="hidden" name="groupInsert" id="groupInsert" value="insert">
                                        </div>
                                        <div class="form-group">
                                            <label for="groupName" class="required">グループ名</label>
                                            <input class="form-control"  name="groupName" type="text" id="groupName" value="<?php old('groupName')?>">
                                            <span class="errormsg" id="groupNameError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupRepresentative" class="required">代表者名</label>
                                            <input class="form-control"  name="groupRepresentative" type="text" id="groupRepresentative" value="<?php old('groupRepresentative')?>">
                                            <span class="errormsg" id="groupRepresentativeError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupPostCode" class="required">郵便番号</label>
                                            <input class="form-control" name="groupPostCode" type="text" id="groupPostCode" maxlength="7" value="<?php old('groupPostCode')?>">
                                            <span class="errormsg" id="groupPostCodeError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="groupSelect">グループ選択</label>
                                            <div class="select2-purple">
                                                <button type="button" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#group-select-modal">
                                                    グループ選択
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupKana" class="required">グループ名カナ</label>
                                            <input class="form-control" name="groupKana" type="text" id="groupKana" value="<?php old('groupKana')?>">
                                            <span class="errormsg" id="groupKanaError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupRepresentativeKana">代表者名カナ</label>
                                            <input class="form-control" name="groupRepresentativeKana" type="text" id="groupRepresentativeKana" value="<?php old('groupRepresentativeKana')?>">
                                            <span class="errormsg" id="groupRepresentativeKanaError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupAddressSearch">住所検索</label>
                                            <div class="select2-purple">
                                                <button onclick="groupAddressSearch()" id="groupAddressSearch" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2">住所検索</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="groupAddress1" class="required">住所１</label>
                                            <input class="form-control" name="groupAddress1" type="text" id="groupAddress1" value="<?php old('groupAddress1')?>">
                                            <span class="errormsg" id="groupAddress1Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupAddress2">住所２</label>
                                            <input class="form-control" name="groupAddress2" type="text" id="groupAddress2" value="<?php old('groupAddress2')?>">
                                            <span class="errormsg" id="groupAddress2Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupPhn" class="required">電話番号</label>
                                            <input class="form-control" type="number" name="groupPhn" id="groupPhn" value="<?php old('groupPhn')?>">
                                            <span class="errormsg" id="groupPhnError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="groupMail">メールアドレス</label>
                                            <input class="form-control"  type="email"  name="groupMail" id="groupMail" value="<?php old('groupMail')?>">
                                            <span class="errormsg" id="groupMailError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row mx-auto pb-3" style="max-width: 950px">
                        <div class="col-md-6 pl-0">
                          <button onclick="contractorRegistration()" id="contractorRegistration" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-1">
                              登録
                          </button>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script type="text/javascript" src="../../js/contractorRegistration.js"></script>
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
        <!-- Page specific script -->
    </body>
</html>
