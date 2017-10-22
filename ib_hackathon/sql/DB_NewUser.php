<?php
	function db_add_user($usr_id, $name, $surname, $password) {
		$servername = "johnny.heliohost.org";
		$username = "lazaros_1";
		$password = "killbill1997";
		$dbname = "lazaros_fintech2_ibank";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if (mysqli_connect_errno()) {
		 echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
		}

		// sql to identify user
		$stmt = $conn->prepare("INSERT INTO User_Table (User_id, First_name, Last_name, Pasword) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $usr_id, $name, $surname, $password);
		$stmt->execute();

		$conn->close();
	}
?> 