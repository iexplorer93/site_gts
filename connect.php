<?php
$user = "admin";
$pass = "123";
$db = "gts";
$host = "127.0.0.1";

$connection = mysql_connect($host, $user, $pass) or die("# 1)___ошибка подключения к БД!");
$db = mysql_select_db($db) or die("# 2)___не правильно указано название БД!");
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

?>