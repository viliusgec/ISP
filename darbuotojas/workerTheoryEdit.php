<?php
session_start();
include("../database/database.class.php");
$databaseObj = new database(); 
$conn = $databaseObj->connect();

if(isset($_POST['submit'])){
  $pav = $_POST['pav'];
  $vk = $_POST['vk'];
  $nd = $_POST['nd'];
  $ndk = $_POST['ndk'];

  $databaseObj->updateGroup($conn, $pav, $vk, $nd, $ndk, $_GET['id']);
  header("Location: ./workerGroup.php");
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
    <h1>Grupė <?php echo $_GET['pav'];?></h1>
    <br>
    <form action="" method="post">
    <?php
     
     echo "<div class=\"form-group\">";
     echo " <label for=\"pavad\">Pavadinimas</label>";
     echo " <input type=\"text\" class=\"form-control\" name=\"pav\" aria-describedby=\"pav\" value=".$_GET['pav'].">";
     echo " <label for=\"vk\">Vietų skaičius</label>";
     echo " <input type=\"number\" class=\"form-control\" name=\"vk\" aria-describedby=\"pav\" value=".$_GET['vk'].">";
     echo " <label for=\"nd\">Numatyta data</label>";
     echo " <input type=\"date\" class=\"form-control\" name=\"nd\" aria-describedby=\"pav\" value=".$_GET['nd'].">";
     echo " <label for=\"ndk\">Numatyta data iki</label>";
     echo " <input type=\"date\" class=\"form-control\" name=\"ndk\" aria-describedby=\"pav\" value=".$_GET['ndk'].">";
     echo "</div>";
     echo "<input type=\"submit\" name=\"submit\" value=\"Išsaugoti pakeitimus\" class=\"btn btn-primary\">";
   
    ?>
    </form>
  
   

  </div>
 
  
  <?php include("../button.html");?>
  </body>
</html>