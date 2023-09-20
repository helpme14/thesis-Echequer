<?php
    $host = 'localhost';
    $user = 'echequer_4d4';
    $password = 'Echequer4d4';
    $dbname = 'echequer_database';

    $con = mysqli_connect($host, $user, $password, $dbname);

    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }
?>
