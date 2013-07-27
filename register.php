<?php

	session_start();
	include_once 'database.php';
	$customer = new customer(Conn::checkConn());

	if(empty($_POST['companyName'])) {
	$registrationResultMsg = $customer->register($_POST['firstname'], $_POST['lastname'], NULL, $_POST['email'], $_POST['username'], $_POST['password'], $_POST['retypePassword']);
	} else {
	$registrationResultMsg = $customer->register(NULL, NULL, $_POST['companyName'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['retypePassword']);
	}

	echo $registrationResultMsg;


?>