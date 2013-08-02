<?php
	session_start();
	include 'database.php';

	$socialObj = new social (Conn::checkConn());

	$socialArray = array(
		$_POST['facebook'], 
		$_POST['twitter'], 
		$_POST['youtube'],
		$_POST['googleplus'],
		$_POST['wordpress'],
		$_POST['instagram'],
		$_POST['flickr'],
		$_POST['blogger'],
		$_POST['tumblr'],
		$_POST['pinterest'],
		$_POST['linkedinuser'],
		$_POST['linkedincompany'],
		$_POST['foursquare'],
		$_POST['vine'],
		$_POST['vimeo'],
		$_POST['yelp'],
		$_POST['livejournal'],
		$_POST['reddit'],
		$_POST['github'],
		$_POST['stackoverflow'],
		$_POST['spotify'],
		$_POST['soundcloud'],
		$_POST['rss']
		);

	$result = $socialObj->createCustomerSocial($_SESSION['customerID'], $socialArray);

	print_r($result);
	
?>