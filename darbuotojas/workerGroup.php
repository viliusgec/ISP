<?php
session_start();
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
  </head>
<body>
<?php 
include("main_bar_worker.html");
?>
 
  <div class="jumbotron text-center">
    <h1>Mano grupės</h1>
    <br>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Vietų kiekis</th>
      <th scope="col">Numatyta data</th>
      <th scope="col">Numatyta data iki</th>
      <th scope="col">Būsena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php
     $duom = $databaseObj->getGroupList($conn, $_SESSION['userID']);
     while($row = $duom->fetch_assoc()) {
         echo "<tr>";
         echo "<td>".$row['pavadinimas']."</td>";
         echo "<td>".$row['vietu_kiekis']."</td>";
         echo "<td>".$row['numatyta_data']."</td>";
         echo "<td>".$row['numatyta_data_iki']."</td>";
         echo "<td>".$row['busena']."</td>";
         echo "<td><a href=\"workerGroupEdit.php?pav=".$row['pavadinimas']."&vk=".$row['vietu_kiekis']."&nd=".$row['numatyta_data']."&ndk=".$row['numatyta_data_iki']."&id=".$row['id']."&bus=".$row['busena']."&id=".$row['id']."\" class=\"btn btn-outline-primary\">Redaguoti</a></td>";
         echo "</tr>";
       }
    ?>
    </tbody>
</table>
  
   

  </div>
 
  
  <?php include("workerButton.html");?>
  </body>
</html>