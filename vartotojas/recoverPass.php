<?php
//padaryt kad index.php atidarytu sita, o ne html
//Padaryt kai normaliai files susidesim
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['epastas'])) && !empty($_POST['epastas']))
{
    $email = $_POST['epastas'];
    $conn = $databaseObj->connect();
    $data = $databaseObj->checkEmail($conn, $email);
    if(!empty($data))
    {
        $to      = $email; 
        $subject = 'Signup | Verification'; 
        $message = '
        
        Your password is:
        
        ------------------------
        Password: '.$data['slaptazodis'].'
        ------------------------
        
        '; 
    
        $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
        mail($to, $subject, $message, $headers);
        include '../forgotPassword.html';
        //Sutvarkyti veliau sita graziai
        echo "Slaptazodis atsiustas nurodytu el pastu";
        sleep(5);
        //header('Location: ../index.php');
    }
    else 
    {
        echo "Toks el pastas neuzregistruotas";
        include '../forgotPassword.html';
    }
    
}

?>