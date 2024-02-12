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

    mysqli_query($connect, "INSERT INTO `товар` ( `Код товара`, 
                                                   `Название товара`, 
                                                   `Фирма`, 
                                                   `Модель`, 
                                                   `Технические характеристики`, 
                                                   `Цена(руб.)`, 
                                                   `Гарантийный срок`, 
                                                   `Изображение`) VALUES (
                                                    '$goods_code',
                                                    '$goods_title',
                                                    '$goods_firm',
                                                    '$goods_model',
                                                    '$goods_specifications',
                                                    '$goods_price',
                                                    '$goods_guarantee_period',
                                                    '$goods_image')");

header('Location: /form-input/goods.php');
?>