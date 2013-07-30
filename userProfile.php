<html>
<head>
	<link rel="stylesheet" type="text/css" href="crowder.css" />
</head>

<body>

	<?php
		require 'header.php';
	?>

	<div class="pageBody">

		<div id="userPic">
			<img src="images/placeholder.jpg">
		</div>

		<div id="userAbout">
			<h1 id="userName"> <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?> </h1>
			<div id="userMedals"> 
				<ul>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
					<li> <img src="images/badge.png"> </li>
				</ul>
			</div>
			<p id="About"> Dion Wu is a 4th year at UC Berkeley, currently studying public health. He wants to be an entrepreneur and start things and create applications that will change the world. He is currently learning PHP and JQuery for server programming.</p>
		</div>


		<div id="userSidebar">
			<div id="userSocial">
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

			<div id="userActivityContainer">
				<h3> Activity Feed </h3>
				<div class="userActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="userActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="userActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="userActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
				<div class="userActivity">
					Sample Activity. blah blah blah blah blah blah blah blah blah blah blah blah blah
				</div>
			</div>
		</div>

		<div id="userMainBody">
			<div id="userCurrCampContainer">
				<h3> Current Campaigns </h3>
				<div class="userCurrCamp">
					<a href="#"> <img src="images/placeholder2.jpg" class="userCurrCampPic"> </a>
					<div class="userCurrCampAbout">
						<h4> Wallit </h4>
						<p> Wallit is a company that blahblahblahblahblah blah blah blah blah blah blah blah blah blah blah blah SAMPLE TEXT HERE SAMPLE TEXT HERE SAMPLE TEXT HERE </p>
					</div>
					<div class="durationAndLink">
						<div class="durationBar">
							|||||||||||||||||||||||||||||||||||||||||||||||||||||||
						</div>
						<div class="userCampLink">
							Link: <a href="#">www.crowder.com/DionWu</a>
						</div> 
					</div>
				</div>

				<div class="userCurrCamp">
					<a href="#"> <img src="images/placeholder2.jpg" class="userCurrCampPic"> </a>
					<div class="userCurrCampAbout">
						<h4> Wallit </h4>
						<p> Wallit is a company that blahblahblahblahblah blah blah blah blah blah blah blah blah blah blah blah SAMPLE TEXT HERE SAMPLE TEXT HERE SAMPLE TEXT HERE </p>
					</div>
					<div class="durationAndLink">
						<div class="durationBar">
							|||||||||||||||||||||||||||||||||||||||||||||||||||||||
						</div>
						<div class="userCampLink">
							Link: <a href="#">www.crowder.com/DionWu</a>
						</div> 
					</div>
				</div>
			</div>


			<div id="userPrevCampContainer">
				<h3> Previous Campaigns </h3>
				<div class="userPrevCamp">
					<a href="#"> <img src="images/placeholder2.jpg" class="userPrevCampPic"> </a>
					<div class="userPrevCampInfo">
						<div class="userPrevCampAbout">
							<h4> Wallit </h4>
							<p> Wallit is a company that blahblahblahblahblah blah blah blah blah blah blah blah blah blah blah blah SAMPLE TEXT HERE SAMPLE TEXT HERE SAMPLE TEXT HERE </p>
						</div>
					</div>
				</div>

				<div class="userPrevCamp">
					<a href="#"> <img src="images/placeholder2.jpg" class="userPrevCampPic"> </a>
					<div class="userPrevCampInfo">
						<div class="userPrevCampAbout">
							<h4> Wallit </h4>
							<p> Wallit is a company that blahblahblahblahblah blah blah blah blah blah blah blah blah blah blah blah SAMPLE TEXT HERE SAMPLE TEXT HERE SAMPLE TEXT HERE </p>
						</div>
					</div>
				</div>

				<div class="userPrevCamp">
					<a href="#"> <img src="images/placeholder2.jpg" class="userPrevCampPic"> </a>
					<div class="userPrevCampInfo">
						<div class="userPrevCampAbout">
							<h4> Wallit </h4>
							<p> Wallit is a company that blahblahblahblahblah blah blah blah blah blah blah blah blah blah blah blah SAMPLE TEXT HERE SAMPLE TEXT HERE SAMPLE TEXT HERE </p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="functions.js"></script>
</body>
</html>