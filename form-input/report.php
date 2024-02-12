<?php
    require_once 'assets/config/connect.php';

    $report_month = $_POST['report-month'];
    $report_year = $_POST['report-year'];

    $report_month1 = $report_month+1;

    $report = mysqli_query($connect, "SELECT `Название товара`, `Фирма`, `Модель`, `Код магазина`, `Дата заказа`, `Время заказа`, `Цена(руб.)`, `Количество`, `ФИО клиента`, `Цена(руб.)`*`Количество`FROM заказ
    JOIN товар USING(`Код товара`)
    JOIN `фио клиента` ON `заказ`.`ФИО клиента_ID клиента` = `фио клиента`.`ID клиента`
    WHERE `Дата заказа` BETWEEN '$report_year-$report_month-01' AND '$report_year-$report_month1-01'
    ORDER BY `Код товара`");
    $report_dump = mysqli_fetch_all($report);

    $counts = mysqli_query($connect, "SELECT COUNT(`Код товара`) FROM заказ
    WHERE `Дата заказа` BETWEEN '$report_year-$report_month-01' AND '$report_year-$report_month1-01'
    GROUP BY `Код товара`
    ORDER BY `Код товара`");
    $counts_dump = mysqli_fetch_all($counts);

    $totals = mysqli_query($connect, "SELECT SUM(`Цена(руб.)`*`Количество`)FROM заказ
    JOIN товар USING(`Код товара`)
    WHERE `Дата заказа` BETWEEN '$report_year-$report_month-01' AND '$report_year-$report_month1-01'
    GROUP BY `Код товара`
    ORDER BY `Код товара`");
    $totals_dump = mysqli_fetch_all($totals);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\report-style.css"/>
    <title>Отчёт</title>
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
    </table>   
    <form action="report.php" method="post">
        <p class = "date">Месяц</p>
        <input type="number" name="report-month" min = "1" max = "12"/>
        <p class = "date">Год</p>
        <input type="text" name="report-year"/>
        <button type="submit">Сконструировать отчёт</button>
    </form>
    <h1>Сведения об исполненных заказах товаров в интернет-магазинах за <?=$report_month?> месяц <?=$report_year?> года</h1>
    <table>
        <tr>
            <th>Интернет-магазин</th>
            <th>Дата заказа</th>
            <th>Время заказа</th>
            <th>Цена,руб.</th>
            <th>Количество</th>
            <th>ФИО клиента</th>
            <th>Стоимость заказа</th>
        </tr>
    </table>
        <?php
        $n = 0; 
        for ($i=0; $i < count($report_dump); $i++) {
            ?>
            <p>
                Название товара:<?=$report_dump[$i][0]?>
            </p>
            <p>
                Фирма:<?=$report_dump[$i][1]?>
            </p>
            <p>
                Модель:<?=$report_dump[$i][2]?>
            </p>
            <table>
                <?php
                for($j=0; $j < $counts_dump[$n][0]; $j++){
                    ?> 
                <tr>
                    <td><?=$report_dump[$i][3]?></td>
                    <td><?=$report_dump[$i][4]?></td>
                    <td><?=$report_dump[$i][5]?></td>
                    <td><?=$report_dump[$i][6]?></td>
                    <td><?=$report_dump[$i][7]?></td>
                    <td><?=$report_dump[$i][8]?></td>
                    <td><?=$report_dump[$i][9]?></td>
                </tr>
                <?php
                $i++;};
                ?>
            </table>
            <div class = "itogdiv">
                <p>Итого по модели:</p>
                <p><?=$totals_dump[$n][0]?></p>
            </div>
            <p class = "dots"><b>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
            </b></p>
        <?php
        $i+=-1;
        $n++;
        };
        ?>   
</body>
</html>