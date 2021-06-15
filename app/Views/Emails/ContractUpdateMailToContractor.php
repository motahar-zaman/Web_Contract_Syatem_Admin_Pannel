<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Email for Contract Update</title>
    </head>
    <body>
        <div>
            <div>
                <?= $contractorName ?>様
            </div>
            <br>

            <div>
                この度は弊社商品のご契約ありがとうございます。<br>
                下記URLより、契約内容のご確認をお願いいたします。
            </div>
            <br>
            <div>
                <?= $contractUrl ?>
            </div>
            <br>
        </div>
    </body>
</html>