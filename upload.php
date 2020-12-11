
<?php

session_start();

if ($_FILES['fileToUpload']['size']>1048576) {
  $_SESSION['message_photo'] = "<h3 style='color: red'>Nuotraukos dydis per didelis</h3>";
  header("Location: photoUpload.php");
  die(); 
}

if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "./uploads/" . $_SESSION['userID'] . $_FILES['fileToUpload']['name'])) {
  $_SESSION['message_photo'] = "<h3 style='color: green'>Nuotrauka įkelta sėkmingai</h3>"; 
  header("Location: photoUpload.php");
} else {
  $_SESSION['message_photo'] = "<h3 style='color: red'>Nuotrauka neįkelta</h3>"; 
}

?>
