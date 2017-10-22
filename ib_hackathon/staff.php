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
    <link rel="stylesheet" type="text/css" href="css/Staff.css"/>
    <title>i bank Internet Banking</title>
</head>
 <body>
   <script src="Js/Dt.js"></script>
  <ul id="menu_1">
     <li><a href="staff.php"><img id="Image_1" src="images/Edit.png" alt="Σημα της Εθνικης τραπεζας"></a></img></li>
     <li id="smg"><p id="text">Σύστημα σύνδεσης υπαλλήλων Εθνικής Τράπεζας</p></li>
     <li id="mkg"><img id="Image_2" src="images/download.png"  alt="Nbg group"></img></li>
     <li><p id="demo"></p></li>
   </div>
  </ul>
    <div class="Login">
      <form action="./staff_login.php" method="post">
        <label for("passwd")>Κωδικός Χρήστη</label><br><input type="text" name="passwd" placeholder="Ο κωδικος σου" required/>
        <br><label for("passwd_1")>Μυστικός Κωδικός</label><br><input type="password" name="passwd_1" placeholder="Ο μυστικος κωδικος σου"/>
        <br><input type="submit" id="submit" value="Σύνδεση"/>
      </form>
    </div>
 <p id="slide">Σύνδεση Υπαλλήλου</p>
  <img src="images/i-bank.jpg"></img>
  <div id="News">
    <h3>Παρατήρηση:</h3><ul>
      <li>Η παρούσα σελίδα αφορά <B><p style="color:Tomato">M O N O</p></B> τους εξουσιοδοτημένους αντιπροσώπους της Εθνικής Τράπεζας!</li>
    </ul>
  </div>
  <div id="Social_media">
    <ul>
      <li><a href="https://www.linkedin.com/company/national-bank-of-greece"><img src="images/in.png" alt="Our LinkedIn"></img></a></li>
            <li><a href="https://www.youtube.com/channel/UCAwPZIUpdP3aIQlfw4bETLQ"><img src="images/yt.png" alt="Our Youtube channel"></img></a></li>
      <li><a href="https://www.facebook.com/ibanknbg"><img src="images/fb.png" alt="Our Facebook"></img></a></li>
      <li><a href="https://twitter.com/ibanknbg"><img src="images/twitter.png" alt="Our Twitter"></img></a></li>

    </ul>
  </div>
  <footer>
	<br><br><br><br><br><br><br><br><br>
	Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date("Y");?></footer>
 </body>
</html>
