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
		$stmt = $conn->prepare("SELECT User_id FROM User_Table WHERE User_id LIKE ? AND Pasword LIKE ?");
		$stmt->bind_param("ss", $login, $password);
		$stmt->execute();
		$stmt->bind_result($user);
		
		while ($stmt->fetch()) {
		 // Because $user is passed by reference, its value changes 
		 // on every iteration to reflect the current row
		 if($user == $login) {
			echo "<pre>";
			echo "Welcome User $user<br>";
			echo "</pre>";
		 }
		 else {
			 $user = "NULL";
		 }
	   }
	   
		return $user;

		$conn->close();
	}
?> 