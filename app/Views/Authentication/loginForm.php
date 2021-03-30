<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css\style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="header">
            <p>WEB契約システム</p>
            <h1>ログイン</h1>
            <p class="mini">	[ユーザーID]：[ユーザー名]</p>
        </div>

        <form class="loginForm" action="/login" method="post">
            <div class="container">
                <div class="usernameField">
                    <label for="name">ログインID(登録メールアドレス又は、任意のアカウント)</label>
                    <input type="text" placeholder="" name="name" required>
                </div>
                <div class="passwordField">
                    <label for="password">パスワード	</label>
                    <input type="password" placeholder="" name="password" required>
                </div>
                <div class="submitbtn">
                    <button type="submit">ログイン</button>
                </div>
                <div class="spanItems1">
                  <span>
                      ＩＤとパスワードを忘れてしまった場合<br>
                      下記へお問い合わせください。
                  </span>
                </div>
                <div class="spanItems2">
                  <span>
                      WEB契約運営事務局<br>
                      ＴＥＬ03-5909-1178
                  </span>
                </div>
            </div>
        </form>
        <footer class="loginFooter">
            <p class="footertext">アクセス日時：YYYY/MM/DD	</p>
        </footer>
    </body>
</html>
