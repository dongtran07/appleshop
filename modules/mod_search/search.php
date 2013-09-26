<?php
$sql = "SELECT * FROM danhmuc_sanpham ORDER BY id_dm ASC";
$query = mysql_query($sql);
?>
<form method="post">
      <table class="sidebar-menu" id="search-product" width="180" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="menu-title">search product</td>
          </tr>
          <tr>
            <td height="30" class="slt-title">Chọn danh mục sản phẩm</td>
          </tr>
          <tr>
            <td height="30" valign="top">          
              <select name="dm_sp">
            	<option value="">Lựa chọn--------------------</option>
<?php while($row = mysql_fetch_array($query)){?>                  
                <option value="<?php echo $row["id_dm"];?>"><?php echo $row["ten_dm"];?></option>
<?php }?>
            </select>
            </td>
          </tr>
          <tr>
            <td height="30" class="slt-title">Chọn giá tiền sản phẩm</td>
          </tr>
          <tr>
            <td height="30" valign="top">
              <select name="gia_sp">
            	<option value="">Lựa chọn--------------------</option>
                <option value="0-1000000">Nhỏ hơn 1 triệu</option>
                <option value="1000000-3000000">Từ 1 triệu đến 3 triệu</option>
                <option value="3000000-7000000">Từ 3 triệu đến 7 triệu</option>
                <option value="7000000-11000000">Từ 7 triệu đến 11 triệu</option>
                <option value="11000000-9999999999">Lớn hơn 11 triệu</option>
            </select>
            </td>
          </tr>
          <tr>
            <td height="40"><input type="submit" name="submit_name" value="Tìm Kiếm" /> <input type="reset" name="reset_name" value="Làm Mới" /></td>
          </tr>
        </table>
      </form> 
<?php
if($_POST["submit_name"]){
	if(($_POST["dm_sp"] != "") && ($_POST["gia_sp"] != "")){
		$id_dm = $_POST["dm_sp"];
		$price = $_POST["gia_sp"];
		header("location: index.php?page=search_product&id_dm=".$id_dm."&price=".$price);
	}
}
?>       