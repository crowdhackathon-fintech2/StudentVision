<?php
 session_start();
 //require "class.php"
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Check_history.css" />
   <title>Check History</title>
 </head>
 <body>
<div class="nav">
 <ul>
  <li><a class="active" href="Home.php">Αρχική</a></li>
  <li><a href="Ενημερωτικά νέα">Νέα</a></li>
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
</div>
<?php
 $name=$_SESSION['name'];
 $surname=$_SESSION['surname'];
  //That is the file for seeing the check history of a user
  //Using the user object and an account object to store all the values in their objects memebers

  $servername="localhost";
  $username="lazaros";
  $password="killbill";
  $dbname="lazaros_fintech2_ibank";

 $conn=new mysqli($servername,$username,$password,$dbname);
 if(mysqli_connect_errno()) {
  echo "Connection failed";
 }

 $stmt=$conn->prepare("SELECT Cheque_number,Cheque_recip_name,Cheque_recip_surname,Amount,Expiration_Date,Validation_Time,Cashed_date FROM cheque_table WHERE Cheq_hold_name LIKE ? AND Cheq_hold_surname LIKE ?");
 $stmt->bind_param("ss",$name,$surname);
 $stmt->execute();
 $result=$stmt->get_result();
 echo"<div class='responstable'>";
 echo "<table>";
 echo "<tr><td>Αριθμος επιταγης</td><td>Ονομα εκδότη</td><td>Επωνυμο εκδότη</td><td>Ποσό</td><td>Ημερομηνία λήξης</td><td>Πιστοποιήση</td><td>Εξαργυρωση</td></tr> \n";
 if(!is_null($result)) {
 while($row=$result->fetch_array(MYSQLI_ASSOC)) {
   $credit=$row['Validation_Time'];
   if(is_null($credit)) {
     $credit="-";
   }
   else {
     $credit="&#10004";
   }
   $cashed=$row['Cashed_date'];
   if(is_null($cashed)) {
     $cashed="-";
   }
   else {
     $cashed='Εξαργυρώθηκε';
   }
   echo"<tr><td>{$row['Cheque_number']}</td><td>{$row['Cheque_recip_name']}</td><td>{$row['Cheque_recip_surname']}</td><td>{$row['Amount']}</td><td>{$row['Expiration_Date']}</td><td>{$credit}</td><td>{$cashed}</td></tr> \n";
  }
 }
 else {
   echo "<tr id='row'><td>Δεν</td><td>εχετε</td><td>καποιες</td><td>δικες</td><td>σας</td><td>διαθεσιμες</td><td>επιταγες</td></tr>";
 }
 echo"</table>";
 echo"</div>";

  /*<table>
   <thead>
    <tr>
     <th>Αριθμός επιταγής</th>
     <th>Iban</th>
     <!--<th>Όνομα δικαιούχου</th>
     <th>Επώνυμο δικαιούχου</th>-->
     <th>Ποσό</th>
     <th>Ημερομηνία λήξης</th>
     <th>Εξαργύρωση</th>
    </tr>
   </thead>
 <tbody>
   <tr>
     <td><?=$row['Cheque_Number']?></td>
     <td><?=$account_number?></td>
     <!--<td><?//=$row['Cheque_hold_name']?></td>
     <td><?//=$row['Cheque_hold_surname']?></td>-->
     <td><?$row['Amount']?></td>
     <td><?$row['Εxpiration_date']?></td>
     <td><?$cashed?></td>
   </tr>
  </tbody>*/
 //echo"<footer>Copyright &copyΕθνικη Τραπεζα 2011-2017</footer>";
 $stmt->close();
 $conn->close();
?>
 </body>
</html>
