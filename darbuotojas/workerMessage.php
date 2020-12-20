<?php 
session_start();
include("../database/database.class.php");
$databaseObj = new database(); 
$conn = $databaseObj->connect();



if(isset($_POST['submit'])){
    $to = $_POST['emails'];
    $from = "ispprojektas@gmail.com"; 
    $first_name = $_SESSION['vardas'];
    $last_name = $_SESSION['pavarde'];
    $subject = "Iš Traktoristas aš esu";
    $subject2 = "Kopija";
    $message = "Sveiki ".$first_name . " " . $last_name . " ." . "\n\n" . $_POST['message'];
    $message2 = "Kopija " . $first_name . "\n\n" . $_POST['message'];

    $headers = "Nuo:" . $from;
    $headers2 = "Nuo:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
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
  </head>
<body>
<?php
include("main_bar_worker.html");
 ?>
 
  <div class="jumbotron text-center">
    <h1>Zinutes siuntimas</h1>
    <br>


   

  </div>


  <form action="" method="post">
    <div class="form-row"></div>
    <div class="form-group col-md-2">
    <!-- <label for="first_name">Vardas</label>
    <input type="text" name="first_name" class="form-control"><br>
    <label for="last_name">Pavardė</label>
    <input type="text" name="last_name" class="form-control"><br> -->
      <label for="exampleInputEmail1">Gavėjo el. paštas</label>
      <select class="form-control" name="emails">
      <?php
      //$inform = $databaseObj->getUserEmails($conn, "klientas");

      
      
      $duom = $databaseObj->getUserEmails($conn, "klientas");
      while($row = $duom->fetch_assoc()) {
          echo "<option value=".$row['el_pastas'].">".$row['el_pastas']."</option>";
        }
      ?>
      </select>
      <!-- <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com"> -->
    </div>
    <div class="form-group col-md-3">
      <label for="exampleInputPassword1">Žinutė</label>
      <textarea rows="5" name="message" cols="30" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group col-md-3">
    <input type="submit" name="submit" value="Siųsti" class="btn btn-primary">
  </div>
  </div>
  </form>



  
  <?php include("../button.html");?>
  </body>
</html>