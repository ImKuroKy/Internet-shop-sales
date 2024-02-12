<?php
    require_once 'assets/config/connect.php';

    $orders_id = $_GET['id'];
    $order = mysqli_query($connect, "SELECT * FROM `заказ` WHERE `Код заказа` = '$orders_id'");
    $order = mysqli_fetch_assoc($order);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить значение</title>
</head>
<body>
    <h2>Обновить товар</h2>
    <form action="vendor/orders-update.php" method="post">
        <p>Код заказа</p>
        <input type="text" name="orders-code" value="<?= $order['Код заказа'] ?>"/>
        <p>Дата заказа</p>
        <input type="text" name="orders-date" value="<?= $order['Дата заказа'] ?>"/>
        <p>Время заказа</p>
        <input type="text" name="orders-time" value="<?= $order['Время заказа'] ?>"/>
        <p>Количество</p>
        <input type="text" name="orders-count" value="<?= $order['Количество'] ?>"/>
        <p>Подтверждение заказа</p>
        <input type="text" name="orders-accept" value="<?= $order['Подтверждение заказа'] ?>"/>
        <p>Код товара</p>
        <input type="text" name="orders-good-code" value="<?= $order['Код товара'] ?>"/>
        <p>Код магазина</p>
        <input type="text" name="orders-shop-code" value="<?= $order['Код магазина'] ?>"/>
        <p>ФИО клиента_ID клиента</p>
        <input type="text" name="orders-name-code" value="<?= $order['ФИО клиента_ID клиента'] ?>"/>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>