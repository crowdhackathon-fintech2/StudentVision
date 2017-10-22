<?php 
	session_start();
	
	if($_SESSION['loggedIn']==false){
		header("Location: ./index.php");
	}
	
	/* StudentVision Team project code 
	 * Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
	 * Crowd Hackathon #fintech2 - © 2017
	*/

	$controlID = test_input($_POST["cheque_id"]);
	
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
	$stmt = $conn->prepare("SELECT Cheque_number FROM Cheque_Table WHERE Cheque_number LIKE ?");
	$stmt->bind_param("s", $controlID);
	$stmt->execute();
	$stmt->bind_result($verifiedID);
	
	$_SESSION['controlRes'] = $controlID;
	$_SESSION['Amount'] = $_SESSION['Validation_Time'] = $_SESSION['Expiration_Date'] = " ";
	
	while ($stmt->fetch()) {
	 // Because $verifiedID is passed by reference, its value changes 
	 // on every iteration to reflect the current row
	 if($verifiedID == $controlID) {
		//print_r($_SESSION);
		$conn->close();
		header("Location: ./cheque_overview.php");
	 }
	}
	
	if($verifiedID != $controlID) {
		//print_r($_SESSION);
		$conn->close();
		header("Location: ./Supervision_fault.php");
	 }
?>