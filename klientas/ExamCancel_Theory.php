<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.html");
include("../database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

$userid = $_SESSION["userID"];

    $sql = "DELETE FROM `egzamino_nariai` WHERE fk_klientas='$userid'";
         if ($conn->query($sql) === TRUE) {
           echo "Egzaminas atšauktas";
         } else {
           echo "Egzaminas neatšauktas, teks eit.";
         }
         // padaryti, kad pridėtų +1 kai egzaminas atšaukiamas
?> 