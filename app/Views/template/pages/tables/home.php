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
  <body class="bgLightSilver">
    <div class="wrapper">
      <div class="container-fluid">
        <div class="col-md-12 row">
          <div class="col-md-6 pt-2">
            <span>WEB契約システム </span>
            <span><h1 class="mb-0 pt-2">メニュー</h1></span>
          </div>
          <div class="col-md-6 text-right pt-2">
            <button class="fc-button mb-3"><a href="/logout">Sign Out</a></button><br>
            <span class="mt-5">	[<?= session()->get("userId")?>]：[<?= session()->get("userName")?>]</span>
          </div>
        </div>
        <div class="row">
          <div class="underline mt-2"></div>
          <div class="menuTable col-5 mt-5 mb-5">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                  <tr class="bgWheat">
                    <th>契約機能(contract)</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">契約検索(search)</a></td>
                    <td>契約情報の検索を行い、画面表示を行います
                  </tr>
                  <?php if(session()->get("user") == "employee"){ ?>
                    <tr>
                      <td><a href="#">契約登録(reg)</a></td>
                      <td>契約者の新規登録を行います</td>
                    </tr>
                    <tr>
                      <td><a href="#">契約更新(update)</a></td>
                      <td>契約者の既存契約更新を行います</td>
                    </tr>
                    <tr>
                      <td><a href="#">仮契約登録(temp reg)</a></td>
                      <td>契約者の仮登録を行います（社員のみ可能）</td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr class="bgWheat">
                      <th>契約者機能(contractor)</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#">契約者検索(search)</a></td>
                      <td>契約者情報の検索を行い、画面表示を行います	</td>
                    </tr>
                    <tr>
                      <td><a href="/contractor-registration">契約者登録(reg)</a></td>
                      <td>契約者者の新規登録を行います	</td>
                    </tr>
                    <tr>
                      <td><a href="#">契約者更新(update)</a></td>
                      <td>契約者者の既存契約者更新を行います		</td>
                    </tr>
                    <?php if(session()->get("user") == "employee"){ ?>
                      <tr>
                        <td><a href="/temp-contractor-registration">仮契約者更新(temp reg)</a></td>
                        <td>契約者の仮登録を行います（社員のみ可能）</td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="underline"></div>
        <div class="loginFooter">
          <p class="pt-3">アクセス日時：<?= date("Y/m/d")?>	</p>
        </div>
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
