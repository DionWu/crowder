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
				<!-- For loop to show all available social sites to display on crowder, while including a show more/less link -->
				<?php 
					$customerSocialList = $socialObj->fetchCustomerSocial($_SESSION['customerID']);
					$editSocialFormCounter=0;
					while(list($key, $value) = each($customerSocialList[0])) {
						if(!empty($value) && ($key !== 'customerID')) {
							echo "<img src='images/social/" . $key . ".png'> <input type='text' name='" . $key . "' value='" . $value . "'><br>";
						} else if ($key !== 'customerID') {
							echo "<img src='images/social/" . $key . ".png'> <input type='text' name='" . $key . "' value=''><br>";
						}
						$editSocialFormCounter++;
						if ($editSocialFormCounter === 11) {
							echo "<a href='#' id='showMoreEditSocialLink'>Show More</a><br>
							<div id='editAdditionalSocial'>";
						} else if ($editSocialFormCounter === 24) {
							echo "<a href='#'id='showLessEditSocialLink'>Show Less</a><br>
							</div>";
						}
					} 
				?>
				<input type="submit">
			</form>


			<div id="customerSocialContainer">
				<?php
				$customerSocialList = $socialObj->fetchCustomerSocial($_SESSION['customerID']); 
				if (!empty($customerSocialList)) {
				?>
					<!--Displaying only the social networks customer has decided to make public --> 
					<div id="customerSocial">
						<ul>
							<?php
							$customerSocialCounter=0;
							while(list($key, $value) = each($customerSocialList[0])) {

								// If total social networks > 10, display show more link
								if ($customerSocialCounter === 10) {
									?>
									<br><a href='#' id='showMoreSocialLink'>Show More</a>
									<div id='additionalSocial'>
									<?php 
								} 
								// Displays list of social networks that users provide info for
								if(!empty($value) && ($key !== 'customerID')) { 
									
									echo "<li>";
										
											//Array for social network links
											$socialLinkArray = array(
												'facebook' => 'facebook.com/',
												'twitter' => 'twitter.com/',
												'youtube' => 'youtube.com/user/',
												'googleplus' => 'plus.google.com/',
												'wordpress' => '.wordpress.com/',
												'instagram' => 'instagram.com/',
												'flickr' => 'flickr.com/photos',
												'blogger' => '.blogspot.com/',
												'tumblr' => '.tumblr.com/',
												'pinterest' => 'pinterest.com/',
												'linkedinuser' => 'linkedin.com/in/',
												'linkedincompany' => 'linkedin.com/company/',
												'foursquare' => 'foursquare.com/',
												'vine' => 'vine://user/',
												'vimeo' => 'vimeo.com/',
												'yelp' => '.yelp.com/',
												'livejournal' => '.livejournal.com/',
												'reddit' => 'reddit.com/user/',
												'github' => 'github.com/',
												'stackoverflow' => 'stackoverflow/users/',
												'spotify' => 'open.spotify.com/user/',
												'soundcloud' => 'soundcloud.com/',
												'rss' => '',
												);

											// Echoing links based on social network type
											if ($key === 'wordpress' || $key === 'blogger' || $key === 'tumblr' || $key === 'yelp' || $key === 'livejournal') {
												echo "<a href='https://".$value.$socialLinkArray[$key]."'>";
											} else if ($key==='rss'){
												echo "<a href='https://".$value."'>";
											} else {
												echo "<a href='https://".$socialLinkArray[$key].$value."'>";
											}
										
										// Displaying proper image & value 
										echo "<img src='images/social/" . $key . ".png'>";
										
										if ($key === 'twitter') {
											echo "<span class='socialLink'> @" . $value . "</span></a>";
										} else if ($key ==='googleplus') {
											echo "<span class='socialLink'> " . $_SESSION['companyName'] . "'s g+ </span></a>";
										} else {
											echo "<span class='socialLink'> /" . $value . "</span></a>";
										}
										
									echo "</li>";
									
									// Incrementing customerSocialCounter to count how many social networks displayed
									$customerSocialCounter++;
								} 

							}
							// At end, if social networks > 10, display show less link 
							if ($customerSocialCounter > 10) {
								?>
								<br><a href='#'id='showLessSocialLink'>Show Less</a><br>
								</div>
								<?php
							}	
							?>
						</ul>
					</div>
				
				<?php
				} 
				else {
				?>
					<!-- Displaying a new div if user has not yet added any social networks -->
					<div id="customerSocialNULL">	
						<p> Looks like you aren't showing off your social media prowess! </p> 
						<button type='button' id='createCustomerSocialButton'>Get Started!</button>
					</div>
				<?php
				}		
				?>
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