<?php

	session_start();
	include 'database.php';

	$customer = new customer (Conn::checkConn());
	$result = $customer->createCurrCampInfo($_SESSION['customerID'], $_POST['createCampName'], $_POST['createCampVideoURL'], $_POST['createCampAbout'], $_POST['createCampPricing']);

	if ($result === "true") {
		$array = array(
			'createCampName' =>  $_POST['createCampName'], 
			'createCampVideoURL' => $_POST['createCampVideoURL'], 
			'createCampAbout' => $_POST['createCampAbout'], 
			'createCampPricing' => $_POST['createCampPricing']
			);
		echo json_encode($array);
	} 

?>