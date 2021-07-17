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

?>