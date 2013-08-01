<?php

	session_start();
	include 'database.php';

	$customer = new customer (Conn::checkConn());
	$result = $customer->updateCurrCampInfo($_SESSION['customerID'], $_POST['editCampName'], $_POST['editCampVideoURL'], $_POST['editCampAbout'], $_POST['editCampPricing']);

	if ($result === "true") {
		$array = array(
			'editCampName' =>  $_POST['editCampName'], 
			'editCampVideoURL' => $_POST['editCampVideoURL'], 
			'editCampAbout' => $_POST['editCampAbout'], 
			'editCampPricing' => $_POST['editCampPricing']
			);
		echo json_encode($array);
	} 

?>