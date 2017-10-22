// See php code for mysqli object oriented (Connection,queries)

<?php
 $servername= "localhost";
 $username= "username";
 $password= "password";
 $dbname="Clients";

 $conn= new mysqli($servername,$username,$password,$dbname);

 if($conn->connection_error) {
  die("Connection failed: ". $conn->connect_error);
 }
 echo "Connnected successfully";

 // The prepared statements(Here for example the insert statement)

 $stmt= $conn->prepare("INSERT INTO Clients (firstname, lastname, email) VALUES (?,?,?)");
 $stmt->bind_param("sss",$firstname,$lastname, $email);
 $stmt->execute();

 //else
 $sql="SELECT COUNT(*) FROM Clients WHERE Password='killbill1997' ";
 $result=$conn->query($sql);
 if ($result->num_row >0) {
   //output data from the result of the query
 }


 ?>
