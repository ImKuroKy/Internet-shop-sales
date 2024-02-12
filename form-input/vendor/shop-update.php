<?php 
    require_once '../assets/config/connect.php';

    $shop_code = $_POST['shop-code'];
    $shop_email = $_POST['shop-email'];
    $shop_delivery = $_POST['shop-delivery'];

    mysqli_query($connect, "UPDATE `интернет-магазин` SET `Код магазина` = '$shop_code', 
                                                   `Электронный адрес` = '$shop_email', 
                                                   `Оплата доставки` = '$shop_delivery' 
                                                   WHERE `интернет-магазин`.`Код магазина` = '$shop_code'");

    header('Location: /form-input/shop.php');
?>