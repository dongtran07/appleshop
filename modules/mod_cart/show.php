<form method="post" action="index.php?page=showcart&action=update">   	
    <table id="title-bar" width="598" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="598" height="35">Giỏ hàng</td>
      </tr>
    </table>
<?php	
	$tong=0;
	foreach($_SESSION['cart'] as $id_sp => $prd)
	{
		
		$query="SELECT * FROM sanpham WHERE id_sp = '$id_sp'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
?>
	<table class="product-item" width="598" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle" width="120" height="200" rowspan="7"><img width=90 height=160 src="anh_mo_ta/<?php echo $row["anh_mo_ta"];?>" /></td>
          <td width="480" class="product-title"><a href="index.php?page=productdetails&id_sp=<?php echo $row["id_sp"];?>"><?php echo $row["ten_sp"];?></a></td>
        </tr>
        <tr>
          <td><span class="s-left">Giá bán</span> <span class="s-price"><?php echo $row["gia_sp"];?> vnđ</span> <span class="s-vat">(Đã bao gồm VAT)</span></td>
        </tr>
        <tr>
          <td><span class="s-left">Số lượng:</span> <span class="s-right"><input type="text" name="soluong<?php echo $row['id_sp'];?>" value="<?php echo $prd;?>" /></span></td>
        </tr>
        <tr>
          <td><span class="s-left">Thành tiền</span> <span class="s-price"><?php echo ($row["gia_sp"]*$prd);?> vnđ</span></td>
        </tr>
      </table>
<?php
	$tong=$tong + $row['gia_sp']*$prd;			
	}
?>
<table class="product-item" width="598" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td><span class="s-left">Tổng tiền</span> <span class="s-price"><?php echo $tong;?> vnđ</span></td>
        </tr>
</table>
<table align="left">
<tr>
          <td class="line-break"><input type="submit" value="Update" /></td>
          <td class="line-break"><a href="index.php?page=showcart&action=delete">Xóa giỏ hàng</a>
        </tr>
</table>
</form>