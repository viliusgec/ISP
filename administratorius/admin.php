<?php 

 include("main_bar_admin.php");
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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  </head>
  <body>
    
 
  <div class="jumbotron text-center">
    <h1>Funkcijos</h1>
    <br>
    <a href="photoConfirmation.php" class="button">Nuotrauku patvirtinimas</a>
    <a href="newGroup.php" class="button">Nauja Grupe</a>
   

  </div>
  
  <?php include("../button.html");?>
  </body>
</html>