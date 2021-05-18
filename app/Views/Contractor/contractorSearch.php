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
                                <h1 class="mb-0 pt-2 pl-5">契約者選択</h1>
                            </div>
                            <div class="col-md-6 text-right pt-4 pr-5">
                                <span>[<?= session()->get("userId")?>]：[<?= session()->get("userName")?>]</span>
                            </div>
                        </div>
                    </div>
                    <div class="underline mt-2"></div>
                    <div class="modal-body">
                        <form>
                            <div class="card-body">
                                <div class="form-group col-md-4 pl-0">
                                    <label for="exampleInputEmail1">契約者ID（完全一致）</label>
                                    <input type="text" class="form-control" id="searchById", name="searchById" placeholder="">
                                </div>
                                <div class="form-group col-md-4 pl-0">
                                    <label for="exampleInputPassword1">契約者名（あいまい）</label>
                                    <input type="text" class="form-control" id="searchByName" name="searchByName" placeholder="">
                                </div>
                                <button type="submit" id="contractorSearch" class="btn btn-primary pl-4 pr-4 k1Btn mr-1">検索</button>
                                <button type="button" id="clearSearchText" class="btn btn-primary ml-2 k1Btn">条件クリア</button>
                            </div>
                        </form>
                        <br />
                        <div class="card-body table-responsive p-0 ml-1">
                            <table class="table table-head-fixed text-nowrap ml-1">
                                <thead>
                                <tr>
                                    <th>選択</th>
                                    <th>契約者ID</th>
                                    <th>契約者名	</th>
                                    <th>住所</th>
                                    <th>電話番号</th>
                                    <th>メールアドレス</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($contractor) && count($contractor) > 0){
                                    for($i = 0; $i < count($contractor); $i++){
                                        $data = $contractor[$i];
                                        ?>
                                        <tr>
                                            <td onclick="selectedContractor(<?php echo $i ?>)" id="selectedContractor<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                            <td id="contractorId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                            <td id="contractorName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                            <td id="contractorAddress1<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                            <td id="contractorPhn<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                            <td id="contractorMail<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<h3>No data available</h3>";
                                }
                                ?>
                                </tbody>
                            </table>
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
