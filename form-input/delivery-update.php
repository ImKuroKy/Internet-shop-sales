<?php
    require_once 'assets/config/connect.php';
    $order_code = $_GET['order-code'];
    $delivery = mysqli_query($connect, "SELECT * FROM `доставка` WHERE `Код заказа` = '$order_code'");
    $delivery = mysqli_fetch_assoc($delivery);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить значение</title>
</head>
<body>
    
    <h2>Обновить доставку</h2>
    <form action="vendor/delivery-update.php" method="post">
        <p>Время доставки</p>
        <input type="text" name="delivery-time" value="<?= $delivery['Время доставки'] ?>"/>
        <p>ФИО курьера</p>
        <input type="text" name="delivery-courier" value="<?= $delivery['Ф.И.О. курьера'] ?>"/>
        <p>Код заказа</p>
        <input type="text" name="order-code" value="<?= $delivery['Код заказа'] ?>"/>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>