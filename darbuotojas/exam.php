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
    <h1>Egzaminai</h1>
    <br>
    <h2>Teorijos</h2>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Kliento ID</th>
      <th scope="col">Egzamino id</th>
      <th scope="col">Laikas</th>
      <th scope="col">Būsena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php
     $duom = $databaseObj->getTheoryExamList($conn);
     while($row = $duom->fetch_assoc()) {
      if($row['busena'] != 1 || $row['busena'] != 2){
         echo "<tr>";
         echo "<td>".$row['fk_klientas']."</td>";
         echo "<td>".$row['fk_egzamino_id']."</td>";
         echo "<td>".$row['laikas']."</td>";
         switch($row['busena']){
           case 0:
            echo "<td>Laukiama</td>";
            break;
            case 1:
            echo "<td>Išlaikė</td>";
            break;
            case 2;
            echo "<td>Neišlaikė</td>";
            break;
          
         }
         echo "<td><a href=\"examEdit.php?bus=".$row['busena']."&id=".$row['fk_klientas']."&klid=".$row['fk_klientas']."\" class=\"btn btn-outline-primary\">Įvertinti</a></td>";
         echo "</tr>";
        }
       }
    ?>
    </tbody>
</table>
  
<br>
    <h2>Praktikos</h2>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Kliento ID</th>
      <th scope="col">Egzamino id</th>
      <th scope="col">Laikas</th>
      <th scope="col">Būsena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php
     $duom = $databaseObj->getPracticeExamList($conn);
     while($row = $duom->fetch_assoc()) {
      if($row['ar_egzaminas'] != 0 || $row['ar_egzaminas'] != 2 || $row['ar_egzaminas'] != 3){
         echo "<tr>";
         echo "<td>".$row['fk_asmuo_id']."</td>";
         echo "<td>".$row['id']."</td>";
         echo "<td>".$row['laikas']."</td>";
         
         switch($row['ar_egzaminas']){
           case 1:
            echo "<td>Egzaminas</td>";
            break;
            case 2:
            echo "<td>Išlaikė</td>";
            break;
            case 3;
            echo "<td>Neišlaikė</td>";
            break;
          
         }
         echo "<td><a href=\"examEditPractice.php?bus=".$row['ar_egzaminas']."&id=".$row['fk_asmuo_id']."&klid=".$row['fk_asmuo_id']."\" class=\"btn btn-outline-primary\">Įvertinti</a></td>";
         echo "</tr>";
        }
       }
    ?>
    </tbody>
</table>

  </div>
 
  
  <?php include("../button.html");?>
  </body>
</html>