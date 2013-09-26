<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "appleshop";

$connect_db = mysql_connect($db_host, $db_user, $db_pass);
$select_db = mysql_select_db($db_name, $connect_db);
$set_lang = mysql_query("SET NAMES 'utf8'");
?>