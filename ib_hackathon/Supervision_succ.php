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
  <h3 style="background-color:MediumSeaGreen"> ΕΠΙΤΥΧΙΑ: Ολοκληρώθηκε η συναλλαγή. </h3>
 <p id="slide" style="color:red;">Εισάγετε ξανά τα στοιχεία της επιταγής.</p>
  <br>
  <br>
  <form action="./cheque_validation.php" method="post">
	ΚΩΔΙΚΟΣ ΕΠΙΤΑΓΗΣ: <p><input type="text" name="cheque_id" required /> <br><br>
	<p><input type="submit" value="Έλεγχος Επιταγής" />
  </form>
  <br><br>Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date("Y");?></footer>
  <br>
 </body>
</html>
