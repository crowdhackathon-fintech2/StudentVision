<?php
	session_start();

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
	
	// Set NORMAL LOGOUT
	$sql = "INSERT INTO Log_Table(User_id, Activity) VALUES ( \"" . $_SESSION['username'] . "\", \"Logout\")";
	if ($conn->query($sql) === TRUE) {
		session_unset(); //unset session for run-time
		session_destroy(); //destroy sessions
		header("Location: ./index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?> 