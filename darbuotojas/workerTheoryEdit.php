<?php

include("../database/database.class.php");
$databaseObj = new database(); 
$conn = $databaseObj->connect();

if(isset($_POST['submit'])){
  $laik = $_POST['pav'];
  $truk = $_POST['vk'];
  $dien = $_POST['nd'];
  $databaseObj->updateLesson($conn, $laik, $truk, $dien, $_GET['id']);
  header("Location: ./workerTheory.php");
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
    <h1>Grupės <?php echo $_GET['pav'];?> pamoka</h1>
    <br>
    <form action="" method="post">
    <?php
     
     echo "<div class=\"form-group\">";
     echo " <label for=\"pav\">Laikas</label>";
     echo " <input type=\"text\" class=\"form-control\" name=\"pav\" aria-describedby=\"pav\" value=".$_GET['laik'].">";
     echo " <label for=\"vk\">Trukmė</label>";
     echo " <input type=\"text\" class=\"form-control\" name=\"vk\" aria-describedby=\"pav\" value=".$_GET['truk'].">";
     echo " <label for=\"nd\">Numatyta data</label>";
     echo "<select name =\"nd\" class=\"form-control\" >";
     echo " <option value=".$_GET['dien']." selected>Nepasikeitus diena</option>";
     echo "<option value=\"Pirmadienis\">Pirmadienis</option>";
     echo "<option value=\"Antradienis\">Antradienis</option>";
     echo "<option value=\"Trečiadienis\">Trečiadienis</option>";
     echo "<option value=\"Ketvirtadienis\">Ketvirtadienis</option>";
     echo "<option value=\"Penktadienis\">Penktadienis</option>";
     echo "</select>";

     
    //  echo " <input type=\"text\" class=\"form-control\" name=\"nd\" aria-describedby=\"pav\" value=".$_GET['dien'].">";
     echo "</div>";
     echo "<input type=\"submit\" name=\"submit\" value=\"Išsaugoti pakeitimus\" class=\"btn btn-primary\">";
   
    ?>
    </form>
  
   

  </div>
 
  
  <?php include("../button.html");?>
  </body>
</html>