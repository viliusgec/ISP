<?php

include("../database/database.class.php");
$databaseObj = new database(); 
$conn = $databaseObj->connect();
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
    <h1>Mano Grupių Pamokos</h1>
    <br>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Grupės pavadinimas</th>
      <th scope="col">Laikas</th>
      <th scope="col">Trukmė</th>
      <th scope="col">Diena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php
     $duom = $databaseObj->getLessonList($conn, $_SESSION['userID']);
     while($row = $duom->fetch_assoc()) {
         echo "<tr>";
         echo "<td>".$row['pavadinimas']."</td>";
         echo "<td>".$row['laikas']."</td>";
         echo "<td>".$row['trukme']."</td>";
         echo "<td>".$row['diena']."</td>";
         echo "<td><a href=\"workerTheoryEdit.php?laik=".$row['laikas']."&truk='".$row['trukme']."'&dien=".$row['diena']."&id=".$row['pamid']."&pav=".$row['pavadinimas']."\" class=\"btn btn-outline-primary\">Redaguoti</a></td>";
         echo "</tr>";
       }
    ?>
    </tbody>
</table>
  
   

  </div>
 
  
  <?php include("../button.html");?>
  </body>
</html>