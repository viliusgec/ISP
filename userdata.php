<?php
session_start();
include("main_bar.html");
?>
  </nav>

  <style>
  #aaa{
    color: red;
    text-align: left;
  }
  </style>
 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h2>Įveskite duomenis, kuriuos norite redaguoti:</h2>
    <form action="procuserdata.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="vardas" placeholder="Įveskite naują vardą:">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="pavarde" placeholder="Įveskite naują pavardę:">
      </div>

      <div class="form-group">
        <input type="email" class="form-control" name="elpastas" placeholder="Įveskite naują el. paštą:">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="slaptazodis1" name="slaptazodis1" placeholder="Įveskite naują slaptažodį:">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="slaptazodis2" name="slaptazodis2" placeholder="Pakartokite naują slaptažodį:">
      </div>
    <p id="password"></p>
      <div class="form-group">
        <input type="number" class="form-control" name="asmens_kodas" placeholder="Įveskite naują asmens kodą:">
      </div>
      <input type="submit" class="btn btn-outline-danger" id="submit" value="Patvirtinti"></input>
    </form>
  </div>

  <script src="JavaScripts/PasswordChecker.js"></script>
 
 <?php 
include("button.html");  
?>
</body>
</html>