<?php
if($_POST["submit_name"])
{
	if($_POST['rd'])
		$sp_db=$_POST['rd'];
	if($_POST['ten_sp'])
	{
		$ten_sp=$_POST['ten_sp'];
	}
	else{
		$baoloi="Không được để trống trường nào";	
	}
	if($_POST['gia_sp'])
	{
		$gia_sp=$_POST['gia_sp'];
	}
	else{
		$baoloi="Không được để trống trường nào";	
	}
	if($_POST['chitiet_sp'])
	{
		$chitiet_sp=$_POST['chitiet_sp'];
	}
	else{
		$baoloi="Không được để trống trường nào";	
	}
	if($_POST['id_dm'] != 0)
	{
		$id_dm=$_POST['id_dm'];
	}
	else{
		$baoloi="Không được để trống trường nào";	
	}
	if($_FILES['image_upload']['name'])
	{
		$image_name=$_FILES['image_upload']['name'];
		$image_path=$_FILES['image_upload']['tmp_name'];
	}
	else{
		$baoloi="Không được để trống trường nào";	
	}
	if($baoloi)
	{
		echo "<script>alert('".$baoloi."')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admincp.php?page=formsanpham'>";
	}
	else{
		$new_image_path="../anh_mo_ta/".$image_name;
		$image_upload=move_uploaded_file($image_path, $new_image_path);	
		$con=mysql_connect("localhost","root","");
		$select_db=mysql_select_db("appleshop",$con);
		$set_lang=mysql_query("SET NAMES utf8");
		$query="INSERT INTO sanpham(id_dm, ten_sp,anh_mo_ta, gia_sp, chitiet_sp, sp_dacbiet) VALUES('$id_dm', '$ten_sp','$image_name', '$gia_sp' ,'$chitiet_sp', '$sp_db')";
		$result=mysql_query($query) or die(mysql_error());
		header("location:admincp.php?page=sanpham");
	}
}
else{
$con=mysql_connect("localhost","root","");
$select_db=mysql_select_db("appleshop",$con);
$set_lang=mysql_query("SET NAMES utf8");
$query="SELECT * FROM danhmuc_sanpham";
$result=mysql_query($query);
}
?>
<form method="post" enctype="multipart/form-data">
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">thêm một sản phẩm mới</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên của sản phẩm</label><br><input type="text" name="ten_sp" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>giá của sản phẩm</label><br><input type="text" name="gia_sp" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm thuộc danh mục</label><br>
                    	<select name="id_dm">
                        	<option value=0 selected="selected">--- lựa chọn danh mục ---</option>
<?php
while($row=mysql_fetch_array($result))
{
?>                        
                            <option value=<?php echo $row['id_dm'];?>><?php echo $row['ten_dm'];?></option>
<?php
}
?>
                        </select>                    	
                    </td>
                </tr>
                <tr height="50">
                	<td class="form"><label>ảnh mô tả cho sản phẩm</label><br><input type="file" name="image_upload" /></td>
                </tr>
                <tr>
                	<td class="form"><label>nội dung chi tiết của sản phẩm</label><br>
					<?php
						include("fckeditor/fckeditor.php") ;
						$sBasePath = $_SERVER['PHP_SELF'] ;
						$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admincp.php" ) ) ;
						$sBasePath = $sBasePath."fckeditor/";
						$oFCKeditor = new FCKeditor('chitiet_sp') ;
						$oFCKeditor->BasePath = $sBasePath ;
						if($_POST["chitiet_sp"]){
							$oFCKeditor->Value = $_POST["chitiet_sp"];
						}
						else{
							$oFCKeditor->Value = $row["chitiet_sp"];
						}
						$oFCKeditor->Create() ;
						?>   
					</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm đặc biệt</label><br>
                    <input type="radio" name="rd" value=1 /> có 
                    <input type="radio" name="rd" value=0 checked="checked" /> không
                    </td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_name" value="Thêm sản phẩm" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>