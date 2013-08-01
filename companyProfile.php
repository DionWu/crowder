<html>
<head>
	<link rel="stylesheet" type="text/css" href="crowder.css" />
</head>

<body>

	<?php
		require 'header.php';
		$customer = new customer (Conn::checkConn());
	?>

	<div class="pageBody">

		<div id="companyPic">
			<img src="images/placeholder.jpg">
		</div>

		<div id="companyInfo">
			<h1 id="companyName"> <?php echo $_SESSION['companyName'] ?> </h1>
			<div id="companyMedals"> 
				<ul>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
				</ul>
			</div>
			<button type="button" id="editAboutButton">Edit</button>
			<?php
					$about = $customer->fetchCustomerAbout($_SESSION['customerID']);
			?>
			<form id="editAboutForm">
				<textarea id="editAboutTextarea" maxlength="500" name="userAbout"><?php echo $about['about'];?></textarea>
				<input type="submit">
			</form>
			<div id="About">
				<?php
					if (!$about['about']) {
						echo "Edit your description here!";
					} else {
						echo $about['about'];
					}
				?>
			</div>
		</div>


		<div id="companySidebar">
			<div id="companySocial">
				<ul>
					<li> <img src="images/badge.png"> facebook/dionwu </li>
					<li> <img src="images/badge.png"> twitter/@DionWu </li>
					<li> <img src="images/badge.png"> youtube/thedionwu </li>
					<li> <img src="images/badge.png"> instagram/wu_dion </li>
					<li> <img src="images/badge.png"> pinterest/dionwu </li>
					<li> <img src="images/badge.png"> vine/wu_dion </li>
					<li> <img src="images/badge.png"> tumblr/wu_dion </li>
				</ul>
			</div>

			<div id="companyActivityContainer">
				<h3> Activity Feed </h3>
				<div class="companyActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="companyActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="companyActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="companyActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="companyActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
			</div>
		</div>

		<div id="companyMainBody">
			<button type="button" id="editCurrCampButton"> Edit </button>


			<!-- COMPANY CURRENT CAMPAIGN -->
			<div id="companyCurrCampContainer">

				<?php
					$currCampInfoArray = $customer->fetchCurrCampInfo($_SESSION['customerID']);
					if (empty($currCampInfoArray)) {
				?>

				<div id="companyCurrCampNULL">
					<p>Looks like you have no Campaign running right now. Why don't you start one?</p>
					<a href="createCampPage.php"><button type="submit" id="createCurrCampButton">Start a Campaign Now!</button></a>
				</div>

					<?php
					} else {
					?>

				<div id="companyCurrCamp">
					<h3 id="companyCurrCampName"> <?php echo $currCampInfoArray['campName']; ?></h3>
						<?php
							if ($currCampInfoArray['campVideoURL']) {
						?>
					<div id="companyCurrCampVideo">
						<iframe width="560" height="315" src= <?php echo $currCampInfoArray['campVideoURL']; ?> frameborder="0" allowfullscreen></iframe>
					</div>
						<?php
							};
						?>
					<div id="companyCurrCampInfo">
						<h4> What is this Campaign About? </h4>
						<div id="companyCurrCampAbout"><?php echo $currCampInfoArray['campAbout']; ?></div>
						<h4> Pricing Options </h4>
						<div id="companyCurrCampPricing"><?php echo $currCampInfoArray['campPricing'];?></div>
					</div>
				</div>
					
			</div>

			<form id="editCurrCampForm">
				<label for="editCampName">Campaign Name: </label>
				<textarea id="editCampName" name="editCampName" maxlength="255"><?php echo $currCampInfoArray['campName']; ?></textarea> <br>
				<label for="editCampVideoURL">Enter Video Embed URL (optional): </label>
				<textarea id="editCampVideoURL" name="editCampVideoURL" maxlength="255"><?php echo $currCampInfoArray['campVideoURL']; ?></textarea> <br>
				<label for="editCampAbout">Describe what this campaign is about</label><br>
				<textarea id="editCampAbout" name="editCampAbout" maxlength="1000"><?php echo $currCampInfoArray['campAbout']; ?></textarea> <br>
				<label for="editCampPricing">What are the Pricing Options? </label><br>
				<textarea id="editCampPricing" name="editCampPricing" maxlength="500"><?php echo $currCampInfoArray['campPricing'];?></textarea><br>
				<input type="submit">
			</form>
					<?php
						};
					?>
		</div>

	</div>


	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="functions.js"></script>
</body>
</html>