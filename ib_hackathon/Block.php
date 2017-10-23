<?php
	session_start();
?>

<html>
<head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Accounts.css" />
   <title>Check Account</title>
</head>
<body>
 <ul>
  <li><a class="active" href="Home.php">Αρχική</a></li>
  <li><a href="News.php">Νέα</a></li>
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
//connecting to the server
	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";
	$conn=new mysqli($servername,$username,$password,$dbname);
	mysqli_set_charset($conn,"utf8");
	if(mysqli_connect_errno()) {
		echo "Connection failed";
	}
	if(isset($_POST['checknum']) && isset($_POST['amount'])){
		$cheq_num=$_POST['checknum'];
		$cheq_amount= $_POST['amount'];
		$name=$_SESSION['name'];
		$surname=$_SESSION['surname'];
		//sending the mail about the blocked check
		$to="lazteo2010@hotmail.com";
		$subject="Αιτημα μπλοκαρισματος";
		$context="Είμαι" . $name . $surname . "και θελω να μ ακυρωσεις την επιταγη με αρ. επιταγής:" . $cheq_num;
		$mail($to,$subject,$context);

	}

?>
