<?php
 session_start();
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Home.css" />
   <title>Check History</title>
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
  <li><a href="logout.php">Αποσυνδεση</a></li>
 </ul>
<?php
  $name=$_SESSION['name'];
  $surname=$_SESSION['surname'];
  echo "<br><br><br><br><br><b><ol>Καλωσηρθες $name $surname </b><p>Στο μενου απο πανω θα δεις την καινουρια υπηρεσια για τις επιταγες</p></ol>";
  echo "<br><br> <br><br><div align=\"center\" id = \"image\"><img src=\"Images/e-check.jpg\" width=\"500\" height=\"300\"></img></div>";

?>
