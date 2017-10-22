<?php
	function db_login_depositor($dep_id, $chq_no, $acc_no, $branch, $amount, $current_time, $expire_time, $initial_key) {
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
		
		// sql to update balance
		$stmt = $conn->prepare("SELECT Balance FROM Account_Table WHERE Account_number = ?");
		$stmt->bind_param("s", $acc_no);
		$stmt->execute();
		$stmt->bind_result($old_balance);
		
		$new_balance = 0.0; $challenge = false;
		
		while ($stmt->fetch()) {
			// Because $user is passed by reference, its value changes 
			// on every iteration to reflect the current row
			if(($old_balance > 0) && ($amount < $old_balance)) {
				$new_balance = $old_balance - $amount;
				$challenge = true;
			}
	    }
		
		if($challenge == true) {
			// sql to identify user
			$stmt = $conn->prepare("INSERT INTO Depositor (User_id, Account_number, Registration_Key) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $dep_id, $acc_no, $initial_key);
			$stmt->execute();
			$stmt = $conn->prepare("UPDATE Account_Table SET Balance = ? WHERE Account_number = ?");
			$stmt->bind_param("ds", $new_balance, $acc_no);
			$stmt->execute();
			
			db_add_cheque($chq_no, $acc_no, $branch, $amount, $current_time, $expire_time, $initial_key);
		} else {
			// Connection to the database should always close
			$conn->close();
			header("Location: ./Choice.php");
		}
	}

	function db_add_cheque($chq_no, $acc_no, $branch, $amount, $current_time, $expire_time, $initial_key) {
		
		$crypto_key = hashCode($initial_key);

		// sql to create cheque
		$stmt = $conn->prepare("INSERT INTO Cheque_Table (Cheque_number, Account_number, Branch_id, Amount, Validation_Time, Expiration_Time, Encrypted_Key) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssidssd", $chq_no, $acc_no, $branch, $amount, $current_time, $expire_time, $crypto_key);
		$stmt->execute();

		$conn->close();
	}
	
	function overflow32($v) {
		$v = $v % 4294967296;
		if ($v > 2147483647) return $v - 4294967296;
		elseif ($v < -2147483648) return $v + 4294967296;
		else return $v;
	}

	function hashCode($s) {
		$h = 0;
		$len = strlen($s);
		for($i = 0; $i < $len; $i++)
		{
			$h = overflow32(31 * $h + ord($s[$i]));
		}
		return $h;
	}
?>


