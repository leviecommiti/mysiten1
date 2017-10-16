<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 11.10.17
 * Time: 20:02
 */
    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost";
    $username = "root";
    $password = "12345";
    $database = "DB_1";

    $mysqli = new mysqli($server,$username,$password,$database);

    if (mysqli_connect_errno()) {
        echo "<p><strong> Ошибка подключения к БД </strong>. Описание ошибки :".mysqli_connect_error()."</p>";
        exit();
    }

    $mysqli->set_charset('utf8');
    $localhost = "http://localhost";
?>