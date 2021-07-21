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
		$designation = $_POST['designation'];



		$sql = "UPDATE `user` SET name = '$name' , contact = '$contact',password = '$password', official_id = '$official_id' , designation='$designation' WHERE id='$user_id'";

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
		$order_id = $db->insert_id;
		
		$cart_list = fetch_all_data_usingPDO($pdo,"select * from cart where user_id = '$user_id'");

		foreach ($cart_list as $key => $data) {
			

			$product_name = $data['product_name'];
			$category_name = $data['category_name'];
			$quantity = $data['choose_quantity'];
			$sql = "INSERT INTO requisition_order_product_list (product_name, category_name, order_id, quantity) VALUES ('$product_name','$category_name','$order_id', '$quantity')";
			$db->query($sql);


			//updating the product quantity from the product table
			$product_id = $data['product_id'];
			$updating_product_quantity_sql = "UPDATE `product` SET quantity = quantity - '$quantity' WHERE id='$product_id'";
			$db->query($updating_product_quantity_sql);


			//deleting from the cart
			$cart_id = $data['id'];
			$delete_from_cart_sql = "delete from cart where id='$cart_id';";
			$db->query($delete_from_cart_sql);

		}


		header("Location: requisition_history.php?orderConfirm=on");


	}


?>