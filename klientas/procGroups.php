<?php 
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
include("../database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

    if(empty($_POST['grupe'])) {
        echo("Jūs nepasirinkote jokio laiko");
        die();
    }
    $userid = $_SESSION["userID"];

    if ($databaseObj->getGroup($conn, $userid) == 1)
    {
      echo "Jūs jau esate užsiregistravęs į grupę.";
      die();
    }

    $grupesid = $_POST["grupe"];
    $sql = "INSERT INTO `grupes_nariai`
    VALUES ('$userid', '$grupesid')";
         if ($conn->query($sql) === TRUE) {
           echo "Jūs sėkmingai pasirinkote grupę!";
           $sql = "UPDATE `grupe` SET `vietu_kiekis`=`vietu_kiekis`-1 WHERE `id`='$grupesid'";
           $conn->query($sql);
         } else {
           echo "Nepavyko užsiregistruoti į grupę";
         }
?> 