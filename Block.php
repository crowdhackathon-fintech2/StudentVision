<?php
	session_start();
?>

<html>
<head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Account.css" />
   <title>Check Account</title>
</head>
<body>
 <ul>
  <li><a class="active" href="Home.php">Αρχική</a></li>
  <li><a href="News.html">Νέα</a></li>
  <li><a href="Account.php">Λογαριασμοί</a></li>
  <li><a>Επιταγές</a>
     <ul>
      <li><a href="Check_confirm.html">Καταχώρηση επιταγής</a></li>
      <li><a href="Check_History.php">Ιστορικό εκδιδόμενων επιταγών</a></li>
      <li><a href="Check_hold.php">Επιταγές ως δικαιούχος</a></li>
      <li><a href="Block.php">Μπλοκαρισμα επιταγών</a></li>
     </ul>
  </li>
  <li><a href="logout.php"> Αποσύνδεση </a></li>
 </ul>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
	<form action="./Block.php" method="post">
		Αριθμός Επιταγής: <input type="text" name="checknum" required />
		Ποσό Επιταγής  :  <input type="text" name="amount" required />
		<input type="submit" value="Μπλοκαρισμα" style="color:green;" required />
	</form>
	</center>
</html>

<?php

	if(isset($_POST['checknum']) && isset($_POST['amount'])){
		$cheq_num=$_POST['checknum'];
		$cheq_amount= $_POST['amount'];
		$name=$_SESSION['name'];
		$surname=$_SESSION['surname'];
		$servername = "localhost";
		$username = "lazaros";
		$password = "killbill";
		$dbname = "lazaros_fintech2_ibank";
		$conn=new mysqli($servername,$username,$password,$dbname);
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
		}
		
		// sql to identify user
		$stmt = $conn->prepare("SELECT Cheque_number FROM cheque_table WHERE Cheque_number LIKE ?");
		$stmt->bind_param('s', $cheq_num);
		$stmt->execute();
		$stmt->bind_result($validateNum);

		while ($stmt->fetch()) {
		  //Because $validateNum is passed by reference, its value changes
		 // on every iteration to reflect the current row
		 if($validateNum == $cheq_num) {
			//print_r($_SESSION);
			//sending the mail about the blocked check
			$to="lazteo2010@hotmail.com";
			$subject="Αιτημα για μπλοκάρισμα";
			$context="Είμαι o/η" . $name ." ". $surname . " και θελω να μ ακυρωσεις την επιταγη με αρ. επιταγής: " . $cheq_num;
			mail($to, $subject, $context);
			header("Location: ./Home.php");
		 }
	   }

	   if($user != $cheq_num) {
		   echo "<h3 style="background-color:Tomato">  </h3>";
	   }
	//return $user;
  $stmt->close();
	$conn->close();
	}
	
?>