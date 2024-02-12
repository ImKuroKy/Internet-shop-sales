<?php
    
    $connect = mysqli_connect("localhost","root","root","salesdb")
    or die (mysqli_connect_error());
    if (!$connect) {
        echo "Нет соединения с Базой Данных.";
    }
?>