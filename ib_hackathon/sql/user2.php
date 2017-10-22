<?php
$servername = "johnny.heliohost.org";
$username = "lazaros_1";
$password = "killbill1997";
$dbname = "lazaros_My_Db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
 echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
} 

$onoma = 'George';// $_POST['name'];
$epwnymo = 'Karamanolis'; // $_POST['surname'];
$xrhsths = 'karamanoli'; // $_POST['username'];
$kwdikos = '1234'; //$_POST['passsword'];

// create a prepared statement -- AYTH H ENTOLH EXEI PROVLHMA
if($stmt=$conn->prepare("SELECT Username FROM Citizens WHERE Username = ? and Password = ?")):

// bind parameters for markers
$stmt->bind_param("ss",$xrhsths, $kwdikos);

// execute query
$stmt->execute();

// bind result variables
$stmt->bind_result($xrhsths2);

// fetch value
$stmt->fetch();

if (empty($stmt)) {
 echo "ERROR!!!";
 // header("Location: ../index.html");
}
else {
 echo "Username changed successfully";
}

// close statement
$stmt->close();

endif;

// close connection
$conn->close();
?>
