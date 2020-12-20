<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();
$userid =$_SESSION["userID"];
?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

  <h3>Jūsų teorinės pamokos:</h3>

<?php 
   $sql = "SELECT * FROM 
   ( `pamoka` INNER JOIN `grupes_nariai` ON `pamoka`.fk_grupes_id=`grupes_nariai`.fk_grupes_id) 
   WHERE fk_klientas = '$userid'";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
       echo "Diena: " . $row["diena"] . " Laikas: " . $row["laikas"] . "";
    }
?>

<h3>Jūsų praktinės pamokos:</h3>

<?php 
   $sql = "SELECT `praktiniu_tvarkarastis`.data, `praktiniu_tvarkarastis`.laikas, `asmuo`.vardas, `asmuo`.pavarde 
   FROM ((`praktiniu_tvarkarastis` INNER JOIN `darbuotojas`
     ON `praktiniu_tvarkarastis`.fk_darbuotojas_tabelio_nr=`darbuotojas`.tabelio_nr)
    INNER JOIN `asmuo` ON `darbuotojas`.fk_asmuo = `asmuo`.asmens_kodas)  WHERE `fk_asmuo_id`='$userid' AND `ar_egzaminas`=0";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
       echo "Data: " . $row["data"] . " Laikas: " . $row["laikas"] . " Instruktorius: "
        . $row["vardas"] . " " . $row["pavarde"] . "<br>";
    }
?>

<h3>Jūsų egzaminai:</h3>

<?php 
   $sql = "SELECT `praktiniu_tvarkarastis`.data, `praktiniu_tvarkarastis`.laikas, `asmuo`.vardas, `asmuo`.pavarde 
   FROM ((`praktiniu_tvarkarastis` INNER JOIN `darbuotojas`
     ON `praktiniu_tvarkarastis`.fk_darbuotojas_tabelio_nr=`darbuotojas`.tabelio_nr)
    INNER JOIN `asmuo` ON `darbuotojas`.fk_asmuo = `asmuo`.asmens_kodas)  WHERE `fk_asmuo_id`='$userid' AND `ar_egzaminas`=1";
   $result = $conn -> query($sql);
   while($row = mysqli_fetch_assoc($result)){
       echo "Praktinio egzamino data: " . $row["data"] . " Laikas: " . $row["laikas"] . " Instruktorius: "
        . $row["vardas"] . " " . $row["pavarde"] . "<br>";
    }

    $sql = "SELECT * FROM `egzamino_nariai` INNER JOIN `egzaminas`
    ON `egzamino_nariai`.fk_egzamino_id = `egzaminas`.id
     WHERE fk_klientas='$userid'";
    $result = $conn -> query($sql); 
    while($row = mysqli_fetch_assoc($result)){
        echo "Teorijos egzamino data: " . $row["laikas"] . "<br>";
     }
?>



</div>
<?php include("../button.html");?>

  </body>
</html>