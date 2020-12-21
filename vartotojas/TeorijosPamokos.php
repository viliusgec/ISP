<?php 
session_start();
include("navbar.php");
if(!empty($_SESSION['loginError']))
{
      echo "<div class='jumbotron text-center'>
      <p style='color:red'>".$_SESSION['loginError']."</p> </div>";
}
include '../database/database.class.php';
$databaseObj = new database();
 ?>
      
<style>
img {
      -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
      transition-duration: 1s;
      filter: grayscale(100%);
      }
img:hover{
      -webkit-filter: grayscale(0%); /* Safari 6.0 - 9.0 */
      transition-duration: 1s;
      filter: grayscale(0%);
      }
</style>

  <div class="jumbotron text-center">
    <h1>Sveiki atvykę į „Traktoristas aš esu“ vairavymo mokyklos</h1>
    <h1>teorinių pamokų informacijos puslapį</h1>
    <p>Pateikti visi galimi teorinių pamokų mokytojai</p>
  </div>
  <center><img class="split_picture_thingy" src="../Logo.png"><div><h3>Teorinių pamokų mokytojai:   </h3></div></center>
    <div class="container">
    <div class="row">
    <?php 
        $conn = $databaseObj->connect();
        $data = $databaseObj->getTheoryInstructors($conn);
        while ($row = $data->fetch_assoc()) {
            echo "<a class='col-sm-2'>  
            <div class='w3-container w3-teal'>
                  <p>".$row['vardas']." ".$row['pavarde']."</p>
            </div>      
            <img src='../rprofile.jpg' alt='Car' style='width:100%'>
        </a>";
          }
    ?>
    </div>
  </center>
  
  <?php include("../button.html");?>
  </body>
</html>