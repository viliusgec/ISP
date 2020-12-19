<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.html");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();

?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

<h3>Prašome pasirinkti egzamino laiką:</h3>
<form action="procusertheoryexam.php" method="post">
<select name='teorija'>
    <option value='001'>pasirinkti:</option>
<?php 
   $sql = "SELECT * FROM `egzaminas` WHERE `vietu_kiekis` >= 1";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
       echo "<option value='". $row["id"] ."'>" . $row["laikas"] . " Vietų kiekis:" . $row["vietu_kiekis"] ."</option>";
    }
?>
</select>
<br><br><input class="btn btn-outline-dark" type="submit" value="Patvirtinti" name="submit"></input>
</form>

</div>
<?php include("../button.html");?>

  </body>
</html>