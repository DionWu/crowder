<html>
<head>
	<link rel="stylesheet" type="text/css"  href="crowder.css" />
</head>

<body>

<!----------- LOGIN OR REGISTER ------------------>

	<div id="authenticate">
		<div id="loginForm">
			<form method="POST" method="login.php">
				Username: <input type="text" name="username"><br>
				Password: <input type="password" name="password"><br>
				<input type="submit" id="loginSubmit" value="Login">
			</form>
			<div class="authenticateMsg"></div>
			<a href="#registerForm"> Don't have an account? Register Here! </a>
		</div>

		<div id="registerForm">
			<div id="customerIdentifier">
				I am a <input type="radio" name="userButton"> User 
					<input type="radio" name="companyButton"> Company
			</div>

			<div id="registerUser">
				<form method="POST" action="register.php">
					First Name: <input type="text" name="firstname"><br>
					Last Name: <input type="text" name="lastname"><br>
					Email: <input type="text" name="email"><br>
					Username: <input type="text" name="username"><br>
					Password: <input type="password" name="password" class="password"><br>
					Retype Password: <input type="password" name="retypePassword" class="retypePassword"><span></span><br>
					<input type="submit" class="registerSubmit" name="userSubmit" value="Register Now!">
				</form>
				<div class="authenticateMsg"></div>
			</div>

			<div id="registerCompany">
				<form method="POST" action="register.php">
					Company Name: <input type="text" name="companyName"><br>
					Email: <input type="text" name="email"><br>
					Username: <input type="text" name="username"><br>
					Password: <input type="password" name="password" class="password2"><br>
					Retype Password: <input type="password"  name="retypePassword" class="retypePassword2"><span></span><br> 
					<input type="submit" class="registerSubmit" name="companySubmit" value="Register Now!">
				</form>
				<div class="authenticateMsg"></div>
			</div>

			<a href="#loginForm"> Oops I totally have an account! Let me log in! </a>
		</div>	

	</div>


	<script type="text/javascript" src="../jquery.js"> </script>
	<script type="text/javascript" src="functions.js"> </script>

</body>
</html>