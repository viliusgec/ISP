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
    <style>

input[type=text] {
  width: 5%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
select {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  </head>
  <body>
   
 
  <div class="jumbotron text-center">
    <h1>Naujos grupes sukurimas</h1>
    <br>


   

  </div>
 <div class="formArea">
  
    

 <?php echo "" . $_SESSION['message_photo']; ?>
    <form action="createGroup.php" method="post" enctype="multipart/form-data">
        <label for="instructor">Vedantis intruktorius</label>
        <select id="instructor" name="instructor">
        <option value="tomas">Tomas</option>
        <option value="ignas">Ignas</option>
        <option value="jonas">Jonas</option>
         </select>
         <br>
         <label for="group">Kurso tipas</label>
         <select id="group" name="group">
        <option value="teorijos">Teorijos</option>
        <option value="praktikos">Praktikos</option>
        </select>
        <br>
        <label for="defaultForm-word">Grupės dydis</label>
        <input type="text" id="defaultForm-word" name="vardas" class="form-control width">
    
        
        <input class="btn btn-outline-dark" type="submit" value="Sukurti grupę" name="submit">
      </form>

</div>

  
  <button type="button" class="btn btn-danger live_chat_button">Live chat</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>