
<?php
session_start();
include("main_bar_klientas.html");
include '../database/database.class.php';
$databaseObj = new database();
$conn = $databaseObj->connect();

if(empty($_POST['submit'])) {
  include 'change_pass.tpl.php';
}
else
{
  if($_SESSION['slaptazodis'] == $_POST['slaptazodis'])
  {
    $databaseObj->changePassword($conn, $_POST['slaptazodis1'], $_SESSION['epastas']);
    $_SESSION['slaptazodis'] = $_POST['slaptazodis1'];
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