<?php
	session_start();
	$_SESSION['loggedIn']=false;
?>

<!-- StudentVision Team project code 
 !-- Authors: Lazaros Zervos, Jim Boukas, Georgios Moschovis
 !-- Crowd Hackathon #fintech2 - © 2017
-->

<!DOCTYPE html>
 <html>
  <head>
    <meta charset="UTF-08" />
    <meta name="viewport" content="width=width-device,initial-scale=1.0" />
    <meta name="keywords" content="i-bank,Ethniki Trapeza,web banking,Εθνικη Τραπεζα,National bank" />
    <link rel="stylesheet" type="text/css" href="css/Staff2.css"/>
    <title>i bank Internet Banking</title>
</head>
 <body>
   <script src="Js/Dt.js"></script>
  <ul id="menu_1" style="border-right:0">
     <li></li>
     <li id="smg"><p id="text">Σύστημα σύνδεσης υπαλλήλων Εθνικής Τράπεζας</p></li>
     <li id="mkg"></li>
     <li></li>
   </div>
  </ul>
    
 <p id="slide" align="center">Σύνδεση Υπαλλήλου</p>
 
  <div class="Login" align="center" style = "margin-left:44%">
      <form action="./staff_login.php" method="post">
        <label for("passwd") style = "font-size:18px">Κωδικός Χρήστη</label><br><input type="password" name="passwd" placeholder="Ο κωδικος σου" required/>
        <br><br><label for("passwd_1") style = "font-size:18px">Μυστικός Κωδικός</label><br><input type="password" name="passwd_1" placeholder="Ο μυστικος κωδικος σου"/>
        <br><input type="submit" id="submit" style = "margin-top:20px; width:80px; height:40px" value="Σύνδεση"/>
      </form>
    </div>
  
  
  <footer style="margin-top:350px">
	<br><br><br><br><br><br><br><br><br>
	Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date("Y");?></footer>
 </body>
</html>
