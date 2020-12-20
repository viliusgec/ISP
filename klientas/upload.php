
<?php
session_start();
include("../database/database.class.php");
$databaseObj = new database();
$conn = $databaseObj->connect();

if ($_FILES['fileToUpload']['size']>1048576) {
  $_SESSION['message_photo'] = "<h3 style='color: red'>Nuotraukos sveria per daug</h3>";
  header("Location: photoUpload.php");
  die(); 
}
$user = $_SESSION['userID'];
$photo = "../uploads/" . $user . $_FILES['fileToUpload']['name'];

// galima padaryti, kad neleistų du kart įkelt nuotraukos tam pačiam useriui
// kol neatmetė senos foto
// ir dar padaryti, kad neleistų kelti nuotraukos, jeigu jau patvirtinta nuotrauka
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $photo)) {
  $_SESSION['message_photo'] = "<h3 style='color: green'>Nuotrauka įkelta sėkmingai</h3>"; 
   $sql = "INSERT INTO `nuotraukos` (`location`, `vartotojo_id`, `busena`)
   VALUES ('$photo', '$user', '0')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
  header("Location: photoUpload.php");
} else {
  $_SESSION['message_photo'] = "<h3 style='color: red'>Nuotrauka neįkelta</h3>"; 
}

?>
