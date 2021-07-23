<?php 

	
	require '../db_config.php';
	require 'custom_function.php';

	$total_products = fetch_all_data_usingDB($db,"select count(*) as 'count' from product");
	$total_users = fetch_all_data_usingDB($db,"select count(*) as 'count' from user");
	$total_requisition = fetch_all_data_usingDB($db,"select count(*) as 'count' from requisition_order_list where status = 1");
	$total_requisition_pending = fetch_all_data_usingDB($db,"select count(*) as 'count' from requisition_order_list where status = 0");


?>