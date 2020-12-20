<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
include("../database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

    if(empty($_POST['teorija'])) {
        echo("Jūs nepasirinkote jokio laiko");
        die();
    }
    $userid = $_SESSION["userID"];
    echo ($databaseObj->getTheoryExam($conn, $userid));
    if ($databaseObj->getTheoryExam($conn, $userid) == 1)
    {
      echo "Jūs jau esate užsiregistravęs į egzaminą.";
      die();
    }

    $egzaminoid = $_POST["teorija"];
    $sql = "INSERT INTO `egzamino_nariai`
    VALUES ('$userid', '$egzaminoid', '0')";
         if ($conn->query($sql) === TRUE) {
           echo "Užsiregistravote į egzaminą!";
           $sql = "UPDATE `egzaminas` SET `vietu_kiekis`=`vietu_kiekis`-1 WHERE `id`='$egzaminoid'";
           $conn->query($sql);
         } else {
           echo "Nepavyko užsiregistruoti į egzaminą";
         }
?> 