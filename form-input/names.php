<?php
    require_once 'assets/config/connect.php';

    $names = mysqli_query($connect, "SELECT * FROM `фио клиента`");
    $names_dump = mysqli_fetch_all($names);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css"/>
    <title>ФИО клиента</title>
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
            <th>ID клиента</th>
            <th>Контактный номер</th>
            <th>ФИО клиента</th>
            <th>Адрес доставки</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php 
        foreach ($names_dump as $item) {
            ?>
            <tr>
                <td><?= $item[0]?></td>
                <td><?= $item[1]?></td>
                <td><?= $item[2]?></td>
                <td><?= $item[3]?></td>
                <td><a href="names-update.php?id=<?= $item[0]?>">Обновить</a></td>
                <td><a href="vendor/names-delete.php?id=<?= $item[0]?>">Удалить</a></td>
        </tr>
        <?php
        };
        ?>
    </table>   

    <h2>Создать товар</h2>
    <form action="vendor/names-create.php" method="post">
        <p>ID клиента</p>
        <input type="text" name="names-code"/>
        <p>Контактный номер</p>
        <input type="text" name="names-phone"/>
        <p>ФИО клиента</p>
        <input type="text" name="names-fio"/>
        <p>Адрес доставки</p>
        <input type="text" name="names-delivery"/>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>