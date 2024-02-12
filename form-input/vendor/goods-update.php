<?php 
    require_once '../assets/config/connect.php';

    $goods_code = $_POST['goods-code'];
    $goods_title = $_POST['goods-title'];
    $goods_firm = $_POST['goods-firm'];
    $goods_model = $_POST['goods-model'];
    $goods_specifications = $_POST['goods-specifications'];
    $goods_price = $_POST['goods-price'];
    $goods_guarantee_period = $_POST['goods-guarantee_period'];
    $goods_image = $_POST['goods-image'];

    mysqli_query($connect, "UPDATE `товар` SET `Код товара` = '$goods_code', 
                                                   `Название товара` = '$goods_title', 
                                                   `Фирма` = '$goods_firm', 
                                                   `Модель` = '$goods_model', 
                                                   `Технические характеристики` = '$goods_specifications', 
                                                   `Цена(руб.)` = '$goods_price', 
                                                   `Гарантийный срок` = '$goods_guarantee_period', 
                                                   `Изображение` = '$goods_image'
                                                   WHERE `товар`.`Код товара` = '$goods_code'");

    header('Location: /form-input/goods.php');
?>