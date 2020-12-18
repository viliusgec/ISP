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
    $date = date("Y-m-d"); 
    $data = $databaseObj->register($conn, $name, $surname, $id, $email, $passw, $hash, $date);

    $to      = $email; 
    $subject = 'Prisijungimas | Patvirtinimas'; 
    $message = '
    
    Ačiū, kad užsiregistravote, '.$name.'!
    Jūsų paskyra yra sukurta, tačiau norint ją aktyvuoti paspauskite nuorodą apačioje. 
    
    ------------------------
    Jūsų ID: '.$id.'
    Jūsų slaptažodis: '.$passw.'
    ------------------------
    
    Nuoroda paskyros atkyvavimui:
    http://localhost/ISP/vartotojas/verify.php?email='.$email.'&hash='.$hash.'
    
    '; 

    $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
    mail($to, $subject, $message, $headers);
    header('Location: ../index.php');
}
?>