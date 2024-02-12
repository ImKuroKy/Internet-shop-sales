<?php
    require_once 'assets/config/connect.php';

    $names_id = $_GET['id'];
    $name = mysqli_query($connect, "SELECT * FROM `ФИО клиента` WHERE `ID клиента` = '$name_id'");
    $name = mysqli_fetch_assoc($name);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить значение</title>
</head>
<body>
    <h2>Обновить ФИО клиента</h2>
    <form action="vendor/names-update.php" method="post">
        <p>ID клиента</p>
        <input type="text" name="names-code" value="<?= $name['ID клиента'] ?>"/>
        <p>Контактный номер</p>
        <input type="text" name="names-phone" value="<?= $name['Контактный номер'] ?>"/>
        <p>ФИО клиента</p>
        <input type="text" name="names-fio" value="<?= $name['ФИО клиента'] ?>"/>
        <p>Адрес доставки</p>
        <input type="text" name="names-delivery" value="<?= $name['Адрес доставки'] ?>"/>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>