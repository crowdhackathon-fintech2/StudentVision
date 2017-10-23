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
$sql = "CREATE TABLE Account_Table (
	 Account_number varchar(50)  NOT NULL PRIMARY KEY,
	 IBAN varchar(50) NOT NULL,
	 Branch_id int NOT NULL,
	 balance numeric(18, 0) NOT NULL,
     CONSTRAINT fk_account FOREIGN KEY (Branch_id) REFERENCES Branch_Table(Branch_id)
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Account_Table created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 