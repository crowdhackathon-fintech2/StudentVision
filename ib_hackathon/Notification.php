<?php
 //This is the file for notifying a forgetable holder of a check that his checks are close to be expired*/
 /*session_start();
 $servername="localhost";
 $username="lazaros";
 $password="killbill";
 $dbname="lazaros_fintech2_ibank";


 $conn=new mysqli($servername,$username,$password,$dbname);
 if(mysqli_connect_errno()) {
   echo "Unsuccesfully connection";
 }

 $dt=date("Y-m-d");
 $Check_numbers=array();

 $stmt=$conn->prepare("SELECT Cheque_number,Cheque_hold_name,Cheque_hold_surname FROM Cheque_Table WHERE Expiration_Date-?=2 order by Cheque_hold_name,Cheque_hold_surname");
 $stmt->bind_param("s",$dt);
 $stmt->execute();
 $result=$stmt->get_result();
 while($row=$result->fetch_array(MYSQLI_ASSOC)) {
  echo $row['Cheque_number'],$row['Cheque_hold_name'],$row['Cheque_hold_surname'];
  echo "<br>";
 }
 */
 $servername="localhost";
 $username="lazaros";
 $password="killbill";
 $dbname="lazaros_fintech2_ibank";

 $conn=new mysqli($servername,$username,$password,$dbname);





 ?>
