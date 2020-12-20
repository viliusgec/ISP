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
.buttonAdmit {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
}
.buttonDecline {
  width: 10%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
}

.buttonAdmit:hover {

  background-color: #45a049;
}

.buttonDecline:hover {

background-color: red;
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
    <h1>Nuotrauku patvirtinimas </h1>
    <br>

<?php 
  if(isset($_GET['Message'])){
    echo $_GET['Message'];
}
?>
   

  </div>
 <div class="formArea">
  


 
    <form action="approvePhoto.php" method="post" enctype="multipart/form-data">
    
    <?php

       $unconfirmedPhotos =  $databaseObj->getUnconfirmedPhotos($conn);
    
        while ($row = $unconfirmedPhotos->fetch_assoc()) {
                     
                      $asmens_kodas = $row['asmens_kodas'];
                      $name = $row['vardas']; 
                      $lastName = $row['pavarde'];
                      $location = $row['location'];
                      echo '<ul>';
                      echo '<li>'.$name.' '.$lastName.'</li>';
                      #echo '<li>'.$asmens_kodas.'</li>';
                      echo '<li><img src="'.$location.'" width="200" height="200"></li>';
                      echo '</ul>';
                      echo '<div>';
                      
                     echo '<button name="approve" class="btn btn-outline-dark buttonAdmit" type="submit" value="'.$asmens_kodas.'">Patvirtinti</button>';
                     echo '<button name="decline" class="btn btn-outline-dark buttonDecline" type="submit" value="'.$asmens_kodas.'">Atsaukti</button>';
                      
                      echo '</div>';
                      echo "<br>";

        }
   
  
      
     
    ?> 
    

</div>

  

  </body>
</html>