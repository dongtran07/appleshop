<?php
$id_sp=$_GET['id_sp'];
$con=mysql_connect("localhost","root","");
$selecdb=mysql_select_db("appleshop",$con);
$set_lang=mysql_query("SET NAMES utf8");
$query="DELETE FROM sanpham WHERE id_sp='$id_sp'";
$result=mysql_query($query);
header("location:admincp.php?page=sanpham");
?>