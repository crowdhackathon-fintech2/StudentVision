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
$sql = "CREATE TABLE Supervisor(
	Superv_id varchar(30) NOT NULL PRIMARY KEY,
	Login varchar(30) NOT NULL,
    Pasword varchar(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Supervisor created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 