<?php
	session_start();
	if($_SESSION['loggedIn']==false){
		header("Location: ./index.php");
	}
?>

<!DOCTYPE html>
 <html>
  <head>
    <meta charset="UTF-08" />
    <meta name="viewport" content="width=width-device,initial-scale=1.0" />
    <meta name="keywords" content="i-bank,Ethniki Trapeza,web banking,Εθνικη Τραπεζα,National bank" />
    <link rel="stylesheet" type="text/css" href="css/Accounts.css"/>
    <title>i bank Internet Banking</title>
</head>
 <body>
   <script src="Js/Dt.js"></script>
  <ul id="menu_1">
     <li><a href="index.html"><img id="Image_1" src="images/Edit.png" alt="Σημα της Εθνικης τραπεζας"></a></img></li>
     <li id="smg"><p id="text">Ηλεκτρονική Υπηρεσία της Εθνικής Τράπεζας</p></li>
     <li id="mkg"><img id="Image_2" src="images/download.png"  alt="Nbg group"></img></li>
     <li><p id="demo"></p></li>
	 <li> <a href="./Check.php" style="text-decoration:none; color:white;"><p id="Check"> Ελεγχος Επιταγης </a> </li>
	 <li> <a href="./Issue.php" style="text-decoration:none; color:white;"><p id="Issue"> Εκδοση επιταγης </a> </li>
	 <li> <a href="./index.php" style="text-decoration:none; color:white;"><p id="Logout"> Εξοδος </a> </li>
   </div>
  </ul>
 <p id="slide">Έχετε συνδεθεί στο σύστημα επιτυχώς! </p>
  <ul id="menu">
     <li><a href="Info.html">Γενικές πληροφορίες</a></li>
     <li><a href="Constructions.html">Εγχειρίδια-Οδηγίες</a></li>
     <li><a href="Email.html">Email</a></li>
  </ul>
  <center>
  <br>
  <br>
  <big><b> </b></big>
  </center>

  <div id="Social_media">
    <ul>
      <li><a href="https://www.linkedin.com/company/national-bank-of-greece"><img src="images/in.png" alt="Our LinkedIn"></img></a></li>
            <li><a href="https://www.youtube.com/channel/UCAwPZIUpdP3aIQlfw4bETLQ"><img src="images/yt.png" alt="Our Youtube channel"></img></a></li>
      <li><a href="https://www.facebook.com/ibanknbg"><img src="images/fb.png" alt="Our Facebook"></img></a></li>
      <li><a href="https://twitter.com/ibanknbg"><img src="images/twitter.png" alt="Our Twitter"></img></a></li>

    </ul>
  </div>
    <?php
	if((isset($_SESSION['hours'])) || (isset($_SESSION['minutes']))){
		$diff_hours = (int)date("h") - $_SESSION['hours'];
		$diff_minutes = (int)date("i") - $_SESSION['minutes'];
		if(($diff_hours > 0) || ($diff_minutes > 5)){
			session_unset(); //unset session for run-time
			session_destroy(); //destroy sessions
			//break;
			header("Location: ./index.php");
		}
	}
	?>
  <br><br>Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date("Y");?></footer>
 </body>
</html>
