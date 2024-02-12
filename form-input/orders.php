<?php
    require_once 'assets/config/connect.php';

    $orders = mysqli_query($connect, "SELECT * FROM `заказ`");
    $orders_dump = mysqli_fetch_all($orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>Заказ</title>
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
            <th>Код заказа</th>
            <th>Дата заказа</th>
            <th>Время заказа</th>
            <th>Количество</th>
            <th>Подтверждение заказа</th>
            <th>Код товара</th>
            <th>Код магазина</th>
            <th>ФИО клиента_ID клиента</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($orders_dump as $item) {
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
                <td><a href="orders-update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="vendor/orders-delete.php?id=<?= $item[0]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать заказ</h2>
    <form action="vendor/orders-create.php" method="post">
        <p>Код заказа</p>
        <input type="text" name="orders-code"/>
        <p>Дата заказа</p>
        <input type="text" name="orders-date"/>
        <p>Время заказа</p>
        <input type="text" name="orders-time"/>
        <p>Количество</p>
        <input type="text" name="orders-count"/>
        <p>Подтверждение заказа</p>
        <input type="text" name="orders-accept"/>
        <p>Код товара</p>
        <input type="text" name="orders-good-code"/>
        <p>Код магазина</p>
        <input type="text" name="orders-shop-code"/>
        <p>ФИО клиента_ID клиента</p>
        <input type="text" name="orders-name-code"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>