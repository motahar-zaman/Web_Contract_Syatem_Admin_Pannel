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
                                                <th>見積額（税抜） <br>Est. amount (Tax-ex)</th>
                                                <th>消費税額等 <br> tax amount</th>
                                                <th>お見積額（合計）</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (isset($contractDetails)){
                                                        $products = $contractDetails->getContractProduct();
                                                        $count = count($products);
                                                        $price = 0;
                                                        $tax = 0;
                                                        if(isset($products) && $count > 0){
                                                            for($i = 0; $i < $count; $i++ ){
                                                                $price += $products[$i]["price"];
                                                            }
                                                            $tax = $price / 100 * contract_product_tax;
                                                        }
                                                        ?>
                                                            <tr>
                                                                <td><?= $price ?></td>
                                                                <td><?= $tax ?></td>
                                                                <td><?= $price+$tax ?></td>
                                                            </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <div class="card-body" style="margin-left: -15px">
                                    <div class="card-body table-responsive p-0" style="border: 1px solid gray; width: 35%">
                                        <table class="table table-hover text-center ">
                                            <thead class="k1TableTitleBG">
                                                <tr>
                                                    <th>税抜御請求額 <br>Tax-inc billing amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $price+$tax ?></td>
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
                                <h3 class="card-title text-bold text-center">[契約商品] <br>Contract Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center">
                                        <thead class="k1TableTitleBG">
                                            <tr>
                                                <th style="width: 17%">商品名 <br>Product Name</th>
                                                <th style="width: 20%">契約期間 <br>Contract period</th>
                                                <th style="width: 11%">請求月 <br>Billing month</th>
                                                <th>税抜価格 <br>Price Tax-ex</th>
                                                <th>摘要 <br>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($contractDetails)){
                                                    $products = $contractDetails->getContractProduct();
                                                    $count = count($products);
                                                    if(isset($products) && $count > 0){
                                                        for($i = 0; $i < $count; $i++ ){
                                                            $product = $products[$i];
                                                            $startDate = date("Y",strtotime($product["startDate"]))."年".date("m",strtotime($product["startDate"]))."月";
                                                            $endDate = date("Y",strtotime($product["endDate"]))."年".date("m",strtotime($product["endDate"]))."月";
                                                            ?>
                                                                <tr>
                                                                    <td><?= $product["name"] ?></td>
                                                                    <td><?= $startDate ." - ". $endDate ?></td>
                                                                    <td>YYYY年12月</td>
                                                                    <td><?= $product["price"] ?></td>
                                                                    <td><?= $product["note"] ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-2 mx-auto text-center" style="max-width: 1050px">
                        <div class="card mt-5 text-left">
                            <div class="card-header">
                                <h3 class="card-title text-bold text-center">[適用割引サービス]</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-center">
                                        <thead class="k1TableTitleBG">
                                            <tr>
                                                <th>割引サービス名 <br>Discount service name</th>
                                                <th>割引率 <br>Dis. Rate</th>
                                                <th>割引額 <br>Discount amount</th>
                                                <th>摘要 <br>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ぴゅあらば3ヶ月割</td>
                                                <td>20%</td>
                                                <td>10000</td>
                                                <td>{$shopId}【デリヘル遠藤　青梅店】契約初月のみ適用</td>
                                            </tr>
                                            <tr>
                                                <td>ぴゅあらば3ヶ月割</td>
                                                <td>20%</td>
                                                <td>10000</td>
                                                <td>{$shopId}【デリヘル遠藤　青梅店】契約初月のみ適用</td>
                                            </tr>
                                            <tr>
                                                <td>ぴゅあらば3ヶ月割</td>
                                                <td>20%</td>
                                                <td>10000</td>
                                                <td>{$shopId}【デリヘル遠藤　青梅店】契約初月のみ適用</td>
                                            </tr>
                                            <tr>
                                                <td>ぴゅあらば3ヶ月割</td>
                                                <td>20%</td>
                                                <td>10000</td>
                                                <td>{$shopId}【デリヘル遠藤　青梅店】契約初月のみ適用</td>
                                            </tr>
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
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2 mr-3" href="/contract-details/<?= $contractDetails->getId() ?>">戻る</a>
                            <a class="btn btn-primary pl-3 pr-3 k1Btn k1Btn2" href="/home">メニュー</a>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <span>アクセス日時：<?= date("Y/m/d") ?>	</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script type="text/javascript" src="../../js/contractorSearch.js"></script>
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