	<?php 
		session_start();
		include 'database.php';
		$customerObj = new customer (Conn::checkConn());
		$aboutObj = new customerAbout (Conn::checkConn());
		$campObj = new currCamp (Conn::checkConn());
		$socialObj = new social (Conn::checkConn());
	?>

	<!-- header -->
	<div class="header">
		<div class="logo">
			<a href="home.php"> Crowder </a>
		</div>
		<div class="search">
			<form class="searchBar">
				<input type="text" name="searchQuery">
				<input type="submit" value="Search!">
			</form>
		</div>
		<div class="navbar">
			<ul class="navList">
				<li> <a href="#"> Discover </a></li>
				<li> <a href="#"> Dashboard </a></li>
				<li class="settings"> <a href="#"> Settings </a>
					<div class="settingsPopup">
						<ul class="settingsList">
							<li> <a href=
									<?php 
										if ($_SESSION['customerType'] === "user") 
										{ echo "userProfile.php"; } else {
											echo "companyProfile.php";}
									?>	
								> Profile </a></li>
							<li> <a href="#"> Settings </a></li>
							<li> 
								<form class="logout" action="logout.php" method="post">
									<button type="submit" name="logoutButton" class="logoutButton">Logout</button>
								</form>
							</li>
						</ul>
					</div>
				</li>

			</ul>
		</div>
	</div>