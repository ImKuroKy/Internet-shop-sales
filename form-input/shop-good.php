<?php
    require_once 'assets/config/connect.php';

    $shop_good = mysqli_query($connect, "SELECT * FROM `магазин-товар`");
    $shop_good_dump = mysqli_fetch_all($shop_good);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>Магазин-товар</title>
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
            <th>Код интернет-магазина</th>
            <th>Код товара</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($shop_good_dump as $item) {
            ?>
            <tr>
                <td><?= $item[0]?></td>
                <td><?= $item[1]?></td>
                <td><a href="shop-good-update.php?id=<?= $item[0]?>&id_2=<?$item[1]?>">Обновить</a></td>
                <td><a href="vendor/shop-good-delete.php?id=<?= $item[0]?>&id_2=<?= $item[1]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать связку магазин-товар</h2>
    <form action="vendor/shop-good-create.php" method="post">
        <p>Код интернет-магазина</p>
        <input type="text" name="shop-code"/>
        <p>Код товара</p>
        <input type="text" name="good-code"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>