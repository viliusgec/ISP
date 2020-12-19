<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar.html");
include("database/database.class.php");

$databaseObj = new database();  
$conn = $databaseObj->connect();

if (($databaseObj->checkIfHasContract($conn, $_SESSION['userID'])) == 1)
{
    print_r("Jūs jau esate užsiregistravęs į kursus");
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
           echo "Užsiregistravote į kursus!";
         } else {
           echo "Nepavyko užsiregistruoti į kursus";
         }

?> 