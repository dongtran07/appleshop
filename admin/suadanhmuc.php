<?php
$id_dm=$_GET['id_dm'];
if($_POST['submit_name'])
{
	$ten_dm=$_POST['ten_dm'];
	$con=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("appleshop");
	$set_lang=mysql_query("SET NAMES utf8");
	$query="UPDATE danhmuc_sanpham SET ten_dm='$ten_dm' WHERE id_dm='$id_dm'";
	$result=mysql_query($query) or die(mysql_error());
	header("location:admincp.php?page=danhmuc");		
}
else{
	$con=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("appleshop");
	$set_lang=mysql_query("SET NAMES utf8");
	$query="SELECT * FROM danhmuc_sanpham WHERE id_dm='$id_dm'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);	
}
?>
            <form method="post">
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">Sửa thông tin danh mục sản phẩm</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên danh mục sản phẩm mới</label><br><input value="<?php if($_POST['ten_dm']) echo $_POST['ten_dm']; else echo $row['ten_dm'];?>" type="text" name="ten_dm" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_name" value="Sửa danh mục" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
       