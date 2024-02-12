<?php
    require_once 'assets/config/connect.php';

    $delivery = mysqli_query($connect, "SELECT * FROM `доставка`");
    $delivery_dump = mysqli_fetch_all($delivery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>Доставка</title>
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
            <th>Время доставки</th>
            <th>ФИО курьера</th>
            <th>Код заказа</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($delivery_dump as $item) {
            ?>
            <tr>
                <td><?= $item[0]?></td>
                <td><?= $item[1]?></td>
                <td><?= $item[2]?></td>
                <td><a href="delivery-update.php?id=<?= $item[2]?>">Обновить</a></td>
                <td><a href="vendor/delivery-delete.php?id=<?= $item[2]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать доставку</h2>
    <form action="vendor/delivery-create.php" method="post">
        <p>Время доставки</p>
        <input type="text" name="delivery-time"/>
        <p>ФИО курьера</p>
        <input type="text" name="delivery-courier"/>
        <p>Код заказа</p>
        <input type="text" name="order-code"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>