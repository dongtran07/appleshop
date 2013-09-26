<?php
$id_sp=$_GET['id_sp'];
if($_POST['submit_name'])
{
	$ten_sp=$_POST["ten_sp"];
	$gia_sp=$_POST["gia_sp"];
	$chitiet_sp=$_POST["chitiet_sp"];
	$sp_dacbiet=$_POST["sp_dacbiet"];
	$id_dm=$_POST["id_dm"];
	if($_FILES["image_upload"]["name"])
	{
		$image_name=$_FILES["image_upload"]["name"];
		$image_path=$_FILES["image_upload"]["tmp_name"];
		$image_new_path="../anh_mo_ta/".$image_name;
		$upload_image=move_uploaded_file($image_path, $image_new_path);	
	}
	else{
		$image_name=$_POST['anh_mo_ta'];
	}
	$con=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("appleshop",$con);
	$set_lang=mysql_query("SET NAMES utf8");
	$query="UPDATE sanpham SET ten_sp='$ten_sp', gia_sp='$gia_sp', chitiet_sp='$chitiet_sp', sp_dacbiet='$sp_dacbiet', anh_mo_ta='$image_name', id_dm='$id_dm' WHERE id_sp='$id_sp'";
	$result=mysql_query($query) or die(mysql_error());
	header("location: admincp.php?page=sanpham");
	
}
else{
	$con=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("appleshop",$con);
	$set_lang=mysql_query("SET NAMES utf8");
	$query="SELECT * FROM sanpham WHERE id_sp='$id_sp'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$query="SELECT * FROM danhmuc_sanpham";
	$result=mysql_query($query) or die(mysql_error());	
}

?>
            <form method="post" enctype="multipart/form-data">
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">Sửa thông tin sản phẩm</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên của sản phẩm</label><br><input type="text" value="<?php if($_POST['ten_sp']){echo $_POST['ten_sp'];} else{ echo $row['ten_sp'];}?>" name="ten_sp" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>giá của sản phẩm</label><br><input type="text" value="<?php if($_POST['gia_sp']){echo $_POST['gia_sp'];} else{ echo $row['gia_sp'];}?>" name="gia_sp" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm thuộc danh mục</label><br>
                    	<select name="id_dm">
<?php
while($row2=mysql_fetch_array($result))
{
?>
                            <option <?php if($row2['id_dm']==$row['id_dm']) echo "selected='selected'";?> value="<?php echo $row2['id_dm']?>"><?php echo $row2[ten_dm];?></option>
<?php
}
?>
                        </select>                    	
                    </td>
                </tr>
                <tr height="50">
                	<td class="form"><label>ảnh mô tả cho sản phẩm</label><br><input type="file" name="image_upload" /><input type="hidden" value="<?php echo $row['anh_mo_ta'];?>" name="anh_mo_ta" /></td>
                </tr>
                <tr>
                	<td class="form"><label>nội dung chi tiết của sản phẩm</label><br><textarea name="chitiet_sp"><?php if($_POST['chitiet_sp']){echo $_POST['chitiet_sp'];} else{ echo $row['chitiet_sp'];}?></textarea></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm đặc biệt</label><br>
                    <input type="radio" name="sp_dacbiet" value=1 <?php if($row['sp_dacbiet']==1) echo "checked='checked'";?> /> có 
                    <input type="radio" name="sp_dacbiet" value=0 <?php if($row['sp_dacbiet']==0) echo "checked='checked'";?> /> không
                    </td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_name" value="Sửa sản phẩm" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
            