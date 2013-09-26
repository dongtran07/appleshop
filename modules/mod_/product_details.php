<?php
$id_sp = $_GET["id_sp"];
$sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
?>
<table class="product-item" width="598" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td id="img-thumb" align="center" valign="middle" width="210" height="200" rowspan="7"><img width=90 height=160 src="anh_mo_ta/<?php echo $row["anh_mo_ta"];?>" /></td>
          <td width="480" class="product-title"><?php echo $row["ten_sp"];?></td>
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
        <tr>
          <td id="content-details" colspan="2" align="justify" valign="top">
          <?php echo $row["chitiet_sp"];?>
          </td>
        </tr>
      </table>