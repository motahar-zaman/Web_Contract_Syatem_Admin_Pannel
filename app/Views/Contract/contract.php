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
<?= $this->include('modals\contractorSelect') ?>
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
                        <h1 class="mb-0 pt-2 pl-5">契約者情報登録</h1>
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
                        <h3 class="card-title text-center">【契約者登録】
                            <br>
                            Contractor Registration
                        </h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm text-left">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        契約者選択
                                        <br>
                                        Contractor Select
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th>
                                        契約者ID<br>
                                        Contractor ID
                                    </th>
                                    <th>
                                        契約者名<br>
                                        Contractor Name
                                    </th>
                                    <th>
                                        住所<br>
                                        Address</th>
                                    <th>電話番号<br>Phone Number</th>
                                    <th>メールアドレス<br>Mail Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>契約者ID</td>
                                    <td>契約者名</td>
                                    <td>住所</td>
                                    <td>09011112222</td>
                                    <td>abc@egf.jp</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 text-left">
                    <div class="card-header">
                        <h3 class="card-title text-center">【商品登録】<br>Product Registration</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm text-left">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">商品選択<br>Product Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th>商品ID<br>Product ID</th>
                                    <th>商品名<br>Product Name</th>
                                    <th>商品概要<br>Product Summary</th>
                                    <th>公開開始日<br>Period Start Date</th>
                                    <th>公開終了日<br>Period End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>商品ID</td>
                                    <td>商品名</td>
                                    <td>商品概要</td>
                                    <td>YYYY年DD月</td>
                                    <td>YYYY年DD月</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-left">【対象店舗登録】<br>Target Shop Registration</div>
                <div class="card mt-5 text-left">
                    <div class="card-header">
                        <h3 class="card-title text-center">〇既存店舗から選択 <br>Select From Existing Shop</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm text-left">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">店舗選択<br>Shop Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th>店舗ID<br>Shop ID</th>
                                    <th>店舗名<br>Shop Name</th>
                                    <th>代表者<br>Representative Name</th>
                                    <th>都道府県<br>Prefecture</th>
                                    <th>店舗住所<br>Shop Address</th>
                                    <th>電話番号<br>Phone Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>店舗ID</td>
                                    <td>商品名</td>
                                    <td>対象店舗ID</td>
                                    <td>都道府県</td>
                                    <td>商品概要</td>
                                    <td>09011112222</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<!--                <div class="mt-5 text-left">〇店舗を新規登録 <br>Shop Registration</div>-->


            </div>

            <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                <div class="card mt-5 text-left">
                    <div class="card-header">
                        <h3 class="card-title text-center">〇店舗を新規登録 <br>Shop Registration</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">店舗名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ShopName" placeholder="店舗名">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">地域</label>
                                    <div class="col-sm-9">
                                        <select name="District" id="District" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">大エリア</label>
                                    <div class="col-sm-9">
                                        <select name="AreaLarge" id="AreaLarge" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">詳細エリア</label>
                                    <div class="col-sm-9">
                                        <select name="Area" id="Area" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">店舗名カナ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ShopNameKANA" placeholder="テンポメイカナ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">都道府県</label>
                                    <div class="col-sm-9">
                                        <select name="Prefecture" id="Prefecture" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">小エリア</label>
                                    <div class="col-sm-9">
                                        <select name="AreaSmall" id="AreaSmall" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">郵便番号</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="PostCode" class="form-control" id="Post Code" placeholder="NNN-nnnn">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary pl-3 pr-3 text-bold"
                                        data-toggle="modal" data-target="#company-select-modal">
                                    住所検索
                                </button>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">住所０１</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Address1"
                                               type="text" id="Address1"
                                                placeholder="郵便番号で取得できる範囲の住所">
                                        <span class="errormsg" id="Address1Error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">住所０２</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Address2"
                                               type="text" id="Address2"
                                               placeholder="住所０１以外の内容">
                                        <span class="errormsg" id="Address2Error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">電話番号</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="PhoneNumber"
                                               type="text" id="PhoneNumber">
                                        <span class="errormsg" id="PhoneNumberError"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">メールアドレス</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="MailAddress"
                                               type="text" id="MailAddress">
                                        <span class="errormsg" id="MailAddressError"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">業態</label>
                                    <div class="col-sm-9">
                                        <select name="BusinessType" id="BusinessType" class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">届出書</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="NotificationLetter" class="custom-file-input" id="NotificationLetter" placeholder="ファイル名.pdf">
                                        <label class="custom-file-label" for="NotificationLetter">ファイルを選択</label>
                                        <span class="errormsg" id="MailAddressError"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="companySelect">登録商品備考<br>Product Registration Remark</label>
                                    <textarea  class="form-control" name="ProductRegistrationRemark" type="text" id="ProductRegistrationRemark" rows="3"></textarea>
                                    <span class="errormsg" id="ProductRegistrationRemarkError"></span>
                                </div>
                                <button onclick="" id="ProductRegistration"
                                        class="btn btn-primary pl-3 pr-3 text-bold">商品登録<br>Product Registration
                                </button>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="gap-2 mx-auto text-center" style="max-width: 950px">
                    <div class="card mt-5 text-left">
                        <div class="card-header">
                            <h3 class="card-title text-center">【商品情報】<br>Product Info</h3>

                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>商品ID<br>
                                            Product ID</th>
                                        <th>商品名<br>
                                            Product Name</th>
                                        <th>商品概要<br>
                                            Product Summary</th>
                                        <th>公開開始日<br>
                                            Period Start Date</th>
                                        <th>公開終了日<br>
                                            Period End Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>商品ID</td>
                                        <td>商品名</td>
                                        <td>商品概要</td>
                                        <td>公開開始日</td>
                                        <td>公開終了日</td>
                                    </tr>
                                    <tr>
                                        <td>商品ID</td>
                                        <td>商品名</td>
                                        <td>商品概要</td>
                                        <td>公開開始日</td>
                                        <td>公開終了日</td>
                                    </tr>
                                    <tr>
                                        <td>商品ID</td>
                                        <td>商品名</td>
                                        <td>商品概要</td>
                                        <td>公開開始日</td>
                                        <td>公開終了日</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5 text-left">
                        <div class="card-header">
                            <h3 class="card-title text-center">【適用割引サービス一覧】</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm text-left">
                                    <div class="input-group-append">
                                        <button class="btn btn-default">割引内容更新</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>対象商品<br>
                                            Target Product</th>
                                        <th>対象店舗<br>
                                            Target Shop</th>
                                        <th>割引率<br>
                                            Discount Rate</th>
                                        <th>割引名称<br>
                                            Discount Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <button onclick="contractorRegistration()" id="contractorRegistration"
                                class="btn btn-primary pl-3 pr-3 text-bold">登録<br>
                            Registration
                        </button>
                        <button onclick="contractorRegistration()" id="contractorRegistration"
                                class="btn btn-primary pl-3 pr-3 text-bold">メニュー<br>
                            Menu
                        </button>
                    </div>
                    <div class="col-md-6 text-center">
                        <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                    </div>
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