/* This is the file for the login of the registered of members
Regularly we use PDO just because it is for all the database kinds not only for mySql
In another file we will see the MySqli */

<?php

 if($_SERVER["REQUEST_METHOD"]=="POST") {
    $passwd=test_input($_POST["passwd"]);
    $sec_passwd=test_input($_POST["sec_passwd"]);
 }

 $servername= "localhost";
 $username= "root";
 $password= "killbill1997";
 $dbname="Clients";

 try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   //PDO error of connection_aborted
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
   echo "Connected succesfully";
 }
 catch(PDOException $e) {
   echo "Connection failed :".$e->getMessage()-;
 }

$stmt=$conn->prepare("the query
VALUES(:1ST value,:2nd value,3rd value)");
$stmt->bind_Param(':firstname',$firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email',$email);


/* Then we give values to the variables firstname,lastname,email and $stmt->execute()
we can do it for all the statements */


$result= $stmt->setFetchMode(PDO::FETCH_ASSOC);      //The fetching
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}


//after a statement we have $stmt->rowCount() to see if it executes successfully
// $sql="query to be executed without preparing the statement
//If the query returns no results then use exec() []$conn->exec($sql)] with results we use execute()
$conn=null;

?>
