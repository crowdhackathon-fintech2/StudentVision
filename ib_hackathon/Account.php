<?php
	session_start();
?>	
<html>
<head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Account.css" />
   <title>Check Account</title>
 </head>
 <body>
 <ul>
  <li><a class="active" href="Home.php">Αρχική</a></li>
  <li><a href="News.html">Νέα</a></li>
  <li><a href="Account.php">Λογαριασμοί</a></li>
  <li><a>Επιταγές</a>
     <ul>
      <li><a href="Check_confirm.html">Καταχώρηση επιταγής</a></li>
      <li><a href="Check_History.php">Ιστορικό εκδιδόμενων επιταγών</a></li>
      <li><a href="Check_hold.php">Επιταγές ως δικαιούχος</a></li>
      <li><a href="Block.php">Μπλοκαρισμα επιταγών</a></li>
     </ul>
  </li>
  <li><a href="logout.php"> Αποσύνδεση </a></li>
 </ul>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<?php

	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";
	
	function iban_toAccount($iban) {
     $account=substr($iban,20);
     $acccount=str_replace(' ','',$account);
     $arr1=str_split($account);
     for($i=0; $i<strlen($account); $i++) {
      if($i>4 && strlen($account) -$i>3) {
        $arr1[$i]='*';
      }
     }
     $account=implode("",$arr1);
     return $account;
   }
   
	$conn=new mysqli($servername,$username,$password,$dbname);
	if(mysqli_connect_errno()) {
		echo "Connection failed";
	}
	
	$user=$_SESSION['username'];
	$user=(String)$user;
	
	mysqli_set_charset($conn,"utf8");
	$stmt=$conn->prepare("SELECT User_id,IBAN,balance FROM account_table WHERE User_id LIKE ?");
	$stmt->bind_param('s',$user);
	$stmt->execute();
	//$stmt->bind_result($userid,$iban,$bal);
	$result=$stmt->get_result();
	echo "<table>";
	if(!is_null($user)){
		while($row=$result->fetch_array(MYSQLI_ASSOC)) {
			$userid=$row['User_id'];
			$iban=$row['IBAN'];
			$ibank=iban_toAccount($iban);
			$bal=$row['balance'];
			echo "<tr><td>Username: $userid</td><td>iban: $ibank</td><td>Balance: $bal</td>";
		}
	}
	 echo"</table>";
?>
 </body>
</html>



