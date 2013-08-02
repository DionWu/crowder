<html>
<head>
	<link rel="stylesheet" type="text/css" href="crowder.css" />
</head>

<body>

	<?php
		require 'header.php';
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
					$about = $aboutObj->fetchCustomerAbout($_SESSION['customerID']);
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


		<div id="customerSidebar">
			<button type="button" id="editSocialButton">Edit</button>

			<form id="editSocialForm">
				Add/Remove Social Networks
				<img src="images/social/facebook.png"> <input type="text" name="facebook"><br>
				<img src="images/social/twitter.png"> <input type="text" name="twitter"><br>
				<img src="images/social/youtube.png"> <input type="text" name="youtube"><br>
				<img src="images/social/googleplus.png"> <input type="text" name="googleplus"><br>
				<img src="images/social/wordpress.png"> <input type="text" name="wordpress"><br>
				<img src="images/social/instagram.png"> <input type="text" name="instagram"><br>
				<img src="images/social/flickr.png"> <input type="text" name="flickr"><br>
				<img src="images/social/blogger.png"> <input type="text" name="blogger"><br>
				<img src="images/social/tumblr.png"> <input type="text" name="tumblr"><br>
				<img src="images/social/pinterest.png"> <input type="text" name="pinterest"><br>
				<a href="#" id="showMoreSocialLink">Show More</a><br>
				<div id="editAdditionalSocial">
					<img src="images/social/linkedin.png"> <input type="text" name="linkedinuser"><br>
					<img src="images/social/linkedin.png"> <input type="text" name="linkedincompany"><br>
					<img src="images/social/foursquare.png"> <input type="text" name="foursquare"><br>
					<img src="images/social/vine.png"> <input type="text" name="vine"><br>
					<img src="images/social/vimeo.png"> <input type="text" name="vimeo"><br>
					<img src="images/social/yelp.png"> <input type="text" name="yelp"><br>
					<img src="images/social/livejournal.png"> <input type="text" name="livejournal"><br>
					<img src="images/social/reddit.png"> <input type="text" name="reddit"><br>
					<img src="images/social/github.png"> <input type="text" name="github"><br>
					<img src="images/social/stackoverflow.png"> <input type="text" name="stackoverflow"><br>
					<img src="images/social/spotify.png"> <input type="text" name="spotify"><br>
					<img src="images/social/soundcloud.png"> <input type="text" name="soundcloud"><br>
					<img src="images/social/rss.png"> <input type="text" name="rss"><br>
					<a href="#" id="showLessSocialLink">Show Less</a><br>
				</div>

				<input type="submit">
			</form>

			<div id="customerSocial">
				<ul>
					<li> <img src="images/social/.png"> facebook/dionwu </li>
					<li> <img src="images/social/.png"> twitter/@DionWu </li>
					<li> <img src="images/social/.png"> youtube/thedionwu </li>
					<li> <img src="images/social/.png"> instagram/wu_dion </li>
					<li> <img src="images/social/.png"> pinterest/dionwu </li>
					<li> <img src="images/social/.png"> vine/wu_dion </li>
					<li> <img src="images/social/.png"> tumblr/wu_dion </li>
				</ul>
			</div>

			<div id="customerActivityContainer">
				<h3> Activity Feed </h3>
				<div class="customerActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="customerActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="customerActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="customerActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="customerActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
			</div>
		</div>

		<div id="companyMainBody">
			<button type="button" id="editCurrCampButton"> Edit </button>


			<!-- COMPANY CURRENT CAMPAIGN -->
			<div id="companyCurrCampContainer">

				<?php
					$currCampInfoArray = $campObj->fetchCurrCampInfo($_SESSION['customerID']);
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