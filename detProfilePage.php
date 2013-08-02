<?php
	session_start();
	if (!$_SESSION['companyName']) {
		header("Location: userProfile.php");
	} else {
		header("Location: companyProfile.php");
	}

?>