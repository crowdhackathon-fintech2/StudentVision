<?php
	function db_add_branch($brc_no, $brc_name, $city, $assets) {
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

		// sql to identify branch
		$stmt = $conn->prepare("INSERT INTO Branch_Table (Branch_id, Branch_name, City, Assets) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("issd", $brc_no, $brc_name, $city, $assets);
		$stmt->execute();

		$conn->close();
	}
?> 