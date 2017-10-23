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
$sql = "CREATE TABLE Registrator (
	 User_id  int  NOT NULL,
	 Cheque_number   varchar (10) NOT NULL,
     Withdrawal_key int NOT NULL,
	PRIMARY KEY(User_id,Cheque_number),
	CONSTRAINT fk1_borrower FOREIGN KEY (User_id) REFERENCES User_Table(User_id),
    CONSTRAINT fk2_borrower FOREIGN KEY (Cheque_number) REFERENCES Cheque_Table(Cheque_number)
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Registrator created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 