<?php

	session_start();
	include 'database.php';
	$customer = new customer( Conn::checkConn());
	$result = $customer->updateCustomerAbout($_SESSION['customerID'], $_POST['userAbout']);

	if ($result === "true") {
		echo $_POST['userAbout'];
	} else {
		echo "There was an error. Please try again";
	}
?>