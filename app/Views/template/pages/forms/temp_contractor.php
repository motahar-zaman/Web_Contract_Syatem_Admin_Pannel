<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;  ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="hold-transition sidebar-mini">
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
      <div class="row pt-5">
        <div class="col-md-6 pl-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">【契約者情報】</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">契約者ID</td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">契約者名</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-light-sky">契約者名カナ</td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">郵便番号 </td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-dark-silver">住所検索</td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所１</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所２</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">電話番号</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">メールアドレス</td>
                  <td class="col-10"></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-md-6 pl-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">【契約者会社情報】</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">会社ID</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-dark-silver">会社選択 </td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">会社名</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-light-sky">会社名カナ</td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">代表者名</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-light-sky">代表者名</td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">郵便番号</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-dark-silver">住所検索 </td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所１</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所２</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">電話番号</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">メールアドレス</td>
                  <td class="col-10"></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-md-6 pl-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">【グループ情報】</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">グループID</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-dark-silver">グループ選択</td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">グループ選択</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-light-sky">グループ名カナ </td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">代表者名</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-light-sky">代表者名カナ </td>
                  <td class="col-4"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">郵便番号</td>
                  <td class="col-4"></td>
                  <td class="col-2 bg-dark-silver">住所検索 </td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所１</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">住所２</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">電話番号</td>
                  <td class="col-10"></td>
                </tr>
                <tr class="row ml-0">
                  <td class="col-2 bg-light-sky">メールアドレス</td>
                  <td class="col-10"></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="underline"></div>
      <div class="row pt-3 pb-3">
        <div class="col-md-6 text-left pl-5">
          <button class="button-primary pl-3 pr-3 text-bold">登録</button>
        </div>
        <div class="col-md-6 text-right pr-5">
          <span>アクセス日時：<?= date("Y/m/d")?>	</span>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $.validator.setDefaults({
          submitHandler: function () {
            alert( "Form successful submitted!" );
          }
        });
        $('#quickForm').validate({
          rules: {
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
              minlength: 5
            },
            terms: {
              required: true
            },
          },
          messages: {
            email: {
              required: "Please enter a email address",
              email: "Please enter a vaild email address"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            },
            terms: "Please accept our terms"
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
  </body>
</html>
