<?php
	$con=mysql_connect("localhost","root","");
	$selecdb=mysql_select_db("appleshop",$con);
	$set_lang=mysql_query("SET NAMES utf8");
	$query="SELECT * FROM danhmuc_sanpham";
	$result=mysql_query($query);
	$num_row=mysql_num_rows($result);
?>			
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">quản lý danh mục sản phẩm <a href="admincp.php?page=formdanhmuc">thêm danh mục mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                	<td width="90%">tên danh mục</td>
                    <td width="5%">sửa</td>
                    <td width="5%">xóa</td>
                </tr>
<?php
if($num_row>0)
{
	while($row=mysql_fetch_array($result))
	{
?>
                <tr class="cat-item" height="30px">
                	<td class="text"><?php echo $row["ten_dm"];?></td>
                    <td class="link"><a href="admincp.php?page=suadanhmuc&id_dm=<?php echo $row['id_dm'];?>">sửa</a></td>
                    <td class="link"><a class="red" href="admincp.php?page=xoadm&id_dm=<?php echo $row['id_dm'];?>">xóa</a></td>
                </tr>
<?php
	}
}
?>
            </table>
            <!-- End Main Content -->
        </td>
    </tr>
   