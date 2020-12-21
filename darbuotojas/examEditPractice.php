<?php

include("../database/database.class.php");
$databaseObj = new database(); 
$conn = $databaseObj->connect();

if(isset($_POST['submit'])){
  $bus = $_POST['bus'];

  $databaseObj->updatePracticeExam($conn, $_GET['id'], $bus);
  header("Location: ./exam.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="../stylesheet.css">
  </head>
<body>
<?php 
include("main_bar_worker.php");
?>
 
  <div class="jumbotron text-center">
    <h1><?php echo $_GET['klid'];?> Praktikos Egzamino Vertinimas</h1>
    <br>
    <form action="" method="post">
    <?php
     
     echo "<div class=\"form-group\">";
     echo "<select name =\"bus\" class=\"form-control\" >";
     echo " <option value=".$_GET['bus']." selected>Nieko nekeisti</option>";
     echo "<option value='1'>Egzaminas</option>";
     echo "<option value='2'>Išlaikė</option>";
     echo "<option value='3'>Neišlaikė</option>";
     echo "</select>";
     echo "</div>";
     echo "<input type=\"submit\" name=\"submit\" value=\"Išsaugoti pakeitimus\" class=\"btn btn-primary\">";
   
    ?>
    </form>
  
   

  </div>
 
  
  <?php include("../button.html");?>
  </body>
</html>