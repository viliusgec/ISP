<?php 
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();

?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

<h3>Prašome pasirinkti kursų tipą:</h3>
<form action="http://www.paysera.com" method="post">
<table class="table table-hover">
  <tr>
<th>pasirinkti</th>
<th>pavadinimas</th>
<th>kaina</th>
</tr>
<?php 
   $sql = "SELECT * FROM `paslaugos`";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
    echo "<tr><td><input type='checkbox' name='id[]' value='". $row["id"]."'></input></td><td>" . $row["pavadinimas"]. "</td><td>"  . $row["kaina"]. "</td></tr>";
   }
?>
</table>
<input class="btn btn-outline-dark" type="submit" value="Sumokėti   " name="submit">
</form>

</div>
<?php include("../button.html");?>

  </body>
</html>