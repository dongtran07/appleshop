<?php
ob_start();
session_start();
error_reporting(E_ALL &~ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel</title>
<link rel="stylesheet" type="text/css" href="admincp.css" />
<?php
	switch($_GET["page"])
	{
		case "danhmuc":
		echo "<link rel='stylesheet' type='text/css' href='danhmuc.css' />";
		break;
		case "formdanhmuc":
		echo "<link rel='stylesheet' type='text/css' href='formdanhmuc.css' />";
		break;
		case "suadanhmuc":
		echo "<link rel='stylesheet' type='text/css' href='suadanhmuc.css' />";
		break;
		case "sanpham":
		echo "<link rel='stylesheet' type='text/css' href='sanpham.css' />";
		break;
		case "formsanpham":
		echo "<link rel='stylesheet' type='text/css' href='formsanpham.css' />";
		break;
		case "suasanpham":
		echo "<link rel='stylesheet' type='text/css' href='suasanpham.css' />";
		break;
		case "nguoidung":
		echo "<link rel='stylesheet' type='text/css' href='nguoidung.css' />";
		break;
		default:
		echo "<link rel='stylesheet' type='text/css' href='gioithieu.css' />";	
	}
?>
</head>
<body>
<?php
if($_SESSION["user"] && $_SESSION["pass"])
{
?>
<table id="wrapper" width="900px" border="0px" cellpadding="0px" cellspacing="0px">
	<!-- Header -->
	<tr>
    	<td colspan="2" id="header">
        	<table border="0px" cellpadding="0px" cellspacing="0px">
            	<tr>
                	<td rowspan="2"><img src="images/admincp-logo.gif" /></td>
                    <td><img src="images/admincp-banner.gif" /></td>
                </tr>
                <tr>
                    <td height="30px" id="navbar">
                    	<table height="30px" border="0px" cellpadding="0px" cellspacing="0px">
                        	<tr>
                            	<td><a href="#">trang chủ</a></td>
                              	<td><a href="#">giới thiệu</a></td>
                                <td><a href="#">liên hệ</a></td>
                                <td><a href="#">cấu hình</a></td>
                                <td><a href="#">trợ giúp</a></td>
                                <td><a href="#">xem website</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr height="31px">
                	<td colspan="2" id="line-header"></td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- End Header -->
    
    <!-- Body -->
    <tr id="body">
    	<td align="left" valign="top" width="250px">
        	<!-- Left Menu -->
            <table width="250px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td>quản lý thực đơn</td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php">trang chủ</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=danhmuc">quản lý danh mục chính</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=sanpham">quản lý sản phẩm</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=nguoidung">quản lý người dùng</a></td>
                </tr>
                <tr height="30px">
                    <td></td>
                </tr>
            </table>
            <!-- End Left Menu -->
           
            <!-- User -->
            <table width="250px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td>thông tin đăng nhập</td>
                </tr>
                <tr height="30px">
                	<td id="user-info">Xin chào <b><?php if($_SESSION["user"]) echo $_SESSION["user"];?></b> đã đăng nhập thành công vào hệ thống quản trị!</td>
                </tr>
                <tr height="30px">
                	<td id="logout" align="right"><a href="dangxuat.php">đăng xuất</a></td>
                </tr>
            </table>
            <!-- End User -->
        </td>
            
        <td align="right" valign="top" width="650px">
            <!-- Main Content -->
            <?php
            	switch($_GET["page"])
				{
					case "danhmuc":
					include_once("danhmuc.php");
					break;
					case "formdanhmuc":
					include_once("formdanhmuc.php");
					break;
					case "suadanhmuc":
					include_once("suadanhmuc.php");
					break;
					case "xoadm":
					include_once("xoadanhmuc.php");
					break;
					case "sanpham":
					include_once("sanpham.php");
					break;
					case "formsanpham":
					include_once("formsanpham.php");
					break;
					case "suasanpham":
					include_once("suasanpham.php");
					break;
					case "xoasanpham":
					include_once("xoasanpham.php");
					break;
					case "nguoidung":
					include_once("nguoidung.php");
					break;
					default:
					include_once("gioithieu.php");
						
				}
			?>
            <!-- End Main Content -->
        </td>
    </tr>
    <!-- End Body -->
    
    <!-- Footer -->
    <tr height="62px">
    	<td id="footer" colspan="2" align="center" valign="middle">Copyright © 2011 VietPro.Us. All rights reserved.</td>
    </tr>
    <!-- End Footer -->
</table>
<?php
}
else{
	header("location:index.php");	
}
?>
</body>
</html>
