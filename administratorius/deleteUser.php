<?php
     include("main_bar_admin.php");
     include("../database/database.class.php");
    //padaryt kai istrina i emaila issiustu
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
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
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
  width: 20%;
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
  padding: 10px 20px;
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
    <h1>Paskyros trynimas </h1>
    <br>

<?php 
  if(isset($_GET['Message'])){
    echo $_GET['Message'];
}
?>
   

  </div>
 <div class="formArea">
  

    <form action="deleteUser.php" method="post" enctype="multipart/form-data">
    <h2>Ieškokite žmogaus pagal asmens kodą</h2>
        <input type="number" id="name" name="identityNr" class="form-control width">
        <button name="search" class="btn btn-outline-dark buttonAdmit" type="submit">Patvirtinti</button>
    </form>
    <?php
    
        if((isset($_POST['search'])))
        {
            
        $conn = $databaseObj->connect();
        $identityNr = $_POST['identityNr']; 
        if ($_SESSION['userID'] == $identityNr) {
            echo 'Negalite istrinti saves';
            exit();
        }
        if ($identityNr== ''){
            echo 'Prasome ivesti asmens koda';
            exit();
        }
        $userDelete =  $databaseObj->getIdentityIdUser($conn, $identityNr);
        $int=0;
        while ($row = $userDelete->fetch_assoc()) {
            $int = 1;
            unset($name);
            $name = $row['vardas']; 
            $lastName = $row['pavarde'];
            $identity = $row['asmens_kodas'];
           echo '<form action="deleteUser.php" method="post" enctype="multipart/form-data">';
           echo '<table id="customers">';
           echo '<tr>';
           echo '<th>Vardas</th>';
           echo '<th>Asmens kodas</th>';
           echo '</tr>';
           echo '<tr>';
           echo '<td>'.$name .' '. $lastName .'</td>';
           echo '<td>'.$identity.'</td>';
           echo '</tr>';
           echo '</table>';
        echo '<button name="delete" class="btn btn-outline-dark buttonDecline" type="submit" value='.$identity.'>Istrinti</button>';
        echo '</form>';
            exit();
        }
       if (!$row = $userDelete->fetch_assoc() && $int !== 0){
           echo 'Prasome ivesti esanti asmens koda';
           exit();
       }
          }

          if((isset($_POST['delete'])))
          {
            $conn = $databaseObj->connect();
            $identityNr = $_POST['delete']; 

            $toWho = $databaseObj->getPhotoRecipient($conn, $identityNr);
            $email;
            $name;
            $lastName;
            $role;
            while ($row = $toWho->fetch_assoc()) {
                            
              $email = $row['el_pastas'];
              $name = $row['vardas']; 
              $lastName = $row['pavarde'];
              $role = $row['role'];

            
            }
            $to      = $email; 
            $subject = 'Paskyra ištrinta'; 
            $message = '
            
            '.$name.' '.$lastName.',
            Jūsų paskyra susieta su '.$email.' buvo ištrinta
            
            
            Pradinis puslapis:
            http://localhost/ISP'; 

            $headers = 'From:ispprojektas@gmail.com' . "\r\n"; 
            mail($to, $subject, $message, $headers);
            
            //padaryt, kad pafetchintu zmogu ir tada patikrintu ar role yra lygu darbuotojas
            //jei jo tada padaryt, kad update left join on  darbuotojas.tablelio_nr 
            //grupe.darbuotojo_id on kai tie lygus id grupe.busena = neuzpildyta
           
            if ($role == 'darbuotojas') {
              $workeris = $databaseObj->getWorker($conn, $identityNr);
              $foreignKey;
              while ($row = $workeris->fetch_assoc()) {
                            
                $foreignKey = $row['tabelio_nr'];
              
              }
        
              $databaseObj->removeWorker($conn, $identityNr, $foreignKey);
              echo 'Darbuotojas sekmingai istrintas!';
              exit();
            }
            if ($role == 'klientas') {
              
              $databaseObj->removeUser($conn, $identityNr);
              echo 'Naudotojas sekmingai istrintas!';
              exit();
            }
            if( $role == 'administratorius') {
              echo 'Administratoriaus istrinti negalima';
              exit();
            }

            
           
          }
    ?> 
</div>
  </body>
</html>