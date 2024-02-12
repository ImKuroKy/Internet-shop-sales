<?php
    require_once '../assets/config/connect.php';

    $orders_code = $_POST['orders-code'];
    $orders_date = $_POST['orders-date'];
    $orders_time = $_POST['orders-time'];
    $orders_count = $_POST['orders-count'];
    $orders_accept = $_POST['orders-accept'];
    $orders_good_code = $_POST['orders-good-code'];
    $orders_shop_code = $_POST['orders-shop-code'];
    $orders_name_code = $_POST['orders-name-code'];

    mysqli_query($connect, "INSERT INTO `заказ` ( `Код заказа`, 
                                                   `Дата заказа`, 
                                                   `Время заказа`, 
                                                   `Количество`, 
                                                   `Подтверждение заказа`, 
                                                   `Код товара`, 
                                                   `Код магазина`, 
                                                   `ФИО клиента_ID клиента`) VALUES (
                                                    '$orders_code',
                                                    '$orders_date',
                                                    '$orders_time',
                                                    '$orders_count',
                                                    '$orders_accept',
                                                    '$orders_good_code',
                                                    '$orders_shop_code',
                                                    '$orders_name_code')");

header('Location: /form-input/orders.php');
?>