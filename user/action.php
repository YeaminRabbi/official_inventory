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


?>