
<?php
include("main_bar_klientas.php");
include '../database/database.class.php';
$databaseObj = new database();
$conn = $databaseObj->connect();

if(empty($_POST['submit'])) {
  include 'change_pass.tpl.php';
}
else
{
  $_POST['slaptazodis'] = hash('ripemd160', $_POST['slaptazodis']);
  if($_SESSION['slaptazodis'] == $_POST['slaptazodis'])
  {
    $newpass = hash('ripemd160', $_POST['slaptazodis1']);
    $databaseObj->changePassword($conn, $newpass, $_SESSION['epastas']);
    $_SESSION['slaptazodis'] = $newpass;
    echo "<div class='jumbotron text-center'>
    <h1>Slaptažodis sėkmingai pakeistas</h1>
      </div>";
  }
  else
  {
    echo "<div class='jumbotron text-center'>
    <p style='color:red'>Įvestas neteisingas slaptažodis</p>";
    include 'change_pass.tpl.php';
  }
}

?>

  <script src="JavaScripts/PasswordChecker.js"></script>
 
 <?php 
include("../button.html");  
?>
</body>
</html>