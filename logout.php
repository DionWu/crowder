<?php

	session_start();
	include 'database.php';
	$customer = new customer(Conn::checkConn());
	$customer->logout();
	header("Location: loginPage.php");

?>