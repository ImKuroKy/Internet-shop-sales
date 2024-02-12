<?php
    require_once '../assets/config/connect.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `товар` WHERE `товар`.`Код товара` = '$id'");
    header('Location: /form-input/goods.php');
?>