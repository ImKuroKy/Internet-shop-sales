<?php
    require_once 'assets/config/connect.php';

    $shop = mysqli_query($connect, "SELECT * FROM `интернет-магазин`");
    $shop_dump = mysqli_fetch_all($shop);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>Интернет-магазин</title>
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
            <th>Код магазина</th>
            <th>Электронный адрес</th>
            <th>Оплата доставки</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($shop_dump as $item) {
            ?>
            <tr>
                <td><?= $item[0]?></td>
                <td><?= $item[1]?></td>
                <td><?= $item[2]?></td>
                <td><a href="shop-update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="vendor/shop-delete.php?id=<?= $item[0]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать товар</h2>
    <form action="vendor/shop-create.php" method="post">
        <p>Код магазина</p>
        <input type="text" name="shop-code"/>
        <p>Электронный адрес</p>
        <input type="text" name="shop-email"/>
        <p>Оплата доставки</p>
        <input type="text" name="shop-delivery"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>