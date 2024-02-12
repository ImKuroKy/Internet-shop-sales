<?php
    require_once '../assets/config/connect.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `заказ` WHERE `заказ`.`Код заказа` = '$id'");
    header('Location: /form-input/orders.php');
?>