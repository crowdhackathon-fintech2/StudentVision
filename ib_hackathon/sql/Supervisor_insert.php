<?php
$servername = "johnny.heliohost.org";
$username = "lazaros_1";
$password = "killbill1997";
$dbname = "lazaros_fintech2_ibank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
 echo "Connection failed: "; //this will print out the error while connecting to MySQL, if any
}

// sql to create table
$sql = "INSERT INTO Supervisor(
	Superv_id,
	Login,
    Pasword) VALUES ('S001', 'User', '1234')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 