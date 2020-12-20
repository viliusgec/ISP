<?php 
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
include("../database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

$userid = $_SESSION["userID"];
    $sql = "UPDATE `praktiniu_tvarkarastis` SET `ar_uzimta`=0, `fk_asmuo_id`='nera',
     `ar_egzaminas`=0 WHERE `fk_asmuo_id`='$userid' AND `ar_egzaminas`=1";
         if ($conn->query($sql) === TRUE) {
           echo "Egzaminas atšauktas";
         } else {
           echo "Egzaminas neatšauktas, teks eit";
         }




?> 