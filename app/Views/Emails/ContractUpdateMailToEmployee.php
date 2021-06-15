<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Email for Contract Update</title>
    </head>
    <body>
        <div>
            <div>
                <?= $contractorName ?>様の契約（契約ID：<?= $contractId ?>）において更新がありました。<br>
                内容の確認をしてください。
            </div>
            <br>
            <div>
                <?= $contractUrl ?>
            </div>
            <br>
        </div>
    </body>
</html>