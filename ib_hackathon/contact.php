<?php
$name = $surname = $email= $subject = $context= "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
 $email=test_input($_POST["Email"]);
 $name=test_input($_POST["Name"]);
 $surname=test_input($_POST["Surname"]);
 $subject=test_input($_POST["Subject"]);
 $context=test_input($_POST["Context"]);
}
if(empty($email)) {
 echo "There is no email";
}
else {
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
 }
 else {
  if(empty($context)) {
   $context="";
   echo "You send nothing as a message";
  }
  else {
   $context=test_input($_POST["Context"]);
   $to="lazteo2010@hotmail.com";
   $message= 'From: '.$name.' '.$surname.' with '.$email ."\n".$context;
   if(mail($to,$subject,$message)) {
    echo"<script>document.write('Παρακαλώ περιμένετε');setTimeout(\"location.href='index.php';\",1500);window.alert('Το email στάλθηκε επιτυχώς');</script>";
   }
   else {
    echo"<script>document.write('Παρακαλώ περιμένετε');setTimeout(\"location.href='Contact.html';\",1500);window.alert('To email δεν στάλθηκε')΄;</script>";
    }
   }
  }
 }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
?>
