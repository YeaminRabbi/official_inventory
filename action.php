<?php 
	
 	require 'db_config.php';

 	if(isset($_POST['btn-register_user']))
 	{
 		$name = $_POST['name'];
 		$email = $_POST['email'];
 		$user_type = $_POST['user_type'];
 		$contact = $_POST['contact'];

 		
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

 		$sql = "INSERT INTO user (name, email, contact, user_type, school_division, official_id,password) VALUES ('$name','$email','$contact','$user_type','$school_division','$official_id','$password')";

		if ($db->query($sql) === TRUE) {
		  header('Location: index.php?msg=inserted');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}


 	}

?>