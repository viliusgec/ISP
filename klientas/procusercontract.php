<?php 
include("main_bar_klientas.php");
include("../database/database.class.php");
$_SESSION['message_photo'] = "";

$databaseObj = new database();  
$conn = $databaseObj->connect();

if (($databaseObj->checkIfHasContract($conn, $_SESSION['userID'])) == 1)
{
  echo "Jūs jau esate užsiregistravęs į kursus";
  die();
}

    if(empty($_POST['id'])) {
        echo("Jūs nepasirinkote jokių kursų");
        die();
    } 
    $ids = $_POST['id'];
    if (($N = count($ids)) > 1){
        echo "prašome pasirinkti tik vienus kursus";
        die();
    }

    $data = date('Y-m-d');
    $userid = $_SESSION['userID'];

    $sql = "INSERT INTO `sutartis` (`sudaryta`, `fk_klientas`, `fk_kursai`)
    VALUES ('$data', '$userid','$ids[0]')";
         if ($conn->query($sql) === TRUE) {
           echo "Užsiregistravote į kursus! Dabar pasirinkite grupę!";
         } else {
           echo "Nepavyko užsiregistruoti į kursus";
         }

         include("../button.html");

?> 