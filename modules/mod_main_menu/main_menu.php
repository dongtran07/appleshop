<?php
$query="SELECT * FROM danhmuc_sanpham ORDER BY id_dm ASC";
$result=mysql_query($query);

?> 
 <table class="sidebar-menu" id="main-menu" width="180" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="menu-title">main menu</td>
          </tr>
<?php
while($row=mysql_fetch_array($result))
{
?>          
          <tr>
            <td class="menu-item"><a href="index.php?page=listproduct&id_dm=<?php echo $row['id_dm'];?>"><?php echo $row['ten_dm'];?></a></td>
          </tr>
<?php
}
?>         
        </table>