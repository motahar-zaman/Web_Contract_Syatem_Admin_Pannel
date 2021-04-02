<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="container-fluid">
        <div class="header">
          <p>WEB契約システム </p>
          <h1>メニュー</h1>
          <p class="mini">	[<?= session()->get("userId")?>]：[<?= session()->get("userName")?>]</p>
        </div>
        <div class="row">
          <div class="menuTable col-5 mt-5 mb-5">
            <div class="card">
              <!-- <div class="card-header">


                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                  <tr class="colorWheat">
                    <th>契約機能</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>契約検索</td>
                    <td>契約情報の検索を行い、画面表示を行います
                  </tr>
                  <tr>
                    <td>契約登録	</td>
                    <td>契約者の新規登録を行います</td>
                  </tr>
                  <tr>
                    <td>契約更新</td>
                    <td>契約者の既存契約更新を行います</td>
                  </tr>
                  <tr>
                    <td>仮契約登録</td>
                    <td>契約者の仮登録を行います（社員のみ可能）</td>
                  </tr>
                  </tbody>
                </table>
                <table class="table table-hover text-nowrap">
                  <thead>
                  <tr class="colorWheat">
                    <th>契約者機能</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>契約者検索</td>
                    <td>契約者情報の検索を行い、画面表示を行います	</td>
                  </tr>
                  <tr>
                    <td>契約者登録	</td>
                    <td>契約者者の新規登録を行います	</td>
                  </tr>
                  <tr>
                    <td>契約者更新	</td>
                    <td>契約者者の既存契約者更新を行います		</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <footer class="loginFooter container-fluid">
          <p class="footertext">アクセス日時：YYYY/MM/DD	</p>
        </footer>
        <!-- /.row -->
      </div>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
