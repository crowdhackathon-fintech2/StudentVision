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
$sql = "CREATE TABLE Log_Table(
	User_id varchar(30) NOT NULL,
    Activity varchar(30) NOT NULL,
    Activity_Time timestamp NOT NULL,
    PRIMARY KEY(User_id, Activity_Time),
	CONSTRAINT fk1_login FOREIGN KEY (User_id) REFERENCES User_Table(User_id)
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Log_Table created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 