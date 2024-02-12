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

    mysqli_query($connect, "UPDATE `заказ` SET `Код заказа` = '$orders_code', 
                                                `Дата заказа` = '$orders_date', 
                                                `Время заказа` = '$orders_time', 
                                                `Количество` = '$orders_count', 
                                                `Подтверждение заказа` = '$orders_accept', 
                                                `Код товара` =  '$orders_good_code', 
                                                `Код магазина` =  '$orders_shop_code', 
                                                `ФИО клиента_ID клиента` = '$orders_name_code'
                                                WHERE `заказ`.`Код заказа` = '$orders_code'");

    header('Location: /form-input/orders.php');
?>