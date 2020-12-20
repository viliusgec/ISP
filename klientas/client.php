<?php 
session_start();
$_SESSION['message_photo'] = "";
 include("main_bar_klientas.html");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();
  if ($databaseObj->checkIfVerified($conn, $_SESSION['epastas']) == 1) {
      // $_SESSION['message_email_confirm'] = "<h6 style='color: green'>Jūsų profilis yra patvirtintas</h6>";
      $mailver = "";
    }
  else {
    $mailver = "<h6 style='color: red'>Jūsų el. paštas yra nepatvirtintas</h6>";
  }

  if ($databaseObj->checkIfVerifiedPhoto($conn, $_SESSION['epastas']) == 1) {
    // $_SESSION['message_email_confirm'] = "<h6 style='color: green'>Jūsų profilis yra patvirtintas</h6>";
    $photover = "";
  }
else {
  $photover = "<h6 style='color: red'>Jūsų tapatybė yra nepatvirtinta</h6>";
}
 
?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h1>Jūsų profilis</h1>
    <?php echo "" . $mailver?>
    <?php echo "" . $photover?>
    <br>

    <?php 
    if($mailver == $photover)
      {
        echo "<a href='change_pass.php' class='btn btn-outline-info'>Keisti slaptažodį</a> ";
        echo "<a href='userContract.php' class='btn btn-outline-info'>Registracija į kursus</a> ";
        echo "<a href='userPractise.php' class='btn btn-outline-info'>Registracija į praktines pamokas</a> ";
        echo "<a href='userRegisteredExams.php' class='btn btn-outline-info'>Jūsų pamokos</a><br><br>";
        echo "<a href='PractiseExam.php' class='btn btn-outline-info'>Praktikos egzaminas</a> ";
        echo "<a href='TheoryExam.php' class='btn btn-outline-info'>Teorijos egzaminas</a> ";
        echo "<a href='ExamCancel.php' class='btn btn-outline-info'>Egzaminų atšaukimas</a> ";
        echo "<a href='ContractPdf.php' class='btn btn-outline-info'>Sutarties pdf</a> ";
      }
    else 
    {
      if($mailver!="")
      {
        echo "<a href='new_verify.php' class='btn btn-outline-info'>El. Pašto tvirtinimas</a> ";
      }
      if($photover!="")
      {
        echo "<a href='photoUpload.php' class='btn btn-outline-info'>Nuotraukos įkėlimas</a> ";
      }
    }
    ?>  
  
   
  </div>
 
<?php include("../button.html");?>
  </body>
</html>