<?php 
	
	require '../db_config.php';
	require 'custom_function.php';


	//admin login
	if(isset($_POST['btn-login_admin']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "Select count(*),id,name from admin where email='$email' and password='$password';";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		


		if($row['count(*)']=="1")
		{

			session_start();
			$_SESSION['admin']="VERIFIED";
			$_SESSION['admin_id']=$row['id'];
			$_SESSION['admin_name']=$row['name'];

			header("Location: index.php");
		}
		else
		{
			header("Location: login.php?msg=error");
		}


	}


	//category insert
	if(isset($_POST['btn-CategoryInsert']))
	{
		$category_name= $_POST['category_name'];
		$master_category_name= $_POST['master_category_name'];
		

		$sql = "INSERT INTO category (category_name, master_category_name) VALUES ('$category_name','$master_category_name')";

		if ($db->query($sql) === TRUE) {
		  header('Location: category_create.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}


	//category delete 
	if(isset($_GET['delete_category_id']))
	{
		$id = $_GET['delete_category_id'];
		
		$sql = "delete from category where id='$id';";
		$db->query($sql);
		header("Location: category_list.php?delete=on");		
		
	}

	//catgory update
	if(isset($_POST['btn-CategoryUpdate'])){
		$category_id = $_POST['category_id'];
		$category_name= $_POST['category_name'];
		$master_category_name= $_POST['master_category_name'];
		
		$sql = "UPDATE `category` SET category_name = '$category_name' , master_category_name = '$master_category_name' WHERE id='$category_id'";

		$db->query($sql);

		header("Location: category_list.php?update=on");
	}

	//product insert
	if(isset($_POST['btn-ProductInsert']))
	{
		$category_id= $_POST['category_id'];
		$product_name= $_POST['product_name'];
		$product_quantity= $_POST['product_quantity'];
		

		$sql = "INSERT INTO product (product_name,quantity, category_id) VALUES ('$product_name','$product_quantity', '$category_id')";

		if ($db->query($sql) === TRUE) {
		  header('Location: product_create.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}

	//product delete
	if(isset($_GET['delete_product_id']))
	{
		$id = $_GET['delete_product_id'];
		
		$sql = "delete from product where id='$id';";
		$db->query($sql);
		header("Location: product_list.php?delete=on");		
		
	}

	//product update
	if(isset($_POST['btn-ProductUpdate'])){
		
		$product_id = $_POST['product_id'];		
		$category_id = $_POST['category_id'];
		$product_name= $_POST['product_name'];
		$quantity= $_POST['quantity'];
		
		$sql = "UPDATE `product` SET product_name = '$product_name' , category_id = '$category_id',quantity = '$quantity' WHERE id='$product_id'";

		$db->query($sql);

		header("Location: product_list.php?update=on");
	}

?>