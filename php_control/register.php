<?php
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['epastas'])) && !empty($_POST['epastas']))
{
    $email = $_POST['epastas'];
    $passw = $_POST['slaptazodis1'];
    $name = $_POST['vardas'];
    $surname = $_POST['pavarde'];
    $id = $_POST['asmenskodas'];
    $conn = $databaseObj->connect();
    $data = $databaseObj->register($conn, $name, $surname, $id, $email, $passw);
    header('Location: ../index.php');
}
?>