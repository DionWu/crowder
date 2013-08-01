<?php


class Conn {
	/* variables */
	private static $conn = NULL;

	/* Connection info */
	private static function config() {
		$config_arr = array();

		$config_arr['dsn'] = 'mysql:host=localhost;dbname=crowder'; 
		$config_arr['username'] = 'root';
		$config_arr['password'] = '';

		return $config_arr;
	}

	/* Call connection */ 
	private static function init() {
		$config_arr = self::config();
		try {
			self::$conn = new PDO($config_arr['dsn'], $config_arr['username'], $config_arr['password']);
		} catch (PDOException $e) {
			echo $e->getMessage;
		}
	}

	/* Check if connected already before init() */
	public static function checkConn() {
		if(!self::$conn) {
			self::init();
		} return self::$conn;
	}
}


class customerDAO {
	private $db;

	// define db
	public function __construct(&$db) {
		$this->db = &$db;
	}


	// get customerID
	public function fetchCustomerID($username, $unhashedPassword) {
		$sql = "SELECT customerID, password FROM customerLogin WHERE username = :username";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':username' => $username,
		));

		/* hash inputted password and match with password in DB. Should always return true on register() */
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$hash = $row['password'];
			$customerID = $row['customerID'];
			if (crypt($unhashedPassword, $hash) === $hash) {
				return $customerID;
			}
		}

	}




	// Complete registration and enter into customerLogin table & return the customer ID
	public function verifyRegistration($firstname, $lastname, $companyName, $email, $username, $unhashedPassword) {

		/* Define which type of customer (company or user) */
		if($companyName) {
			$customerType = "company";
		} else {
			$customerType = "user";
		};

		// Hash password
		$password = crypt($unhashedPassword);

		// Insert data into table
		$sql = "INSERT INTO customerLogin (firstname, lastname, companyName, email, username, password, customerType) VALUES (:firstname, :lastname, :companyName, :email, :username, :password, :customerType)";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute(array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'companyName' => $companyName,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'customerType' => $customerType
		));

		// If insertion completes, fetch customerID for $_SESSION variable
		if ($result) {
			$customerID = self::fetchCustomerID($username, $unhashedPassword);
			return $customerID;
		} 
	}



	// Check for duplicate of username or email
	public function checkForDup($firstname, $lastname, $companyName, $email, $username, $unhashedPassword) {
		$sql = "SELECT email, username FROM customerLogin WHERE email = :email OR username = :username";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':email' => $email,
			':username' => $username
		));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		//If return no duplicates, continue on with registration. Else, return errors
		if(empty($result)) {
			$registrationResult = self::verifyRegistration($firstname, $lastname, $companyName, $email, $username, $unhashedPassword);
		} else {
			foreach($result as $key=>$value) {
				if ($value['email'] === $email) {
					$emailError = array('emailError' => 'This email is already being used. Please try another!');
				} else {
					$emailError = array('emailError' => NULL);
				}
				if ($value['username'] === $username) {
					$usernameError = array('usernameError' => 'This username is already in use. Please try another!');
				} else {
					$usernameError = array('usernameError' => NULL);
				}
			}
			/* PRO TIP. It's hard to array_push() and assoc. array. So just merge them together! */
			$registrationResult = array_merge($emailError, $usernameError);
		}
		return $registrationResult;
	}




	// verify if login information is correct & return the customerID
	public function verifyLogin($username, $unhashedPassword){
		$loginResult = self::fetchCustomerID($username, $unhashedPassword);
		return $loginResult;
	}



	// get customer information with the customerID returned from registering/logging
	public function fetchCustomerInfo($sessionID) {
		$sql = "SELECT * FROM customerLogin WHERE customerID = :customerID";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':customerID' => $sessionID
		));
		$customerInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $customerInfo;
	}

	// Add / update customer Profile About Into into customerAbout table
	public function updateCustomerAbout($sessionID, $about) {
		$sql = "SELECT customerID FROM customerabout WHERE customerID = :sessionID";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':sessionID' => $sessionID
			));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if( $result ) {
			$sql2 = "UPDATE customerabout SET about= :about WHERE customerID = :sessionID";
		} else {
		$sql2 = "INSERT INTO customerabout (customerID, about) VALUES (:sessionID, :about)";
		};

		$stmt2 = $this->db->prepare($sql2);
		$result2 = $stmt2->execute(array(
			':about'=> $about,
			':sessionID' => $sessionID
			));
		if(!$result2) {
			return "false";
		} else {
			return "true";
		};
	}

	// Fetch customer Profile About info from customerAbout table
	public function fetchCustomerAbout($customerID){
		$sql = "SELECT about FROM customerabout WHERE customerID = :customerID";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':customerID' => $customerID));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	// Insert new Current Campaign for Company in campInfo Table
	public function createCurrCampInfo($sessionID, $campName, $campVideoURL, $campAbout, $campPricing) {
	$sql = "INSERT INTO currCampInfo (companyID, campName, campVideoURL, campAbout, campPricing) VALUES (:sessionID, :campName, :campVideoURL, :campAbout, :campPricing)";
	$stmt = $this->db->prepare($sql);
		$result = $stmt->execute(array(
			':sessionID' => $sessionID,
			':campName' => $campName,
			':campVideoURL' => $campVideoURL,
			':campAbout' => $campAbout,
			':campPricing' => $campPricing
			));
		if(!$result) {
			return "false";
		} else {
			return "true";
		};
	}
	
	// Update Current Campaign for Company in campaignInfo table
	public function updateCurrCampInfo($sessionID, $campName, $campVideoURL, $campAbout, $campPricing) {

		$sql = "UPDATE currCampInfo SET campName = :campName, campVideoURL = :campVideoURL, campAbout = :campAbout, campPricing=:campPricing WHERE companyID = :sessionID";

		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute(array(
			':sessionID' => $sessionID,
			':campName' => $campName,
			':campVideoURL' => $campVideoURL,
			':campAbout' => $campAbout,
			':campPricing' => $campPricing
			));
		if(!$result) {
			return "false";
		} else {
			return "true";
		};
	}


	// Fetch current campaigin Info from currcampinfo table
	public function fetchCurrCampInfo($customerID){
		$sql = "SELECT campName, campVideoURL, campAbout, campPricing FROM currCampInfo WHERE companyID = :companyID";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			':companyID' => $customerID));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

}






class customer extends customerDAO {
	static $customerID, $firstname, $lastname, $companyName, $email, $customerType;

	// Define static variables & set them to SESSION variables
	public function defineSESSION($sessionID) {
		$customerInfo = self::fetchCustomerInfo($sessionID);
		foreach ($customerInfo as $key=>$value) {
			self::$customerID = $_SESSION['customerID'] = $value['customerID'];
			self::$firstname = $_SESSION['firstname'] = $value['firstname'];
			self::$lastname = $_SESSION['lastname'] = $value['lastname'];
			self::$companyName = $_SESSION['companyName'] = $value['companyName'];
			self::$email = $_SESSION['email'] = $value['email'];
			self::$customerType = $_SESSION['customerType'] = $value['customerType'];
		}
	}

	// register & assign static session variables
	public function register($firstname, $lastname, $companyName, $email, $username, $unhashedPassword, $retypePassword) {
		// Check for unmatching passwords
		if ($unhashedPassword !== $retypePassword) {
			return "It seems that your passwords do not match. Please try again";
		} else {
			$registrationResult = parent::checkForDup($firstname, $lastname, $companyName, $email, $username, $unhashedPassword);
			$sessionID = $registrationResult;

			/* check if registration was complete or not by looking for an array (error) or integer (complete) */
			if (is_array($registrationResult)) {
				return $registrationResult['emailError'] . "<br>" . $registrationResult['usernameError'];
			} else {
				self::defineSESSION($sessionID);
				return "Authentication Verified";
			}
		}
	}



	// login & assign static session variables
	public function login($username, $unhashedPassword) {
		$sessionID = parent::verifyLogin($username, $unhashedPassword);

		// Empty means username/pw did not match
		if (empty($sessionID)) {
			return "Your login information was incorrect. Please try again";
		} else {
			self::defineSESSION($sessionID);
			return "Authentication Verified";
		} 
	}



	// logout
	public function logout() {
		session_unset();
		session_destroy();
		header("Location: login_page.php");
	}	
}


?>