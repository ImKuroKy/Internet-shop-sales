<?php
    require_once '../assets/config/connect.php';

    $shop_id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `интернет-магазин` WHERE `интернет-магазин`.`Код магазина` = '$shop_id'");
    header('Location: /form-input/shop.php');
?>