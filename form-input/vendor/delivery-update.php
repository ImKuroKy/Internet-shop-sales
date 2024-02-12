<?php 
    require_once '../assets/config/connect.php';

    $delivery_time = $_POST['delivery-time'];
    $delivery_courier = $_POST['delivery-courier'];
    $order_code = $_POST['order-code'];

    mysqli_query($connect, "UPDATE `доставка` SET `Время доставки` = '$delivery_time', 
                                                   `Ф.И.О. курьера` = '$delivery_courier', 
                                                   `Код заказа` = '$order_code' 
                                                   WHERE `доставка`.`Код заказа` = '$order_code'");

    header('Location: /form-input/delivery.php');
?>