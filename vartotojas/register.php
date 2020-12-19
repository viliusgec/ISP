<?php
session_start();
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['epastas'])) && !empty($_POST['epastas']))
{
    $conn = $databaseObj->connect();
    $data = $databaseObj->checkAccount($conn, $_POST['epastas'], $_POST['asmenskodas']);
    $data = $data->fetch_assoc();
    if(!empty($data))
    {
        $_SESSION['loginError'] = "Toks asmuo jau užregistruotas";
        header('Location: ../index.php');
    }
    else  $_SESSION['loginError'] = "Sėkmingai užsiregistravote. Galite prisijungti.";
    $email = $_POST['epastas'];
    $passw = $_POST['slaptazodis1'];
    $passw2 = hash('ripemd160', $passw);
    $name = $_POST['vardas'];
    $surname = $_POST['pavarde'];
    $id = $_POST['asmenskodas'];
    $hash = md5( rand(0,1000) );
    $date = date("Y-m-d"); 
    $data = $databaseObj->register($conn, $name, $surname, $id, $email, $passw2, $hash, $date);

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