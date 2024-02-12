<?php
    require_once 'assets/config/connect.php';

    $goods_id = $_GET['id'];
    $good = mysqli_query($connect, "SELECT * FROM `товар` WHERE `Код товара` = '$goods_id'");
    $good = mysqli_fetch_assoc($good);
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
    <form action="vendor/goods-update.php" method="post">
        <p>Код товара</p>
        <input type="text" name="goods-code" value="<?= $good['Код товара'] ?>"/>
        <p>Название товара</p>
        <input type="text" name="goods-title" value="<?= $good['Название товара'] ?>"/>
        <p>Фирма</p>
        <input type="text" name="goods-firm" value="<?= $good['Фирма'] ?>"/>
        <p>Модель</p>
        <input type="text" name="goods-model" value="<?= $good['Модель'] ?>"/>
        <p>Технические характеристики</p>
        <input type="text" name="goods-specifications" value="<?= $good['Технические характеристики'] ?>"/>
        <p>Цена(руб.)</p>
        <input type="text" name="goods-price" value="<?= $good['Цена(руб.)'] ?>"/>
        <p>Гарантийный срок</p>
        <input type="text" name="goods-guarantee_period" value="<?= $good['Гарантийный срок'] ?>"/>
        <p>Изображение</p>
        <input type="text" name="goods-image" value="<?= $good['Изображение'] ?>"/>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>