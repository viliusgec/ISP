<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar.html");
include("database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

    if(empty($_POST['tvarkarastis'])) {
        echo("Jūs nepasirinkote jokio laiko");
        die();
    }
$userid = $_SESSION["userID"];
$pamokosid = $_POST["tvarkarastis"];
    $sql = "UPDATE `praktiniu_tvarkarastis` SET `ar_uzimta`=1, `fk_asmuo_id`='$userid' WHERE `id`='$pamokosid'";
         if ($conn->query($sql) === TRUE) {
           echo "Užsiregistravote į pamoką!";
         } else {
           echo "Nepavyko užsiregistruoti į pamoką";
         }




?> 