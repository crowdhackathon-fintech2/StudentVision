<?php
	function db_login($login, $password) {
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

		// sql to identify connection
		$stmt = "SELECT User_id, Activity, Activity_Time FROM Log_Table WHERE User_id NOT NULL";
		$result = $conn->query($stmt);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<pre>";
				echo "id: " . $row["User_id"]. " - Action: " . $row["Activity"]. " at " . $row["Activity_Time"]. "<br>";
				echo "</pre>";
			}
		} else {
			echo "No recent history.";
		}
		
		$conn->close();
	}
?> 