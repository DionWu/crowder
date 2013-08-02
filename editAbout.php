<?php

	session_start();
	include 'database.php';
	$aboutObj = new customerAbout( Conn::checkConn());
	$result = $aboutObj->updateCustomerAbout($_SESSION['customerID'], $_POST['userAbout']);

	if ($result === "true") {
		echo $_POST['userAbout'];
	} else {
		echo "There was an error. Please try again";
	}
?>