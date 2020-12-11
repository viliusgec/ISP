<?php
session_start();
include("main_bar.html");
?>
  </nav>
 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h2>Įveskite duomenis, kuriuos norite redaguoti:</h2>
    <form action="procuserdata.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="vardas" placeholder="Įveskite naują vardą:">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="pavarde" placeholder="Įveskite naują pavardę:">
      </div>

      <div class="form-group">
        <input type="email" class="form-control" id="vardas" placeholder="Įveskite naują el. paštą:">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="slaptazodis" placeholder="Įveskite naują slaptažodį:">
      </div>
    Šitas neveikia:
      <div class="form-group">
        <input type="text" class="form-control" id="slaptazodis" placeholder="Pakartokite naują slaptažodį:">
      </div>

      <div class="form-group">
        <input type="number" class="form-control" id="asmens_kodas" placeholder="Įveskite naują asmens kodą:">
      </div>
      <input type="submit" class="btn btn-outline-danger" value="Patvirtinti"></input>
    </form>
  </div>
 
 <?php 
include("button.html");  
?>
</body>
</html>