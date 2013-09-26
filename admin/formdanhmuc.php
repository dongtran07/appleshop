<?php
if($_POST['submit_name'])
{
	if($_POST['ten_dm'])
	{
		$ten_dm=$_POST['ten_dm'];	
	}	
	else{
		$baoloi="Không được để trống trường thông tin!";	
	}
	if($baoloi)
	{
		echo "<script>alert('".$baoloi."')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admincp.php?page=formdanhmuc'";	
	}
	else{
		$con=mysql_connect("localhost","root","");
		$select_db=mysql_select_db("appleshop",$con);
		$set_lang=mysql_query("SET NAMES utf8");
		$query="INSERT INTO danhmuc_sanpham(ten_dm) VALUES('$ten_dm')";
		$result=mysql_query($query);
		header("location:admincp.php?page=danhmuc");
	}	
}
?>
            <form method="post">
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">thêm mới một danh mục sản phẩm</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên danh mục sản phẩm mới</label><br><input type="text" name="ten_dm" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_name" value="Thêm danh mục" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>