<?php
    require_once '../assets/config/connect.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `фио клиента` WHERE `фио клиента`.`ID клиента` = '$id'");
    header('Location: /form-input/names.php');
?>