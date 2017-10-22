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
$sql = "CREATE TABLE Depositor(
	User_id varchar(30) NOT NULL,
	Account_number varchar(50) NOT NULL,
    Registration_key varchar(30) NOT NULL,
	PRIMARY KEY(User_id,Account_number),
	CONSTRAINT fk1_depositor FOREIGN KEY (User_id) REFERENCES User_Table(User_id),
    CONSTRAINT fk2_depositor FOREIGN KEY (Account_number) REFERENCES Account_Table(Account_number)
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Depositor created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 