<?php
error_reporting(E_ALL &~ E_NOTICE);
session_start();
include_once("connect/database.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appleshop Home</title>
<link rel="stylesheet" type="text/css" href="index.css" />
<?php
if($_GET['page']=="listproduct" || $_GET['page']=="search_product" || $_GET['page']=="showcart")
	echo "<link rel='stylesheet' type='text/css' href='list-product.css' />";
if($_GET['page']=="productdetails")
	echo "<link rel='stylesheet' type='text/css' href='product-details.css' />";	
?>
</head>
<body bgcolor="#cdcdcd">

<table id="wrapper" align="center" width="980" border="0" cellpadding="0" cellspacing="0">
  <tr height="95">
    <td colspan="3">
    <!-- Header -->
   	  <table id="header" height="95" width="980" border="0" cellspacing="0" cellpadding="0">
          <tr id="line-top" height="19">
            <td colspan="7">&nbsp;</td>
          </tr>
          <tr id="navbar-menu" height="36">
            <td id="apple-icon" width="95" height="36">&nbsp;</td>
            <td class="nav-item"><a href="#">iPad</a></td>
            <td class="nav-item"><a href="#">iPhone</a></td>
            <td class="nav-item"><a href="#">iPod</a></td>
            <td class="nav-item"><a href="#">iTnes</a></td>
            <td class="nav-item"><a href="#">Suport</a></td>
            <td id="nav-bg">&nbsp;</td>
          </tr>
          <tr id="line-bottom" height="40">
            <td colspan="7">&nbsp;</td>
          </tr>
        </table>
    <!-- End Header -->    </td>
  </tr>
  <tr id="body">
    <td id="left-sidebar" valign="top" width="180">
    <!-- Left Sidebar -->
   	 <?php 
     include_once("modules/mod_search/search.php");
	 include_once("modules/mod_main_menu/main_menu.php");
     ?>
        <table width="180" id="banner" border="0" cellspacing="0" cellpadding="0">
        	<tr>
            	<td><img src="images/banner-ipad2.gif" /></td>
            </tr>
            <tr>
            	<td><img src="images/banner-iphone4.gif" /></td>
            </tr>
            <tr>
            	<td><img src="images/banner-ipod.gif"gif" /></td>
            </tr>
        </table>
        
    <!-- End Left Sidebar -->    </td>
    <td align="center" valign="top" id="main-content" width="620">
    <!-- Main Content -->
    	<?php
        switch($_GET['page'])
		{
			case "listproduct":
			include_once("modules/mod_/list_product.php");
			break;
			case "productdetails":
			include_once("modules/mod_/product_details.php");
			break;
			case "search_product":
			include_once("modules/mod_search/search_product.php");
			break;
			case "showcart":
			include_once("modules/mod_cart/showcart.php");
			break;
			default:
			include_once("modules/mod_featured_product/featured_product.php");
			include_once("modules/mod_lastest_product/lastest_product.php");
			include_once("modules/mod_product_news/product_news.php");	
		}
		?>

               
      <!-- End Main Content -->
    </td>
    <td id="right-sidebar" valign="top" width="180">
    <!-- Right Sidebar -->
    	<?php 
		include_once("modules/mod_cart/cart.php");
		include_once("modules/mod_rand_product/rand_product.php");
		include_once("modules/mod_counter/counter.php");
		?>
    <!-- End Right Sidebar -->
    </td>
  </tr>
  <tr>
    <td id="footer" colspan="3">
    <!-- Footer -->
   	  <table align="left" id="bottom-menu" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><a href="#">home</a></td>
            <td><a href="#">about us</a></td>
            <td><a href="#">site map</a></td>
            <td><a href="#">contact us</a></td>
            <td><a href="#">forum</a></td>
          </tr>
        </table>
        
        <table align="right" id="scroll-to-top">
        	<tr>
            	<td><a href="#">top</a></td>
          </tr>
        </table>
        
        <table id="copyright">
        	<tr>
            	<td>Copyright © 2011 VietPro.Us. All rights reserved.</td>
            </tr>
        </table>
    <!-- End Footer -->    </td>
  </tr>
</table>
</body>
</html>
