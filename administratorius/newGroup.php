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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  
    <style>

input[type=text] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number] {
  width: 10%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
select {
    width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
data {
    width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {

  background-color: #45a049;
}

.formArea {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    <!-- Bootstrap -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>
  </head>
  <body>
   
 
  <div class="jumbotron text-center">
    <h1>Naujos grupes sukurimas</h1>
    <br>

<?php 
  if(isset($_GET['Message'])){
    echo $_GET['Message'];
}
?>
   

  </div>
 <div class="formArea">
  


 
    <form action="createGroup.php" method="post" enctype="multipart/form-data">
    <label for="name">Grupės pavadinimas</label>
        <input type="text" id="name" name="name" class="form-control width">
        <br>
    <?php

       $dataInstructor =  $databaseObj->getTheoryInstructors($conn);
         echo  "<label for='instructor'>Vedantis intruktorius</label>";
        echo "<select id = 'instructor' name='instructor'>";
        while ($row = $dataInstructor->fetch_assoc()) {
                      unset($asmens_kodas,$name);
                      $asmens_kodas = $row['tabelio_nr'];
                      $name = $row['vardas']; 
                      echo '<option value="'.$asmens_kodas.'">'.$name.'</option>';
        }
        echo "</select>";
        echo "<br>";

        $dataCourse =  $databaseObj->getCourses($conn);
         echo  "<label for='course'>Kursai</label>";
        echo "<select id = 'course' name='course'>";
        while ($row = $dataCourse->fetch_assoc()) {
                      unset($id,$name,$tipas);
                      $id = $row['id'];
                      $name = $row['pavadinimas']; 
                      $type = $row['tipas'];
                      echo '<option value="'.$id.'">'.$name.' - '.$type.'</option>';
        }
        echo "</select>";
  
      
     
    ?> 
        <p>Data: <input type='text' class ='datepicker' name= 'date' id='datepicker'></p>
      
        <label for="group">Grupės dydis</label>
        <input type="number" id="group" name="group" class="form-control width">
        <br>
        
        <input class="btn btn-outline-dark" type="submit" value="Sukurti grupę" name="submit">
      </form>

</div>

  

  </body>
</html>