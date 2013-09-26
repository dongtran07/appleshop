<?php
$sql = "SELECT * FROM sanpham ORDER BY rand() LIMIT 0,2";
$query = mysql_query($sql);
?>
<table class="sidebar-menu" id="random-product" width="180" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="menu-title">random product</td>
          </tr>
<?php while($row = mysql_fetch_array($query)){?>          
          <tr>
            <td class="ran-title" align="center" valign="middle"><a href="index.php?page=productdetails&id_sp=<?php echo $row["id_sp"];?>"><?php echo $row["ten_sp"];?></a></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><img width="95" height="115" src="anh_mo_ta/<?php echo $row["anh_mo_ta"];?>"/></td>
          </tr>
          <tr>
            <td class="ran-price" align="center" valign="middle">price: <?php echo $row["gia_sp"];?> VNĐ</td>
          </tr>
<?php }?>          
        </table>