<?php
    require_once 'assets/config/connect.php';

    $shop_id = $_GET['shop_id'];
    $shop_1 = mysqli_query($connect, "SELECT * FROM `интернет-магазин` WHERE `Код магазина` = '$shop_id'");
    $shop_1 = mysqli_fetch_assoc($shop_1);
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
    <form action="vendor/shop-update.php" method="post">
        <p>Код товара</p>
        <input type="text" name="shop-code" value="<?= $shop_1['Код магазина'] ?>"/>
        <p>Название товара</p>
        <input type="text" name="shop-email" value="<?= $shop_1['Электронный адрес'] ?>"/>
        <p>Фирма</p>
        <input type="text" name="shop-delivery" value="<?= $shop_1['Оплата доставки'] ?>"/>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>