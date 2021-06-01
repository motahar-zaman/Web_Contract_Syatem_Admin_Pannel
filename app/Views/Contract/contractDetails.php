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
                                <h1 class="mb-0 pt-2 pl-5">契約詳細</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>[<?= session()->get("userId") ?>]：[<?= session()->get("userName") ?>]</span>
                            </div>
                        </div>
                    </div>

                    <div class="underline mt-2"></div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <form method="get" id="ContractSearchFromDetails" action="/contract-search">
                                <div class="card-body">
                                    <div class="row " id="contractIdSearchFields">
                                        <div class="col-md-6">
                                            <div class="form-group " >
                                                <label>契約ID</label>
                                                <input type="text" class="form-control " name="contractIdSearch" id="contractIdSearch" value="<?= $contract->getId() ?? "" ?>" >
                                            </div>
                                            <div class="form-group " >
                                                <?php
                                                    $status = $contract->getStatus();
                                                    $text = "Not defined";
                                                    if($status == 2){
                                                        $text = "仮契約";
                                                    }
                                                    elseif($status == 3){
                                                        $text = "内部確認01";
                                                    }
                                                    if($status == 6){
                                                        $text = "成約";
                                                    }
                                                    if($status == 7){
                                                        $text = "契約更新";
                                                    }
                                                ?>
                                                <label>契約ステータス</label>
                                                <input type="text" class="form-control " name="contractStatus" id="contractStatus" value="<?= $text ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pt-4">
                                            <label class="pt-4"></label>
                                            <button onclick="checkContractAvailableFromDetails()" type="button" id="contractorDetailsBtn" class="btn btn-primary ml-2 k1Btn k1Btn2">表示</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

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
                                                <input type="text" class="form-control " name="contractorDetailsId" id="contractorDetailsId" value="<?= $contractorDetails->contractor_id ?? ""; ?>" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>契約者名</label>
                                            <input type="text" name="contractorDetailsName" id="contractorDetailsName" class="form-control" value="<?= $contractorDetails->contractor_name ?? ""; ?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsPostcode" id="contractorDetailsPostcode" class="form-control" value="<?= $contractorDetails->zipcode ?? ""; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-right mt-4">
                                            <a class="btn btn-primary k1Btn k1Btn2" href="/contractor-update/<?= $contractorDetails->contractor_id ?? "" ?>">契約者修正</a>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label>契約者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsContractor" id="contractorDetailsContractor" value="<?= $contractorDetails->contractor_name_kana ?? ""; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsAddress1" type="text" id="contractorDetailsAddress1" value="<?= $contractorDetails->address_01 ?? ""; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsAddress2" type="text" id="contractorDetailsAddress2" value="<?= $contractorDetails->address_02 ?? ""; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsPhoneNumber" type="text" id="contractorDetailsPhoneNumber" value="<?= $contractorDetails->tel_no ?? ""; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsMailAddress" type="text" id="contractorDetailsMailAddress" value="<?= $contractorDetails->mail_address ?? ""; ?>" readonly>
                                        </div>
                                    </div>
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
                                                <input type="text" class="form-control " name="contractorDetailsComId" id="contractorDetailsComId" value="<?= $contractorDetails->company_id ?? "" ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>会社名</label>
                                            <input type="text" name="contractorDetailsComName" id="contractorDetailsComName" class="form-control" value="<?= $contractorDetails->company_name ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名</label>
                                            <input type="text" name="contractorDetailsComRepName" id="contractorDetailsComRepName" class="form-control" value="<?= $contractorDetails->companyDaihyousha ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsComPostCode" id="contractorDetailsComPostCode" class="form-control" value="<?= $contractorDetails->companyZip ?? "" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-right mt-4">
                                            <a class="btn btn-primary ml-2 k1Btn k1Btn2" href="/contractor-update/<?= $contractorDetails->contractor_id ?? "" ?>">会社修正</a>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label>会社名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsComName2" id="contractorDetailsComName2" value="<?= $contractorDetails->company_name_kana ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsComRepName2" id="contractorDetailsComRepName2" value="<?= $contractorDetails->companyDaihyoushaKana ?? "" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsComAddress1" type="text" id="contractorDetailsComAddress1" value="<?= $contractorDetails->companyAddress01 ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsComAddress2" type="text" id="contractorDetailsComAddress2" value="<?= $contractorDetails->companyAddress02 ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsComPhoneNumber" type="text" id="contractorDetailsComPhoneNumber" value="<?= $contractorDetails->companyPhn ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsComMailAddress" type="text" id="contractorDetailsComMailAddress" value="<?= $contractorDetails->companyMail ?? "" ?>" readonly>
                                        </div>
                                    </div>
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
                                                <input type="text" class="form-control " name="contractorDetailsGrpId" id="contractorDetailsGrpId" value="<?= $contractorDetails->group_id ?? "" ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>グループ名</label>
                                            <input type="text" name="contractorDetailsGrpName" id="contractorDetailsGrpName" class="form-control" value="<?= $contractorDetails->group_name ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名</label>
                                            <input type="text" name="contractorDetailsGrpRepName" id="contractorDetailsGrpRepName" class="form-control" value="<?= $contractorDetails->groupDaihyousha ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>郵便番号</label>
                                            <input type="text" name="contractorDetailsGrpPostCode" id="contractorDetailsGrpPostCode" class="form-control" value="<?= $contractorDetails->groupZip ?? "" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-right mt-4">
                                            <a class="btn btn-primary ml-2 k1Btn k1Btn2" href="/contractor-update/<?= $contractorDetails->contractor_id ?? "" ?>">グループ修正</a>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label>グループ名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsGrpName2" id="contractorDetailsGrpName2" value="<?= $contractorDetails->group_name_kana ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>代表者名カナ</label>
                                            <input type="text" class="form-control" name="contractorDetailsGrpRepName2" id="contractorDetailsGrpRepName2" value="<?= $contractorDetails->groupDaihyoushaKana ?? "" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>住所１</label>
                                            <input class="form-control" name="contractorDetailsGrpAddress1" type="text" id="contractorDetailsGrpAddress1" value="<?= $contractorDetails->groupAddress01 ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>住所２</label>
                                            <input class="form-control" name="contractorDetailsGrpAddress2" type="text" id="contractorDetailsGrpAddress2" value="<?= $contractorDetails->groupAddress02 ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>電話番号</label>
                                            <input class="form-control" name="contractorDetailsGrpPhoneNumber" type="text" id="contractorDetailsGrpPhoneNumber" value="<?= $contractorDetails->groupPhn ?? "" ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            <input class="form-control" name="contractorDetailsGrpMailAddress" type="text" id="contractorDetailsGrpMailAddress" value="<?= $contractorDetails->groupMail ?? "" ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group gap-2 mx-auto" style="max-width: 950px">
                        <div class="row">
                            <div class="col-md-9 pl-0">
                                <div class="form-group mt-5">
                                    <label for="companySelect">登録商品備考</label>
                                    <textarea class="form-control" name="product_registration_remark" type="text" id="product_registration_remark" rows="3" readonly>
                                        <?= $contract->getNote() ?>
                                    </textarea>
                                    <span class="errormsg" id="ProductRegistrationRemarkError"></span>
                                </div>
                            </div>
                            <div class="col-md-3 mt-5">
                                <div class="form-group text-right mt-5">
                                    <a class="btn btn-primary k1Btn k1Btn2" href="/contract-update/<?= $contract->getId() ?>">契約修正</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">【契約商品一覧】</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center" style="width: 130% !important;">
                                        <thead class="k1RegTableTitleBG">
                                            <tr>
                                                <th>商品ID</th>
                                                <th>商品名</th>
                                                <th style="width: 40%">商品概要</th>
                                                <th>対象店舗名</th>
                                                <th>届出書有無</th>
                                                <th>公開開始日</th>
                                                <th>公開終了日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $products = $contract->getContractProduct();
                                                $shopName = $contract->getshopDetail()->getName();
                                                if(isset($products) && count($products) > 0){
                                                    for($i = 0; $i < count($products); $i++){
                                                        $data = $products[$i];
                                                        $startDate = $data["startDateYear"]."年".$data["startDateMonth"]."月";
                                                        $endDate = $data["endDateYear"]."年".$data["endDate_Month"]."月";
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data["productId"] ?></td>
                                                            <td><?php echo $data["name"] ?></td>
                                                            <td><?php echo $data["note"] ?></td>
                                                            <td><?php echo $shopName ?></td>
                                                            <td>Yes</td>
                                                            <td><?php echo $startDate ?></td>
                                                            <td><?php echo $endDate ?></td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                                else{
                                                    echo "データがありません！";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center mat-1">【適用割引サービス一覧】</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center">
                                        <thead class="k1RegTableTitleBG">
                                        <tr>
                                            <th>対象商品</th>
                                            <th>対象店舗</th>
                                            <th>割引率</th>
                                            <th>割引名称</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row mx-auto pb-3" style="max-width: 950px">
                        <div class="col-md-6 pl-0">
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="#estimation"> 見積 </a>
                            <?php
                                if(session()->get('user') == "contractor"){
                                    if($contract->getStatus() == 2 || $contract->getStatus() == 7){
                                    ?>
                                        <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="/contract-status-update/<?= $contract->getId() ?>/3">承認</a>
                                        <?php
                                    }
                                }
                                elseif(session()->get('user') == "employee"){
                                    if($contract->getStatus() == 3){
                                        ?>
                                        <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="/contract-status-update/<?= $contract->getId() ?>/6">承認</a>
                                        <?php
                                    }
                                }
                            ?>
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="/home">メニュー</a>
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