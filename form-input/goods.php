<?php
    require_once 'assets/config/connect.php';

    $goods = mysqli_query($connect, "SELECT * FROM `товар`");
    $goods_dump = mysqli_fetch_all($goods);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>Товар</title>
</head>
<body>
    <header>
        <div>
            <nav>
                <a href="shop-good.php">Магазин-товар</a>
                <a href="delivery.php">Доставка</a>
                <a href="shop.php">Интернет-магазин</a>
                <a href="orders.php">Заказ</a>
                <a href="goods.php">Товары</a>
                <a href="names.php">ФИО клиента</a>
                <a href="report.php">Отчёт</a>
            </nav>
        </div>
    </header>

    <table>
        <tr>
            <th>Код товара</th>
            <th>Название товара</th>
            <th>Фирма</th>
            <th>Модель</th>
            <th>Технические характеристики</th>
            <th>Цена(руб.)</th>
            <th>Гарантийный срок</th>
            <th>Изображение</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($goods_dump as $item) {
            ?>
            <tr>
                <td><?= $item[0]?></td>
                <td><?= $item[1]?></td>
                <td><?= $item[2]?></td>
                <td><?= $item[3]?></td>
                <td><?= $item[4]?></td>
                <td><?= $item[5]?></td>
                <td><?= $item[6]?></td>
                <td><?= $item[7]?></td>
                <td><a href="goods-update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="vendor/goods-delete.php?id=<?= $item[0]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать товар</h2>
    <form action="vendor/goods-create.php" method="post">
        <p>Код товара</p>
        <input type="text" name="goods-code"/>
        <p>Название товара</p>
        <input type="text" name="goods-title"/>
        <p>Фирма</p>
        <input type="text" name="goods-firm"/>
        <p>Модель</p>
        <input type="text" name="goods-model"/>
        <p>Технические характеристики</p>
        <input type="text" name="goods-specifications"/>
        <p>Цена(руб.)</p>
        <input type="text" name="goods-price"/>
        <p>Гарантийный срок</p>
        <input type="text" name="goods-guarantee_period"/>
        <p>Изображение</p>
        <input type="text" name="goods-image"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>