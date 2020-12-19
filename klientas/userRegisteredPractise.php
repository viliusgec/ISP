<?php 
session_start();
$_SESSION['message_photo'] = "";
 include("../main_bar.html");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();

?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

<h3>Prašome pasirinkti instruktorių:</h3>
<form action="userPractise.php" method="post">
<select name='tabelis'>
    <option value='001'>pasirinkti:</option>
<?php 
   $sql = "SELECT tabelio_nr, vardas, pavarde FROM `darbuotojas` INNER JOIN `asmuo` 
   ON `darbuotojas`.fk_asmuo = `asmuo`.asmens_kodas WHERE `pareigos`='praktikos'";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
       echo "<option value='". $row["tabelio_nr"] ."'>" . $row["vardas"] . " " . $row["pavarde"] ."</option>";
    }
?>
</select>
<br><br><input class="btn btn-outline-dark" type="submit" value="Pasirinkti" name="submit"></input>
</form>

</div>
<?php include("../button.html");?>

  </body>
</html>