<?php
	$action=$_GET['action'];
	switch($action)
	{
		case "show":
		if($_SESSION['cart'] != NULL)
			include_once("modules/mod_cart/show.php");
		else
			echo "Giỏ hàng trống!";
		break;
		case "add":
		$id_sp=$_GET['id_sp'];
		if($_SESSION['cart'][$id_sp]!=NULL)
		{
			$prd=$_SESSION['cart'][$id_sp]+1;
		}
		else{
			$prd=1;	
		}
		$_SESSION['cart'][$id_sp]=$prd;
		include_once("modules/mod_cart/show.php");
		break;
		case "update":
		foreach($_SESSION['cart'] as $id_sp => $prd)
		{
			$_SESSION['cart'][$id_sp]=$_POST['soluong'.$id_sp];
			if($_POST['soluong'.$id_sp]==0)
			{
				unset($_SESSION['cart'][$id_sp]);	
			}
		}
		include_once("modules/mod_cart/show.php");
		break;
		case "delete":
		session_destroy();
		echo "Đã xóa giỏ hàng";
		break;
	}
?>
