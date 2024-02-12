<?php
    require_once '../assets/config/connect.php';

    $shop_code = $_POST['shop-code'];
    $good_code = $_POST['good-code'];

    mysqli_query($connect, "INSERT INTO `магазин-товар` ( `Интернет-магазин_Код магазина`, 
                                                   `Товар_Код товара`) 
                                                    VALUES (
                                                    '$shop_code',
                                                    '$good_code')");

header('Location: /form-input/shop-good.php');
?>