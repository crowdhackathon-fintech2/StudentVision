<?php
	function db_login_user($login, $password) {
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
		$stmt = $conn->prepare("ALTER TABLE User_Table ADD UNIQUE ('login');");
		$stmt->bind_param("ss", $login, $password);
		$stmt->execute();

		$conn->close();
	}
?> 