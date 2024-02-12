<?php 
    require_once '../assets/config/connect.php';

    $names_code = $_POST['names-code'];
    $names_phone = $_POST['names-phone'];
    $names_fio = $_POST['names-fio'];
    $names_delivery = $_POST['names-delivery'];

    mysqli_query($connect, "UPDATE `фио клиента` SET `ID клиента` = '$names_code', 
                                                   `Контактый номер` = '$names_phone', 
                                                   `ФИО клиента` = '$names_fio', 
                                                   `Адрес доставки` = '$names_delivery'
                                                   WHERE `фио клиента`.`ID клиента` = '$names_code'");

    header('Location: /form-input/names.php');
?>


                                                    
                                                    
                                                    