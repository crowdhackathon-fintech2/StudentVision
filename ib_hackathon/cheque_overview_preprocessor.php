<?php
	session_start();
	ob_start();
	
	/* StudentVision Team project code 
	 * Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
	 * Crowd Hackathon #fintech2 - © 2017
	*/
	
	// define variables and set to empty values
	$login = $_SESSION['controlRes'];
	$login = (String)$login;

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
	$stmt = $conn->prepare("SELECT Cheque_number,Block_number,Branch_id,Amount,Validation_Time, Expiration_Date FROM Cheque_Table WHERE Cheque_number LIKE ?");
	$stmt->bind_param('s', $login);
	$stmt->execute();
	$stmt->bind_result($user,$block,$branch,$amount,$valt,$expt);
	while ($stmt->fetch()) {
	  //Because $user is passed by reference, its value changes
	 // on every iteration to reflect the current row 
	 if($user == $login) {
		
		$_SESSION['Block_num'] = $block;
		$_SESSION['Branch_id'] = $branch;
		$_SESSION['Amount'] = $amount;
		$_SESSION['Validation_Time'] = $valt;
		$_SESSION['Expiration_Date']= $expt;
		$conn->close();
		header("Location: ./cheque_overview.php");
	 } 
    } 
 
    if($user != $login) { 
	   $conn->close();
	   header("Location: ./Supervision_fault.php");
    } 
 
	
?> 