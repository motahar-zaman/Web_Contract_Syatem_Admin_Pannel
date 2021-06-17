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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <h1 class="mb-0 pt-2 pl-5">見積</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>[<?= session()->get("userId") ?>]：[<?= session()->get("userName") ?>]</span>
                            </div>
                        </div>
                    </div>
                    <div class="underline mt-2"></div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 1050px">
                        <div class="row col-md-12">
                            <div class="col-md-6" style="margin-left: -15px">
                                <div class="card-body" style="margin-left: -15px">
                                    <div class="card-body table-responsive p-0" style="border: 1px solid gray">
                                        <table class="table table-hover text-center">
                                            <thead class="">
                                            <tr>
                                                <th>見積額（税抜</th>
                                                <th>消費税額等</th>
                                                <th>お見積額（合計）</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="priceExcludingTax"></td>
                                                    <td id="totalTax"></td>
                                                    <td id="priceIncludingTax"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 1050px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-bold text-center">【詳細】</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center">
                                        <thead class="k1TableTitleBG">
                                            <tr>
                                                <th class="align-middle" rowspan="2">名称</th>
                                                <th colspan="2">契約期間</th>
                                                <th class="align-middle" rowspan="2">税抜価格</th>
                                                <th class="align-middle" rowspan="2">摘要</th>
                                            </tr>
                                            <tr>
                                                <th>開始日</th>
                                                <th>終了日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $productPrice = 0;
                                                $tax = 0;
                                                if (isset($contractDetails)){
                                                    $products = $contractDetails->getContractProduct();
                                                    $count = count($products);
                                                    if(isset($products) && $count > 0){
                                                        for($i = 0; $i < $count; $i++ ){
                                                            $product = $products[$i];
                                                            $startDate = date("Y",strtotime($product["startDate"]))."年".date("m",strtotime($product["startDate"]))."月".date("d",strtotime($product["startDate"]))."日";
                                                            $endDate = date("Y",strtotime($product["endDate"]))."年".date("m",strtotime($product["endDate"]))."月".date("d",strtotime($product["endDate"]))."日";
                                                            $productPrice += $product["price"];
                                                            ?>
                                                            <tr>
                                                                <td><?= $product["name"] ?></td>
                                                                <td><?= $startDate ?></td>
                                                                <td><?= $endDate ?></td>
                                                                <td><?= $product["price"] ?></td>
                                                                <td><?= $product["shopName"] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }

                                                if (isset($contractRingis) && count($contractRingis) > 0){
                                                    $count = count($contractRingis);
                                                    for($i = 0; $i < $count; $i++ ){
                                                        $ringi = $contractRingis[$i];
                                                        $ringiStart = $ringi->getStartDate();
                                                        $ringiEnd = $ringi->getEndDate();
                                                        $startDate = date("Y",strtotime($ringiStart))."年".date("m",strtotime($ringiStart))."月".date("d",strtotime($ringiStart))."日";
                                                        $endDate = date("Y",strtotime($ringiEnd))."年".date("m",strtotime($ringiEnd))."月".date("d",strtotime($ringiEnd))."日";
                                                        $discount = $ringi->getAfterSummaryPrice() - $ringi->getBeforeSummaryPrice();
                                                        $productPrice += $discount;
                                                        ?>
                                                        <tr>
                                                            <td>【割引】<?= $ringi->getTypeCodeName()."/".$ringi->getTargetAreaCodeName() ?></td>
                                                            <td><?= $startDate ?></td>
                                                            <td><?= $endDate ?></td>
                                                            <td><?= $discount ?></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $tax = $productPrice /100 * contract_product_tax;
                                            ?>
                                            <span class="d-none" id="productPrice"><?= $productPrice ?></span>
                                            <span class="d-none" id="tax"><?= $tax ?></span>
                                            <span class="d-none" id="priceWithTax"><?= $productPrice + $tax ?></span>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row mx-auto pb-3" style="max-width: 1050px">
                        <div class="col-md-6 pl-0">
                            <?php
                            if(isset($_SERVER['HTTP_REFERER'])){
                                $url= $_SERVER['HTTP_REFERER'];
                            }
                            else{
                                $url = "/contract-details/".$contractDetails->getId();
                            }
                            ?>
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="<?= $url ?>">戻る</a>
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" href="/home">メニュー</a>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script type="text/javascript" src="../../js/estimation.js"></script>
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