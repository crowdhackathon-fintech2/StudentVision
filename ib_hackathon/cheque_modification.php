<?php
	session_start();
	
	if($_SESSION['loggedIn']==false){
		header("Location: ./index.php");
	}
	
	/* StudentVision Team project code 
	 * Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
	 * Crowd Hackathon #fintech2 - © 2017
	*/

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
	
	$sql = "UPDATE Cheque_Table SET Validation_Time = NOW() WHERE Cheque_number LIKE \"" . $_SESSION['controlRes'] . "\";";
	if ($conn->query($sql) === TRUE) {
		header("Location: ./Supervision_succ.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?> 