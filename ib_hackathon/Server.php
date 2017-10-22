<!DOCTYPE html>
 <html>
 <body>
<?php

	// define variables and set to empty values
	$hours = (int)date("h");

	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";
  $i=0;
	// count time within a busy waiting loop
	//while(true){ THIS WILL BE RESTORED
		$diff_hours = (int)date("h") - $hours;
		$diff_hours = 11; // THIS WILL BE REMOVED
		if($diff_hours > 10){
			// Start sessions
			session_start();

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if (mysqli_connect_errno()) {
				echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
			}

			// sql to identify user
			$initials = "SELECT User_hold_id, Cheque_number, Cheq_hold_name, Cheq_hold_surname
				FROM cheque_table
				WHERE Expiration_Date BETWEEN CURDATE() AND (CURDATE() + INTERVAL 2 DAY)";
			$result = $conn->query($initials);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$user = $row["User_hold_id"];
					$cheque_num = $row["Cheque_number"];

					if(isset($_SESSION[$user])) {
						$_SESSION[$user] = $_SESSION[$user] ."• ". $cheque_num. "<br>";
					}
					else {
						$_SESSION[$user] = "Αγαπητέ ".$row["Cheq_hold_name"]." ".$row["Cheq_hold_surname"]."\n"."Οι παρακατω επιταγες πλησιαζουν στην ημερομηνια ληξης και καλο θα ηταν να τις εξαργυρωσεις πριν σφραγιστουν:<br>CHECK NUMBERS <br>• ". $cheque_num. "<br>";
					}

				}
			} else {}

			// sql to identify user
			$finals = "SELECT DISTINCT User_hold_id, User_hold_mail
				FROM cheque_table
				WHERE Expiration_Date BETWEEN CURDATE() AND (CURDATE() + INTERVAL 2 DAY)";
			$f_result = $conn->query($finals);

			if ($f_result->num_rows > 0) {
				// output data of each row
				while($row = $f_result->fetch_assoc()) {
					$verifiedUser = $row["User_hold_id"];
					$addressMail = $row["User_hold_mail"];
					$mail = $_SESSION[$verifiedUser];
					$subjectMail = "NBG I-bank: Check validation warning!";

          if(mail($addressMail,$subjectMail,$mail) && $i==0) {
           echo"<script>document.write('Παρακαλώ περιμένετε');setTimeout(\"location.href='index.php';\",1500);window.alert('Το email στάλθηκε επιτυχώς');</script>";
          }
          elseif($i!=0) {
            echo"<script>setTimeout(\"location.href='index.php';\",1500);window.alert('Το email στάλθηκε επιτυχώς');</script>";
          }
          else {
           echo"<script>setTimeout(\"location.href='index.php';\",1500);window.alert('To email δεν στάλθηκε')΄;</script>";
           }
           $i=$i+1;

				}
			} else {}

			$hours = (int)date("h");


			$conn->close(); //close connection
			session_unset(); //unset session for run-time
			session_destroy(); //destroy sessions
		}
	//}
?>
