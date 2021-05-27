<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="bg-light-silver">
    <div class="container-fluid">
      <div class="col-md-6 pt-2">
        <span>WEB契約システム </span>
        <span><h1 class="mb-0 pt-2">ログイン</h1></span>
      </div>

      <div class="underline mt-2"></div>
      <div class="login-box pt-5 pb-5" style="width: 394px !important;">
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg"></p>
            <form action="/login" method="post">
              <div class="input-group mb-3">
                <label class="mb-0" for="name">ログインID</label>
                <span class="pb-1">(登録メールアドレス又は、任意のアカウント)</span>
                <input name = "name" type="text" class="form-control" placeholder="">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <label class="row col-md-12" for="password">パスワード</label>
                <input type="password" class="form-control" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block k1Btn k1Btn2">ログイン</button>
                </div>
                <span class="mt-4 ml-2">
                  ＩＤとパスワードを忘れてしまった場合<br>下記へお問い合わせください。
                </span>
                <span class="mt-4 ml-2">
                  <small>
                    WEB契約運営事務局<br>ＴＥＬ03-5909-1178
                  </small>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="login-box pr-1 pb-5 text-right">
          <small>アクセス日時：<?= date("Y/m/d")?></small>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script>
      $(function () {
        $.validator.setDefaults({
          submitHandler: function () {
            alert( "Form successful submitted!" );
          }
        });
        $('#quickForm').validate({
          rules: {
            name: {
              required: true,
              name: true,
            },
            password: {
              required: true,
              minlength: 5
            },
          },
          messages: {
            name: {
              required: "Please enter a email address",
              name: "Please enter a vaild email address"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            },
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
