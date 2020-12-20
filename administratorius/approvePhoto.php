<?php
//padaryt kai kai approvina issiunte i pastas
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

  $email;
  $name;
  $lastName;
  $toWho = $databaseObj->getPhotoRecipient($conn, $identityNr);
    while ($row = $toWho->fetch_assoc()) {
                     
      $email = $row['el_pastas'];
      $name = $row['vardas']; 
      $lastName = $row['pavarde'];

    
    }
    $to      = $email; 
    $subject = 'Tapatybes patvirtinimas - pavyko'; 
    $message = '
    
    '.$name.' '.$lastName.',
    Jūsų tapatybė buvo patvirtinta
    Galite pradėti registracijas. 
    
    
    Pradinis puslapis:
    http://localhost/ISP'; 

    $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
    mail($to, $subject, $message, $headers);

    header('Location: photoConfirmation.php?Message=Nuotrauka patvirtinta ir paštas išsiųstas ');

    // Apply your logic on database operations, etc...
  }

  if((isset($_POST['decline'])))
  {
     $identityNr = $_POST['decline'];
    $conn = $databaseObj->connect();
    $data = $databaseObj->updatePhotoStatusDecline($conn, $identityNr);

    $email;
    $name;
    $lastName;
    $toWho = $databaseObj->getPhotoRecipient($conn, $identityNr);
      while ($row = $unconfirmedPhotos->fetch_assoc()) {
                       
        $email = $row['el_pastas'];
        $name = $row['vardas']; 
        $lastName = $row['pavarde'];
  
      
      }
      $to      = $email; 
      $subject = 'Tapatybes patvirtinimas - nepavyko'; 
      $message = '
      
      '.$name.' '.$lastName.',
      Jūsų tapatybė buvo nepatvirtinta
      Pabandykite iš naujo. 
      
      
      Pradinis puslapis:
      http://localhost/ISP'; 
  
      $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
      mail($to, $subject, $message, $headers);

    header('Location: photoConfirmation.php?Message=Nuotrauka atsaukta');
  }
    

   

?>