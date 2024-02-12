<?php
    require_once '../assets/config/connect.php';

    $names_code = $_POST['names-code'];
    $names_phone = $_POST['names-phone'];
    $names_fio = $_POST['names-fio'];
    $names_delivery = $_POST['names-delivery'];

    mysqli_query($connect, "INSERT INTO `фио клиента` ( `ID клиента`,
                                                    `Контактый номер`,
                                                    `ФИО клиента`,
                                                    `Адрес доставки`) VALUES (
                                                    '$names_code',
                                                    '$names_phone',
                                                    '$names_fio',
                                                    '$names_delivery')");

    header('Location: /form-input/names.php');
?>