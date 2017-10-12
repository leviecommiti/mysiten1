<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 12.10.17
 * Time: 20:41
 */

session_start();

unset($_SESSION["email"]);
unset($_SESSION["password"]);

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>