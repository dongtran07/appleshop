<?php
$sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 0,8";
$query = mysql_query($sql);
$count = 1;
?>
<table id="latest" width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td id="latest-title" height="35" colspan="4">latest product</td>
          </tr>
<?php while($row = mysql_fetch_array($query)){?>   
<?php if(($count == 1)||($count == 5)){echo "<tr>";}?>       
            <td width="25%">
            	<table class="product-item" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td class="product-name"><a href="index.php?page=productdetails&id_sp=<?php echo $row["id_sp"];?>"><?php echo $row["ten_sp"];?></a></td>
                    </tr>
                    <tr>
                    	<td class="product-img"><img width="61" height="118" src="anh_mo_ta/<?php echo $row["anh_mo_ta"];?>" /></td>
                    </tr>
                    <tr>
                    	<td class="product-price">price: <?php echo $row["gia_sp"];?> VNĐ</td>
                    </tr>
                    <tr>
                    	<td height="30" class="add-cart" align="center" valign="top"><a href="#">mua hàng</a></td>
                    </tr>
                </table>
            </td>           
<?php if(($count == 4)||($count == 8)){echo "</tr>";}?>   
<?php $count++;?>          
<?php }?>            
          
        </table>