<?php
	session_start();
	
	if($_SESSION['loggedIn']==false){
		header("Location: ./index.php");
	}
?> 

<!-- StudentVision Team project code 
 !-- Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
 !-- Crowd Hackathon #fintech2 - © 2017
-->

<html>
  <head>
    <meta charset="UTF-08" />
    <meta name="viewport" content="width=width-device,initial-scale=1.0" />
    <meta name="keywords" content="i-bank,Ethniki Trapeza,web banking,Εθνικη Τραπεζα,National bank" />
    <link rel="stylesheet" type="text/css" href="css/Login.css"/>
    <title>Ελεγχος Επιταγών i-bank</title>
</head>
 <body>
   <script src="Js/Dt.js"></script>
  <ul id="menu_1">
     <li id="smg"><p id="text">Σύστημα σύνδεσης υπαλλήλων Εθνικής Τράπεζας</p></li>
	 <li> <a href="./staff_logout.php" style="text-decoration:none; color:white;"><p id="Check"> Έξοδος </a> </li>
     
   </div>
  </ul>
 <p id="slide" style="color:red;">Επισκόπηση επιταγής: <?php echo $_SESSION['controlRes'];?> </p>
 
 <?php 
 
 	// define variables and set to empty values
	$login = $_SESSION['controlRes'];
	$login = (String)$login;
 
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

	// sql to identify user
	$stmt = $conn->prepare("SELECT Cheque_number,Amount,Validation_Time, Expiration_Date FROM Cheque_Table WHERE Cheque_number LIKE ?");
	$stmt->bind_param('s', $login);
	$stmt->execute();
	$stmt->bind_result($user,$amount,$valt,$expt);
	while ($stmt->fetch()) {
	  //Because $user is passed by reference, its value changes
	 // on every iteration to reflect the current row 
	 if($user == $login) {
		$_SESSION['Amount'] = $amount;
		$_SESSION['Validation_Time'] = $valt;
		$_SESSION['Expiration_Date']= $expt;
	 } 
    } 
 
    if($user != $login) { } 
	
	$conn->close();
 
 ?>
 
  <h4>
	Τα στοιχεία της επιταγής είναι:
  </h4>
  <ul>
  <li> ΚΩΔΙΚΟΣ ΕΠΙΤΑΓΗΣ: <?php echo " " . $_SESSION['controlRes']?> </li> 
  <li> ΥΠΟΛΟΙΠΟ ΛΟΓΑΡΙΑΣΜΟΥ: <?php echo " " . $_SESSION['Amount']?> </li> 
  <li> ΗΜΕΡΟΜΗΝΙΑ ΕΞΑΡΓΥΡΩΣΗΣ: <?php echo " " . $_SESSION['Validation_Time']?> </li> 
  <li> ΗΜΕΡΟΜΗΝΙΑ ΛΗΞΗΣ: <?php echo " " . $_SESSION['Expiration_Date']?> </li>
  </ul>
  <h3 style="border:2px solid DodgerBlue"> 
	<p style="color:DodgerBlue">Θέλετε να προχωρήσετε σε εξαργύρωση της επιταγής; </p>
	  <br>
	  <form action="./cheque_modification.php" method="post">
	  <p><input type="submit" value="Επιβεβαίωση Εξαργύρωσης Επιταγής" />
	  </form>
  </h3>
  <h3 style="border:2px solid MediumSeaGreen"> 
	<p style="color:MediumSeaGreen">Θέλετε να προχωρήσετε σε μπλοκάρισμα της επιταγής; </p>
	  <br>
	  <form action="./cheque_blockage.php" method="post">
	  <p><input type="submit" value="Μπλοκάρισμα Επιταγής" />
	  </form>
  </h3>
  </form>
  </h1>
  <br><br>Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date("Y");?></footer>
  <br>
 </body>
</html>
