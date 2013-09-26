<?php
	$con=mysql_connect("localhost","root","");
	$selecdb=mysql_select_db("appleshop",$con);
	$set_lang=mysql_query("SET NAMES utf8");
	if(!$_GET['pagging'])
	{
		$page=1;
	}
	else{
		$page=$_GET['pagging'];	
	}
	$max_result=3;
	$index_row=$page*$max_result-$max_result;
	$query="SELECT * FROM sanpham INNER JOIN danhmuc_sanpham ON sanpham.id_dm=danhmuc_sanpham.id_dm LIMIT $index_row,$max_result";
	$result=mysql_query($query);
	$num_row=mysql_num_rows($result);
?>
            <table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">quản lý sản phẩm <a href="admincp.php?page=formsanpham">thêm sản phẩm mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                	<td width="30%">tên sản phẩm</td>
                    <td width="15%">giá</td>
                    <td width="20%">loại sản phẩm</td>
                    <td width="15%">ảnh mô tả</td>
                    <td width="5%">sửa</td>
                    <td width="5%">xóa</td>
                </tr>
<?php
if($num_row >0)
{
	while($row=mysql_fetch_array($result))
	{
?>
                <tr class="product-item">
                	<td class="text"><?php echo $row['ten_sp'];?></td>
                    <td class="red text"><?php echo $row['gia_sp'];?> vnđ</td>
                    <td class="text"><?php echo $row['ten_dm'];?></td>
                    <td class="img"><img width="70px" src="../anh_mo_ta/<?php echo $row['anh_mo_ta'];?>" /></td>
                    <td class="link"><a href="admincp.php?page=suasanpham&id_sp=<?php echo $row['id_sp'];?>">sửa</a></td>
                    <td class="link"><a class="red" href="admincp.php?page=xoasanpham&id_sp=<?php echo $row['id_sp'];?>">xóa</a></td>
                </tr>
<?php
	}
}
else{
	echo "<script>alert('Hiện tại chưa có dữ liệu trong danh mục')</script>";	
}
$query_p="SELECT * FROM sanpham INNER JOIN danhmuc_sanpham ON sanpham.id_dm=danhmuc_sanpham.id_dm";
$total_row=mysql_num_rows(mysql_query($query_p));
$total_page=ceil($total_row/$max_result);
?>
                <tr id="list-num" height="30px">
                	<td align="right" colspan="6">
                    	<?php 
						$pre=$page-1;
						if($page>1)
						{
							echo "<a href='admincp.php?page=sanpham&pagging=".$pre."'>Pre|</a> ";
						}
						for($i=1;$i<=$total_page;$i++)
						{
							if($i==$page)
							echo "<b><a href='admincp.php?page=sanpham&pagging=".$i."'>".$i."</a></b> ";
							else
							echo "<a href='admincp.php?page=sanpham&pagging=".$i."'>".$i."</a> ";
						}
						$next=$page+1;
						if($page<$total_page)
						{
							echo "<a href='admincp.php?page=sanpham&pagging=".$next."'>|Next</a> ";
						}
						?>
                        
                  	</td>
                </tr>
            </table>
<!-- End Main Content -->
        