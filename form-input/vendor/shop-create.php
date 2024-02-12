<?php
    require_once '../assets/config/connect.php';

    $shop_code = $_POST['shop-code'];
    $shop_email = $_POST['shop-email'];
    $shop_delivery = $_POST['shop-delivery'];

    mysqli_query($connect, "INSERT INTO `интернет-магазин` ( `Код магазина`, 
                                                   `Электронный адрес`, 
                                                   `Оплата доставки` 
                                                   ) VALUES (
                                                    '$shop_code',
                                                    '$shop_email',
                                                    '$shop_delivery')");

header('Location: /form-input/shop.php');
?>