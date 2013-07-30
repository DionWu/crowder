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

		<div id="companyAbout">
			<h1 id="companyName"> <?php echo $_SESSION['companyName'] ?> </h1>
			<div id="companyMedals"> 
				<ul>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
				</ul>
			</div>
			<p id="About"> Wallit is a company that was established blah blah blah sample text.  Wallit is a company that was established blah blah blah sample text.  Wallit is a company that was established blah blah blah sample text.  Wallit is a company that was established blah blah blah sample text.  Wallit is a company that was established blah blah blah sample text. </p>
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

			<div id="companyCurrCamp">
				<h3 id="companyCurrCampName"> Finding User Panel Members </h3>
				<button type="button"> Apply Here</button>
				<div id="companyCurrCampVideo">
					<iframe width="560" height="315" src="//www.youtube.com/embed/Mx1Cy3smRr0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div id="companyCurrCampAbout">
					<h4> What is this Campaign About? </h4>
					<p> Wallit is currently launching it's app in the beta stage and we're looking for early stage adopters to not only help us spread the word of this product but also be early testers! Go User Panel! Wallit is currently launching it's app in the beta stage and we're looking for early stage adopters to not only help us spread the word of this product but also be early testers! Go User Panel! Wallit is currently launching it's app in the beta stage and we're looking for early stage adopters to not only help us spread the word of this product but also be early testers! Go User Panel! </p>

					<p> We need you do testing statement sentence testing statement sentence. We need you do testing statement sentence testing statement sentence We need you do tng statement sentence testing statement sentence We need you do testing statement sentence testin sentence testing statement sentence. W testing statement setesting statement sentence We need you do testing statement sentence testing statement sentence We need you dog statement sentence testing statement sentence. We need you do testing statement sentence testing statentence We need you do testing statement sentence testing statement sentence We need you do testing statement sentence testing statement sentence. </p>

					<h4> Pricing Options </h4>
					<ul id="pricingOptions">
						<li> 25 USD per 1000 clicks </li>
						<li> 35 USD per 100 video views </li>
						<li> 10% of all purchases </li>
						<li> 15% off coupon to use </li>
					</ul>

					<p> Interested in being a Crowder for <?php echo $_SESSION['companyName'] ?> ? <button type="button"> Apply Here</button> </p>
			</div>

		</div>

	</div>


	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="functions.js"></script>
</body>
</html>