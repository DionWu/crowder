<html>
<head>
	<link rel="stylesheet" type="text/css" href="crowder.css" />
</head>

<body>
	<?php 
		require 'header.php';
	?>
		<div class="pageBody">
			<form id="createCurrCampForm">
				<label for="createCampName">CREATE Campaign Name: </label>
				<textarea id="createCampName" name="createCampName" maxlength="255"></textarea> <br>
				<label for="createCampVideoURL">Enter Video Embed URL (optional): </label>
				<textarea id="createCampVideoURL" name="createCampVideoURL" maxlength="255"></textarea> <br>
				<label for="createCampAbout">Describe what this campaign is about</label><br>
				<textarea id="createCampAbout" name="createCampAbout" maxlength="1000"></textarea> <br>
				<label for="createCampPricing">What are the Pricing Options? </label><br>
				<textarea id="createCampPricing" name="createCampPricing" maxlength="500"></textarea><br>
				<input type="submit">
			</form>
		</div>
		
	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="functions.js"></script>
</body>
</html>