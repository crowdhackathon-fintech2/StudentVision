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

// sql to create table
$sql = "CREATE TABLE Branch_Table(
	 Branch_id int  NOT NULL PRIMARY KEY,
	 Branch_name varchar(30) NOT NULL,
	 City varchar(30) NOT NULL,
	 Assets numeric(18, 0) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Branch_Table created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 