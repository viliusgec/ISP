<?php 
session_start();
include("main_bar.html"); ?>

<div class="jumbotron text-center animate__animated animate__fadeIn">
<?php 
echo "<div class='jumbotron text-center'>
    <h1>Išsiųstas paveitinimo laiškas paštu: ".$_SESSION['epastas']."</h1>
      </div>";

      $email = $_SESSION['epastas'];
      $name = $_SESSION['vardas'];
      $hash = $_SESSION['tokenas'];
  
      $to      = $email; 
      $subject = 'Verification'; 
      $message = '
      
      Atsiųsta paskyros aktyvavimo nuoroda. 
      
      
      Paspauskite ant nuorodos norint aktyvuoti paskyra:
      http://localhost/ISP/vartotojas/verify.php?email='.$email.'&hash='.$hash.'
      
      '; 
  
      $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
      mail($to, $subject, $message, $headers);
      
?>