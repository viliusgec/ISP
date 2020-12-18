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
        $subject = 'Slaptažodžio priminimas'; 
        $message = '
        
        Jūsų slaptažodis yra:
        
        ------------------------
        Slaptažodis: '.$data['slaptazodis'].'
        ------------------------
        
        '; 
    
        $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
        mail($to, $subject, $message, $headers);
        include 'navbar.php';
        //Sutvarkyti veliau sita graziai
        echo "<div class='jumbotron text-center'>
    <h1>Slaptažodis išsiųstas nurodytų el paštu</h1>
      </div>";
    }
    else 
    {
        include 'forgotPassword.php';
        echo "<div class='jumbotron text-center'>
        <h1 style='color:red'>Tokiu el paštu nėra registruotų vartotojų</h1>
          </div>";
    }
    
}

?>