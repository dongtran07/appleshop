<?php
$id_dm = $_GET["id_dm"];
$price = $_GET["price"];

$arr_price = explode("-", $price);
$sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm AND (gia_sp > $arr_price[0]) AND (gia_sp < $arr_price[1])";
$query = mysql_query($sql);
?>   	
    <table id="title-bar" width="598" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="598" height="35">danh sách sản phẩm</td>
      </tr>
    </table>
	
<?php while($row = mysql_fetch_array($query)){?>   
    
      <table class="product-item" width="598" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle" width="120" height="200" rowspan="7"><img width=90 height=160 src="anh_mo_ta/<?php echo $row["anh_mo_ta"];?>" /></td>
          <td width="480" class="product-title"><a href="index.php?page=productdetails&id_sp=<?php echo $row["id_sp"];?>"><?php echo $row["ten_sp"];?></a></td>
        </tr>
        <tr>
          <td><span class="s-left">Giá bán</span> <span class="s-price"><?php echo $row["gia_sp"];?> vnđ</span> <span class="s-vat">(Đã bao gồm VAT)</span></td>
        </tr>
        <tr>
          <td><span class="s-left">Áp dụng cho các khu vực:</span> <span class="s-right">Toàn quốc</span></td>
        </tr>
        <tr>
          <td><span class="s-left">Tình trạng sản phẩm:</span> <span class="s-right">Mới 100%</span></td>
        </tr>
        <tr>
          <td><span class="s-left">Số lượng:</span> <span class="s-right">Đang còn hàng</span></td>
        </tr>
        <tr>
          <td><span class="s-left">Mầu sản phẩm:</span> <span class="s-right">Trắng, đen</span></td>
        </tr>
        <tr>
          <td class="line-break"><a href="index.php?page=showcart&action=add&id_sp=<?php echo $row['id_sp'];?>"><img src="images/add-cart-button.gif" /></a></td>
        </tr>
      </table>
      
<?php }?>      