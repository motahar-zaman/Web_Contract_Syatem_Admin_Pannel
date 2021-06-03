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
        <?= $this->include('modals\contractorSelect') ?>
        <?= $this->include('modals\productSelect') ?>
        <?= $this->include('modals\shopSelect') ?>
        <?= $this->include('modals\productDiscountSelect') ?>
        <div class="wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row col-md-12 pt-2 pl-4">
                            <span class="pl-2">WEB契約システム</span>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <h1 class="mb-0 pt-2 pl-5">契約商品情報登録</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>[<?= session()->get("userId") ?>]：[<?= session()->get("userName") ?>]</span>
                            </div>
                        </div>
                    </div>
                    <div class="underline mt-2"></div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <form method="get" id="ContractSearchForm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label>契約ID</label>
                                                <input type="text" class="form-control" name="contractIdSearch" id="contractIdSearch" value="<?php if(isset($contract)) echo $contract->getId(); ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 pt-4">
                                            <label class="pt-4"></label>
                                            <button onclick="checkContractAvailable()" type="button" id="contractorDetailsBtn" class="btn btn-primary ml-2 k1Btn k1Btn2">表示</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group " >
                                        <label>担当者</label>
                                        <select name="tantou" id="tantou" class="form-control">
                                            <option value="0">担当者選択</option>
                                            <?php foreach ($employees as $employee) {
                                                $tantouId = "";
                                                $employeeId = $employee->getId();
                                                if(isset($contract)){
                                                    $tantouId = $contract->getTantouId();
                                                }
                                                ?>
                                                <option value="<?= $employeeId ?>" <?php if($tantouId == $employeeId) {echo "selected";} ?>><?php echo $employee->getName() ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="contractType" id="contractType" value="<?= $type ?>">
                                        <input type="hidden" name="contractId" id="contractId" value="<?php if(isset($contract)) echo $contract->getId() ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center mat-1">【契約者登録】</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm text-left">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#contractor-select-modal">
                                                契約者選択
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table text-center contractorSelectTable">
                                        <thead class="k1RegTableTitleBG">
                                            <tr>
                                                <th>契約者ID</th>
                                                <th>契約者名</th>
                                                <th>住所</th>
                                                <th>電話番号</th>
                                                <th>メールアドレス</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(isset($contract)){
                                                    ?>
                                                    <tr>
                                                        <?php
                                                            $contractorId = $contract->getContractorId();
                                                            foreach ($contractor as $index => $data){
                                                                if($data->getId() == $contractorId){
                                                                    $cName = $data->getName();
                                                                    $cAddress = $data->getAddress01();
                                                                    $cPhn = $data->getTelNo();
                                                                    $cEmail = $data->getMailAddress();
                                                                }
                                                            }
                                                        ?>
                                                        <td id="contractorId"><?= $contractorId ?></td>
                                                        <td id="contractorName"><?= $cName ?></td>
                                                        <td id="contractorAddress1"><?= $cAddress ?></td>
                                                        <td id="contractorPhn"><?= $cPhn ?></td>
                                                        <td id="contractorMail"><?= $cEmail ?></td>
                                                    </tr>
                                                <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center mat-1">【商品登録】</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm text-left">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#product-select-modal">
                                                商品選択
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table text-center productSelectTable">
                                        <thead class="k1RegTableTitleBG">
                                            <tr>
                                                <th>商品ID</th>
                                                <th>商品名</th>
                                                <th>商品概要</th>
                                                <th>公開開始日</th>
                                                <th>公開終了日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-left">【対象店舗登録】</div>
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center mat-1">
                                    <input name="shop" id="shopCheck" type="radio" value="0" onchange="shopTypeCheck()"/>
                                    既存店舗から選択
                                </h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm text-left">
                                        <div class="input-group-append">
                                            <button type="button" id="mySelect" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#shop-select-modal">
                                                店舗選択
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table text-center shopSelectTable">
                                        <thead class="k1RegTableTitleBG">
                                            <tr>
                                                <th>店舗ID</th>
                                                <th>店舗名</th>
                                                <th>代表者</th>
                                                <th>都道府県</th>
                                                <th>店舗住所</th>
                                                <th>電話番号</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    <input name="shop" id="shopCheck2" type="radio" value="1" onchange="shopTypeCheck()"/>
                                    店舗を新規登録
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row " id="shopInputFields">
                                    <div class="col-md-6">
                                        <div id="mySelect">
                                            <div class="form-group " >
                                                <label for="inputEmail3">店舗名</label>
                                                <input type="text" class="form-control " name="shop_name" id="shop_name" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >地域</label>
                                            <select name="district" id="district" class="form-control">
                                                <option value="0"></option>
                                                <?php foreach ($districts as $district) { ?>
                                                <option value="<?php echo $district->getId() ?>"><?php echo $district->getAreaName() ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >大エリア</label>
                                            <select name="areaLarge" id="areaLarge" class="form-control">
                                                <option value="0"></option>
                                                <?php foreach ($areaLarges as $areaLarge) { ?>
                                                    <option value="<?php echo $areaLarge->getId() ?>"><?php echo $areaLarge->getname() ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3">詳細エリア</label>
                                            <select name="area" id="area" class="form-control">
                                                <option value="0"></option>
                                                <?php foreach ($areas as $area) { ?>
                                                    <option value="<?php echo $area->getId() ?>"><?php echo $area->getname() ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" >店舗名カナ</label>
                                            <input type="text" class="form-control" name="shop_name_kana" id="shop_name_kana" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >都道府県</label>
                                            <select name="prefecture" id="prefecture" class="form-control">
                                                <option value="0"></option>
                                                <?php foreach ($prefectures as $prefecture) { ?>
                                                    <option value="<?php echo $prefecture->getId() ?>"><?php echo $prefecture->getname() ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >小エリア</label>
                                            <select name="areaSmall" id="areaSmall" class="form-control">
                                                <option value="0"></option>
                                                <?php foreach ($areaSmalls as $areaSmall) { ?>
                                                    <option value="<?php echo $areaSmall->getId() ?>"><?php echo $areaSmall->getname() ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" >郵便番号</label>
                                            <input type="text" name="postCode" class="form-control" id="postCode" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <label for="shopAddressSearch">住所検索</label>
                                            <div class="select2-purple">
                                                <button onclick="shopAddressSearch()" id="shopAddressSearch" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2">住所検索</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" >住所０１</label>
                                            <input class="form-control" name="address1" type="text" id="address1" value="">
                                            <span class="errormsg" id="Address1Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3">住所０２</label>
                                            <input class="form-control" name="address2" type="text" id="address2" value="">
                                            <span class="errormsg" id="Address2Error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >電話番号</label>
                                            <input class="form-control" name="phone_number" type="text" id="phone_number" value="">
                                            <span class="errormsg" id="PhoneNumberError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" >メールアドレス</label>
                                            <input class="form-control" name="mail_address" type="text" id="mail_address" value="">
                                            <span class="errormsg" id="PhoneNumberError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3">代表者名</label>
                                            <input class="form-control" name="representative_name" type="text" id="representative_name" value="">
                                            <span class="errormsg" id="MailAddressError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" >代表者名カナ</label>
                                            <input class="form-control" name="rep_name_kana" type="text" id="rep_name_kana" value="">
                                            <span class="errormsg" id="MailAddressError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" >店舗サイトURL</label>
                                            <input class="form-control" name="shop_site_url" type="text" id="shop_site_url" value="">
                                            <span class="errormsg" id="MailAddressError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" >業態</label>
                                            <select name="BusinessType" id="BusinessType" class="form-control">
                                                <option value="0"></option>
                                                <option value="1">option 1</option>
                                                <option value="2">option 2</option>
                                                <option value="3">option 3</option>
                                                <option value="4">option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="notification_letter">届出書</label>
                                            <div class="col-sm-12 pl-0">
                                                <input class="form-control h-auto custom-file-input" type="file" id="notification_letter" name="notification_letter" value="">
                                                <span class="errormsg" id="notificationLetterError"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group gap-2 mx-auto" style="max-width: 950px">
                        <div class="form-group mt-5">
                            <label for="companySelect">登録商品備考</label>
                            <textarea class="form-control" name="product_registration_remark" type="text" id="product_registration_remark" rows="3"><?php if(isset($contract)) echo $contract->getNote() ?></textarea>
                            <span class="errormsg" id="ProductRegistrationRemarkError"></span>
                        </div>
                        <button onclick="productRegistration()" id="product_registration" class="btn btn-primary k1Btn k1Btn2">商品登録</button>
                    </div>
                    <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-center">【商品情報】</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center productTable productInfoTable" style="width: 150% !important;">
                                        <thead class="k1RegTableTitleBG">
                                            <tr>
                                                <th>削除</th>
                                                <th>商品ID</th>
                                                <th>商品名</th>
                                                <th style="width: 30%">商品概要</th>
                                                <th>対象店舗名</th>
                                                <th>届出書有無</th>
                                                <th>公開開始日</th>
                                                <th>公開終了日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(isset($contract) && count($contract->getContractProduct()) > 0){
                                                    foreach ($contract->getContractProduct() as $product) {
                                                        ?>
                                                            <tr>
                                                                <td onclick="productInfoRemove(this)" id="productInfoRemove"><a href="#">削除</a></td>
                                                                <td id="productInfoId" ><?= $product['productId'] ?></td>
                                                                <td id="productInfoName" ><?= $product['name'] ?></td>
                                                                <td id="productInfoNote" ><?= $product['note'] ?></td>
                                                                <td id="productInfoShopName" ><?= $product['shopName'] ?></td>
                                                                <td id="productInfoShopFile" >Yes</td>
                                                                <td id="productInfoStart" ><?= $product['startDate'] ?></td>
                                                                <td id="productInfoEnd" ><?= $product['endDate'] ?></td>
                                                                <td style="display: none" id="productInfoShopId" ><?= $product['shopId'] ?></td>
                                                            </tr>
                                                        <?php
                                                    }
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
                                <div class="card-tools">
                                    <div class="input-group input-group-sm text-left">
                                        <div class="input-group-append">
                                            <button  type="button" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" data-toggle="modal" data-target="#product-discount-select-modal-off"
                                                    style="color: black !important; background-color:#D0CECE !important;" disabled>
                                                割引内容更新
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center productDiscountTable">
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
                            <button onclick="contractRegistration()" id="contractorRegistration" class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3">
                                登録
                            </button>
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" href="/home">メニュー</a>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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