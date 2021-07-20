<?php

	require '../db_config.php';
	require 'custom_function.php';
	session_start();

	//product adding to cart
	if(isset($_POST['btn-addToCart']))
	{

		$user_id = $_SESSION['user_id'];

		$product_id= $_POST['product_id'];
		$product_name= $_POST['product_name'];
		$category_name= $_POST['category_name'];
		$choose_quantity= $_POST['choose_quantity'];

		//for return to product page with master category name 
		$master_category_name = $_POST['master_category_name'];
		
		
		//checking if this product already added to cart or not
		$checking_product_exist_in_Cart = fetch_all_data_usingDB($db,"select count(*) from cart where user_id = '$user_id' and product_id='$product_id'");

		if((int)$checking_product_exist_in_Cart['count(*)'] >= 1 )
		{
		
			header("Location: product.php?product_master_category=$master_category_name&exist=on");
			die();
		}
		else{

			$sql = "INSERT INTO cart (product_name, product_id, category_name, choose_quantity,user_id) VALUES ('$product_name','$product_id','$category_name','$choose_quantity','$user_id')";
			$db->query($sql);

			header("Location: product.php?product_master_category=$master_category_name&update=on");
		}
		

	}



	//User profile Edit or Update
	if(isset($_POST['btn-ProfileUpdate']))
	{
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$password = $_POST['password'];
		$official_id = $_POST['official_id'];


		$sql = "UPDATE `user` SET name = '$name' , contact = '$contact',password = '$password', official_id = '$official_id' WHERE id='$user_id'";

		$db->query($sql);

		header("Location: profile.php?update=on");


	}


	//deleting items from requisition list / CART
	if(isset($_GET['delete_CART_productID']))
	{
		$id = $_GET['delete_CART_productID'];

		$sql = "delete from cart where id='$id';";
		$db->query($sql);
		header("Location: requisition_list.php?delete=on");		
		
	}

	//deleting ALL items from the requisition list/CART
	if(isset($_GET['clear_cart']))
	{
		$id = $_GET['clear_cart'];

		$sql = "delete from cart where user_id='$id';";
		$db->query($sql);
		header("Location: requisition_list.php?delete=on");		
	}


	//placing orders for requistions for billing

	if(isset($_POST['btn_requisition_order_to_billing']))
	{
		$user_id = $_POST['user_id'];
		header("Location: requisition_billing.php?user_id=$user_id");		
	}


	//confirming requisition order
	if(isset($_POST['btn-RequisitionConfirm']))
	{	

		$user_id = $_POST['user_id'];
		$requisition_contact = $_POST['requisition_contact'];
		$requisition_name = $_POST['requisition_name'];

		$sql = "INSERT INTO requisition_order_list (user_id, order_name, order_contact) VALUES ('$user_id','$requisition_name','$requisition_contact')";
		
		$db->query($sql);

		header("Location: index.php?orderConfirm=on");


	}


?>