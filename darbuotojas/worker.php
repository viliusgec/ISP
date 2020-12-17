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

    <a href="workerMessage.php" class="btn btn-outline-info">Zinuciu siuntimas</a>
    <a href="workerGroupEdit.php" class="btn btn-outline-info">Teorijos grupiu redagavimas</a>
    <a href="workerDrivingEdit.php" class="btn btn-outline-info">Vairavimu redagavimas</a>
    <a href="calendar.php" class="btn btn-outline-info">Tvarkarastis</a>
    <a href="exam.php" class="btn btn-outline-info">Egzaminų vertinimas</a>
  
   

  </div>
 
  
  <button type="button" class="btn btn-danger live_chat_button">Live chat</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>