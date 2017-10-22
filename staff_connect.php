<?php
	session_start();
	
	/* StudentVision Team project code 
	 * Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
	 * Crowd Hackathon #fintech2 - © 2017
	*/
	
	if($_SESSION['loggedIn']==false){
		header("Location: ./index.php");
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
	
	$sql = "INSERT INTO Log_Table(User_id, Activity, User_type) VALUES ( \"" . $_SESSION['username'] . "\", \"Login\", \"Staff\")";
	if ($conn->query($sql) === TRUE) {
		header("Location: ./Supervision.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?> 