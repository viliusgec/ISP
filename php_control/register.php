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
    $hash = md5( rand(0,1000) );
    $conn = $databaseObj->connect();
    $data = $databaseObj->register($conn, $name, $surname, $id, $email, $passw, $hash);

    $to      = $email; 
    $subject = 'Signup | Verification'; 
    $message = '
    
    Thanks for signing up, '.$name.'!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
    
    ------------------------
    ID: '.$id.'
    Password: '.$passw.'
    ------------------------
    
    Please click this link to activate your account:
    http://localhost/ISP/php_control/verify.php?email='.$email.'&hash='.$hash.'
    
    '; 

    $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
    mail($to, $subject, $message, $headers);

    //Sutvarkyti veliau sita graziai
    echo "Aktyvuokite paskyra atsiusta nuoroda i elpasta";
    sleep(5);
    header('Location: ../index.php');
}
?>