<?php
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['epastas'])) && !empty($_POST['epastas']))
{
    session_start();
    $email = $_POST['epastas'];
    $passw = $_POST['slaptazodis'];
    $conn = $databaseObj->connect();
    $data = $databaseObj->logIn($conn, $email, $passw);
    $data = $data->fetch_assoc();
    if(!empty($data))
    {
        $_SESSION['loginError'] = "";
        $_SESSION['vardas'] = $data['vardas'];
        $_SESSION['pavarde'] = $data['pavarde'];
        $_SESSION['epastas'] = $data['el_pastas'];
        $_SESSION['slaptazodis'] = $data['slaptazodis'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['userID'] = $data['asmens_kodas'];
        $_SESSION['tokenas'] = $data['tokenas'];
        $date = date("Y-m-d");     
        $data = $databaseObj->updateLastLogin($conn, $date, $email);
        header('Location: ../index.php');
    }
    else 
    {
        $_SESSION['loginError'] = "Įvestas neteisingas slaptažodis";
        header('Location: ../index.php');
    }
}
?>