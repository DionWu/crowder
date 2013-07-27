<?php

	session_start();
	include 'database.php';
	$customer = new customer(Conn::checkConn());
	$loginResultMsg = $customer->login($_POST['username'], $_POST['password']); 

	echo $loginResultMsg;


?>