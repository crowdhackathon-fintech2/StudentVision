<?php
	session_start();
?>
<html>
<head>
   <meta charset="UTF-08" />
   <meta name="viewport" content="width=width-device,initial-scale=1.0" />
   <link rel="stylesheet" style="text/css" href="Accounts.css" />
   <title>Check Account</title>
 </head>
 <body>
 <ul>
  <li><a class="active" href="Home.php">Αρχική</a></li>
  <li><a href="News.php">Νέα</a></li>
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
</html>
<?php

	$servername = "localhost";
	$username = "lazaros";
	$password = "killbill";
	$dbname = "lazaros_fintech2_ibank";

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
	$stmt->bind_result($userid,$iban,$bal);
	$j=0;
	while($stmt->fetch()){
		//Because $user is passed by reference, its value changes
		// on every iteration to reflect the current row
		if($user == $userid){
			$j++;
			$_SESSION['User_id'.$j]=$userid;
			$_SESSION['iban'.$j]=$iban;
			$_SESSION['bal'.$j]=$bal;
		}
	}
	if($user != $userid){}

	function iban_toAccount($iban){
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

?>

 <table>
   <thead>
    <tr>
     <th>Αριθμός λογαριασμου</th>
     <th>Διαθέσιμο υπόλοιπο</th>
    </tr>
   </thead>
 <tbody>
   <tr>
   <?php
		for($k=1;$k<=$j;$k++){
			echo $_SESSION['User_id'.$k].", ".$_SESSION['iban'.$k].", ".$_SESSION['bal'.$k]."\n";
		}
   ?>
     <td><?//=$row['Cheque_Number']?></td>
     <td><?//=$row['Cheque_recip_name']?></td>
     <td><?//=$row['Cheque_recip_surname']?></td>
     <td><?//$row['Amount']?></td>
     <td><?//$row['?xpiration_date']?></td>
     <td><?//$cashed?></td>
   </tr>
  </tbody>
  </table>
<?php
 $conn->close();
?>
 </body>
</html>
