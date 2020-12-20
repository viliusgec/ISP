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
session_start();
include("main_bar_worker.html");
 ?>
 
  <div class="jumbotron text-center">
    <h1>Darbuotojo nustatymai</h1>
    <br>

    <a href="workerMessage.php" class="btn btn-outline-info">Žinučių siuntimas</a>
    <a href="workerGroup.php" class="btn btn-outline-info">Grupių redagavimas</a>
    <a href="workerTheoryEdit.php" class="btn btn-outline-info">Teorijos pamokų redagavimas</a>
    <a href="workerDrivingEdit.php" class="btn btn-outline-info">Vairavimu pamokų redagavimas</a>
    <a href="calendar.php" class="btn btn-outline-info">Tvarkaraščio redagavimas</a>
    <a href="exam.php" class="btn btn-outline-info">Egzaminų vertinimas</a>
  
   

  </div>
 
  
  <?php include("workerButton.html");?>
  </body>
</html>