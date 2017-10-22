<?php
	session_start();
	ob_start();
	
	/* StudentVision Team project code 
	 * Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
	 * Crowd Hackathon #fintech2 - © 2017
	*/
	
	// define variables and set to empty values
	$loginErr = $passErr = "";
	$login = $pass = "";

	if (!isset($_POST["passwd"])) {
		$loginErr = "Απαιτείται κωδικός.";
	} else {
		$login = test_input($_POST["passwd"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$login)) /* regular expression*/{
			$loginErr = "Only letters and white space allowed";
		}
	}

	if (!isset($_POST["passwd_1"])) {
		$passErr = "Απαιτείται μυστικός κωδικός.";
	} else {
		$pass = test_input($_POST["passwd_1"]);
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()) {
	 echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
	}

	// sql to identify user
	$stmt = $conn->prepare("SELECT Login FROM Supervisor WHERE Login LIKE ? AND Pasword LIKE ?");
	$stmt->bind_param("ss", $login, $pass);
	$stmt->execute();
	$stmt->bind_result($user);
	
	$_SESSION['username'] = $login;
	$_SESSION['loggedIn']=false;
	while ($stmt->fetch()) {
	 // Because $user is passed by reference, its value changes 
	 // on every iteration to reflect the current row
	 if($user == $login) {
		//print_r($_SESSION);
		$_SESSION['loggedIn']=true;
		$conn->close();
		header("Location: ./staff_connect.php");
	 }
   }
   
   if($user != $login) {
	   $conn->close();
	   header("Location: ./staff.php");
   }
	//return $user;
	
?> 