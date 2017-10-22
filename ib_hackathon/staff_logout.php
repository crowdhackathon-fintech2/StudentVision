<?php
	session_start();
	
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
	
	// Set SESSION EXPIRED
	$sql = "INSERT INTO Log_Table(User_id, Activity, User_type) VALUES ( \"" . $_SESSION['username'] . "\", \"Logout\", \"Staff\")";
	if ($conn->query($sql) === TRUE) {
		session_unset(); //unset session for run-time
		session_destroy(); //destroy sessions
		header("Location: ./index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?> 