<?php 
session_start();
$_SESSION['message_photo'] = "";
 include("main_bar.html");
 include("database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();
  if ($databaseObj->checkIfVerified($conn, $_SESSION['epastas']) == 0) {
      $_SESSION['message_email_confirm'] = "<h6 style='color: green'>Jūsų profilis yra patvirtintas</h6>";
    }
  else {
    $_SESSION['message_email_confirm'] = "<h6 style='color: red'>Jūsų profilis yra nepatvirtintas</h6>";
  }
 
?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h1>Jūsų profilis</h1>
    <?php echo "" . $_SESSION['message_email_confirm']?>
    <br>

    <a href="photoUpload.php" class="btn btn-outline-info">Nuotraukos įkėlimas</a>
    <a href="userdata.html" class="btn btn-outline-info">Jūsų duomenys</a>
    <a href="userConfirmation.html" class="btn btn-outline-info">Jūsų veikla</a>
    <a href="emailConfirmationUser.html" class="btn btn-outline-info">El. Pašto tvirtinimas</a>
    <a href="Exams.php" class="btn btn-outline-info">Jūsų registracijos</a>
  
   
  </div>
 
<?php include("button.html");?>
  </body>
</html>