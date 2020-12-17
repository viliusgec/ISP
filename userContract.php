<?php 
session_start();
$_SESSION['message_photo'] = "";
 include("main_bar.html");
 include("database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();
 if ($databaseObj->checkIfVerifiedPhoto($conn, $_SESSION['epastas']) == 1) {
  $_SESSION['message_photo_confirm'] = "<h6 style='color: green'>Jūsų nuotrauka yra patvirtinta</h6>";
}
else {
$_SESSION['message_photo_confirm'] = "<h6 style='color: red'>Jūsų nuotrauka nėra nepatvirtinta. Norint registruotis į kursus, reikia įkelti savo paso nuotrauką.</h6>";
}

?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h1>Sutarties sudarymas</h1>
    <?php echo "" . $_SESSION['message_photo_confirm']?>

<form action="procusercontract.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="vardas" placeholder="Įveskite naują vardą:">
      </div>

</form>

</div>
<?php include("button.html");?>

  </body>
</html>