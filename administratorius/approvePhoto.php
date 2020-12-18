<?php
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['approve'])))
{
  var_dump($_POST);
 
  echo $_POST['approve'];
  $identityNr = $_POST['approve'];

  echo $identityNr;
  $conn = $databaseObj->connect();
    $data = $databaseObj->updatePhotoStatusApproved($conn, $identityNr);

    header('Location: photoConfirmation.php?Message=Nuotrauka patvirtinta');
    // Apply your logic on database operations, etc...
  }

  if((isset($_POST['decline'])))
  {
     $identityNr = $_POST['decline'];
    $conn = $databaseObj->connect();
    $data = $databaseObj->updatePhotoStatusDecline($conn, $identityNr);
    header('Location: photoConfirmation.php?Message=Nuotrauka atsaukta');
  }
    

   

?>