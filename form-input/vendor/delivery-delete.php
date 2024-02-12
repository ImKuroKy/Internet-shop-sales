<?php
    require_once '../assets/config/connect.php';

    $order_code = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `доставка` WHERE `доставка`.`Код заказа` = '$order_code'");
    header('Location: /form-input/delivery.php');
?>