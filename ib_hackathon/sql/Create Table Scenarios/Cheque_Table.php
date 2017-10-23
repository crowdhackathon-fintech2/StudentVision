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
$sql = "CREATE TABLE Cheque_Table(
	Cheque_number varchar(70) NOT NULL PRIMARY KEY,
	Account_number varchar(50) NOT NULL,
    Branch_id int NOT NULL,
	Amount numeric(18, 0) NOT NULL,
    Validation_Time timestamp NOT NULL,
    Expiration_Time date NOT NULL,
    Encrypted_Key int NOT NULL,
	Cheque_recip_name varchar(30) NOT NULL,	
	Cheque_recip_surname varchar(30) NOT NULL,
	Cheq_hold_name varchar(20) NOT NULL,
	Cheq_hold_surname varchar(30) NOT NULL,
	IBAN varchar(50) NOT NULL,
	Blocked tinyint(1) NOT NULL,
	Encrypted_Key bigint(20) NOT NULL,
    CONSTRAINT fk1_loan FOREIGN KEY (Account_Number) REFERENCES Account_Table(Account_Number),
	CONSTRAINT fk2_loan FOREIGN KEY (Branch_id) REFERENCES Branch_Table(Branch_id),
	CONSTRAINT fk3_loan FOREIGN KEY (IBAN) REFERENCES Account_Table(IBAN)
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Cheque_Table created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 