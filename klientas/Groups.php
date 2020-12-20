<?php 
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();

 $userid = $_SESSION["userID"];
?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

<form action="procGroups.php" method="post"><br>
<select name='grupe'>
    <option value='001'>pasirinkti:</option>
    <?php

    $sql = "SELECT * FROM sutartis
    LEFT JOIN asmuo
    ON sutartis.fk_klientas = asmuo.asmens_kodas
    LEFT JOIN kursai
    ON sutartis.fk_kursai = kursai.id
    LEFT JOIN grupe
    ON kursai.id = grupe.fk_kursai_id
    WHERE asmuo.asmens_kodas = '$userid' AND grupe.vietu_kiekis >= 1";
    $result = $conn -> query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<option value='". $row["id"] ."'>" . $row["pavadinimas"] . " " . $row["numatyta_data"] ."</option>";
     }
     ?>
     </select> 
     <br><br><input class="btn btn-outline-dark" type="submit" value="Pasirinkti" name="submit"></input>
    </form>

</div>
<?php include("../button.html");?>

  </body>
</html>