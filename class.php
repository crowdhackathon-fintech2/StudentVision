<?php
  class User {
    private $name;
    private $surname;
    private $check;
    private $account;

  public function User($name,$surname) {
   $this->$name=$name;
   $this->surname=$surname;
  }


  public function get_Name() {
    return $this->$name;
   }

  public function get_Surname() {
    return $this->surname;
   }

 public function get_Check() {
    return $this->$check;
   }

 public function get_Account() {
    return $this->account;
   }

 public function set_Check($check_Arr) {
  $this->$check=$check_Arr;
 }

 public function set_Account($account_Arr) {
  $this->$account=$account_Arr;
 }

}


class Account  {
  private $iban;
  private $holder_name;
  private $holder_surname;
  protected $Amount;

  public function get_Iban() {
    return $iban;
  }

  public function Account($iban,$holder_name,$holder_surname) {
    $this->$iban=$iban;
    $this->$holder_name=$holder_name;
    $this->$holder_surname=$holder_surname;
  }

  public function get_Amount() {
    return $Amount;
  }

  public function set_Amount($Amount) {
    $this->$Amount=$Amount;
  }

   public function iban_toAccount() {
     $account=substr($iban,20);
     $acccount=str_replace(' ','',$account);
     for($i=0; $i<strlen($account); $i++) {
      if($i>=4 || strlen($account) - $i>4) {
        $account[i]='*';
      }
     }
     return $account;
  }
}

?>
