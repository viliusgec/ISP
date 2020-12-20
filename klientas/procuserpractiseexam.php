<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
include("../database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

    if(empty($_POST['tvarkarastis'])) {
        echo("Jūs nepasirinkote jokio laiko");
        die();
    }
$userid = $_SESSION["userID"];
if ($databaseObj->getPractiseExam($conn, $userid) == 1)
{
  echo "Jūs jau esate užsiregistravęs į egzaminą.";
  die();
}
$pamokosid = $_POST["tvarkarastis"];
    $sql = "UPDATE `praktiniu_tvarkarastis` SET `ar_uzimta`=1, `fk_asmuo_id`='$userid', `ar_egzaminas`=1
     WHERE `id`='$pamokosid'";
         if ($conn->query($sql) === TRUE) {
           echo "Užsiregistravote į egzaminą!";
         } else {
           echo "Nepavyko užsiregistruoti į egzaminą";
         }

?> 