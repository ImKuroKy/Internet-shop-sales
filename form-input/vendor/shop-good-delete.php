<?php
    require_once '../assets/config/connect.php';
    
    $shop_code = $_GET['id'];
    $good_code = $_GET['id_2'];
    mysqli_query($connect, "DELETE FROM `магазин-товар` WHERE `магазин-товар`.`Интернет-магазин_Код магазина` = '$shop_code'
                                                        AND `магазин-товар`.`Товар_Код товара` = '$good_code'");
    header('Location: /form-input/shop-good.php');

?>