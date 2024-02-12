<?php
    require_once '../assets/config/connect.php';

    $delivery_time = $_POST['delivery-time'];
    $delivery_courier = $_POST['elivery_courier'];
    $order_code = $_POST['order-code'];

    mysqli_query($connect, "INSERT INTO `доставка` ( `Время доставки`, 
                                                   `Ф.И.О. курьера`, 
                                                   `Код заказа` 
                                                   ) VALUES (
                                                    '$delivery_time',
                                                    '$delivery_courier',
                                                    '$order_code')");

header('Location: /form-input/delivery.php');
?>