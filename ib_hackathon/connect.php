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

	/*$stamp = "SELECT NOW() as 'now'";
	$str_stamp = "";
	$result = $conn->query($stamp);
	if ($result->num_rows > 0) { // output data of each row
	while($row = $result->fetch_array()) {
			$str_stamp = $row['now'];
		}
	}*/

	$sql = "INSERT INTO Log_Table(User_id, Activity) VALUES ( \"" . $_SESSION['username'] . "\", \"Login\")";
	if ($conn->query($sql) === TRUE) {
		header("Location: ./Home.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
