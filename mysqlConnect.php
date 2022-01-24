<?php
define("servername", "127.0.0.1");
define("username", "root");
define("password", "");
define("BDname", "film_test");
$mysqli = new mysqli(servername, username, password, BDname);

if ($mysqli -> connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
    exit();
};