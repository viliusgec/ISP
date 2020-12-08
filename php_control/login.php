<?php
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['epastas'])) && !empty($_POST['epastas']))
{
    $email = $_POST['epastas'];
    $passw = $_POST['slaptazodis'];
    echo $email;
    echo $passw;
    echo "--------";
    $conn = $databaseObj->connect();
    $data = $databaseObj->logIn($conn, $email, $passw);
    $data = $data->fetch_assoc();
    if(!empty($data))
    {
        session_start();
        $_SESSION['vardas'] = $data['vardas'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['userID'] = $data['asmens_kodas'];
        echo $_SESSION['role'];
        header('Location: ../index.php');
    }
        
    else echo "bad loginas - reiktu kazkaip permest atgal login lauka bet nemoku su tuo pop up langu";
}
?>