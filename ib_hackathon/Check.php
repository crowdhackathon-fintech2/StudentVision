<?php
 //start the session
 session_start();

 //taking all the stuff about the check from number to expiration_date
 //$name=$_SESSION['name'];
 //$surname=$_SESSION['surname'];
 $name=$_SESSION['name'];
 $surname=$_SESSION['surname'];
 $check_num=test_input($_POST["Check_num"]);
 $hold_name=test_input($_POST["Name_hold"]);
 $hold_surname=test_input($_POST["Sur_hold"]);
 $iban=test_input($_POST["Iban"]);
 $amount=test_input($_POST["Num"]);
 $exp_date=$_POST["Exp_date"];



 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";

 $conn=new mysqli($servername,$username,$password,$dbname);
 if(mysqli_connect_errno()) {
  echo "Connection failed";
 }
 mysqli_set_charset($conn,"utf8");

 $stmt=$conn->prepare("INSERT INTO cheque_table(Cheque_number,Cheque_recip_name,Cheque_recip_surname,Cheq_hold_name,Cheq_hold_surname,Amount,IBAN,Expiration_Date) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("sssssdss",$check_num,$name,$surname,$hold_name,$hold_surname,$amount,$iban,$exp_date);
 if($stmt->execute()) {
  echo"<script>setTimeout(\"location.href='Check_confirm.html';\",1500);window.alert('Η επιταγη καταχωρηθηκε επιτυχώς');</script>";
 }
 else{
  echo"<script>setTimeout(\"location.href='Check_confirm.html';\",1500);window.alert('Η επιταγή δεν καταχωρήθηκε');</script>";
 }
 $conn->close();
 ?>
