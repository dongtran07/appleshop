<?php
$id_dm=$_GET['id_dm'];
$con=mysql_connect("localhost","root","");
$selecdb=mysql_select_db("appleshop",$con);
$set_lang=mysql_query("SET NAMES utf8");
$query="SELECT * FROM sanpham WHERE id_dm='$id_dm'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0)
{
	header("location:admincp.php?page=danhmuc");
	echo "Không được phép xóa khi còn sản phẩm trong danh mục";	
}
else
{
	$query="DELETE FROM danhmuc_sanpham WHERE id_dm='$id_dm'";
	$result=mysql_query($query);
	header("location:admincp.php?page=danhmuc");
}
?>