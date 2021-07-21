<?php 
	
 	require 'db_config.php';

 	if(isset($_POST['btn-register_user']))
 	{
 		$name = $_POST['name'];
 		$email = $_POST['email'];
 		$user_type = $_POST['user_type'];
 		$contact = $_POST['contact'];
 		$designation = $_POST['designation'];

 		
 		if(!empty($_POST['school']))
 		{
 			$school_division = $_POST['school'];
 		}
 		else
 		{
 			$school_division = $_POST['division'];
 		}

 		$official_id = $_POST['official_id'];
 		$password = $_POST['password'];

 		$sql = "INSERT INTO user (name, email, contact, user_type, school_division, official_id,designation,password) VALUES ('$name','$email','$contact','$user_type','$school_division','$official_id','$designation','$password')";

		if ($db->query($sql) === TRUE) {
		  header('Location: index.php?msg=inserted');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}


 	}


	//user login
	if(isset($_POST['btn-login_user']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "Select count(*),id,name from user where email='$email' and password='$password' and status =1;";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		


		if($row['count(*)']=="1")
		{

			session_start();
			$_SESSION['user']="VERIFIED";
			$_SESSION['user_id']=$row['id'];
			$_SESSION['user_name']=$row['name'];

			header("Location: user/index.php");
		}
		else
		{
			header("Location: index.php?emsg=error");
		}


	}




?>