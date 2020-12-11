<?php 
session_start();
include("main_bar.html");
 ?>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Prisijungti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form method="post" action="php_control/login.php">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="epastas" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Jūsų e.paštas</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="slaptazodis" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Jūsų slaptažodis</label>
        </div>
      </div>
      <!-- Prisijungimo mygtukas -->
      
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-default">Prisijungti</button>
      </form>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a
                href=""
                class="btn btn-default btn-rounded mb-4"
                data-toggle="modal"
                data-target="#modalRegisterForm"
                >Registruotis</a
              >
      </div>
      <div class="modal-footer justify-content-center">
        <a href="forgotPassword.html">Pamiršau slaptažodį</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Registruotis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Registracija -->
      <form method="post" action="php_control/register.php">
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="word" id="defaultForm-word" name="vardas" class="form-control">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Vardas</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="word" id="defaultForm-word" name="pavarde" class="form-control">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Pavardė</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="epastas" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Jūsų e.paštas</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="number" id="defaultForm-number" name="asmenskodas" class="form-control">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Asmens kodas</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="slaptazodis1" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Jūsų slaptažodis</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="slaptazodis2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Pakartokite slaptažodį(db sitas nieko nedaro)</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-default">Registruotis</button>
      </div>
      </form>

      <div class="modal-footer d-flex justify-content-center">
        <a
                href=""
                class="btn btn-default btn-rounded mb-4"
                data-toggle="modal"
                data-target="#modalLoginForm"
                >Prisijungti</a
              >
      </div>
      <div class="modal-footer justify-content-center">
        <a href="forgotPassword.html">Pamiršau slaptažodį</a>
      </div>
    </div>
  </div>
</div>
  <div class="jumbotron text-center">
    <h1>Sveiki atvykę į „Traktoristas aš esu“ vairavymo mokyklos puslapį</h1>
    <p>er took a gallassages, and more recently with desktop ps of Lorem Ipsum.</p>
  </div>
  <center><img class="split_picture_thingy" src="Logo.png"><div><h3>Vairavimo kursai</h3></div></center>
    <div class="container">
    <div class="row">
        <a href="#" class="col-sm-2">
          
            <div class="w3-container w3-teal">
                  <p>AM kategorija</p>
            </div>
        
            <img src="unnamed.png" alt="Car" style="width:100%">
        
            <div class="w3-container">
            <p>Mopedai ir lengvieji keturračiai</p>
            </div>
        </a>
        <a href="#" class="col-sm-2">
          
                <div class="w3-container w3-teal">
                      <p>A1 kategorija</p>
                </div>
            
                <img src="unnamed.png" alt="Car" style="width:100%">
            
                <div class="w3-container">
                <p>Motociklai ir triračiai</p>
                </div>
            
            
            </a>
            <a href="#" class="col-sm-2">
          
      <div class="w3-container w3-teal">
            <p>A2 kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Motociklai ir triračiai</p>
      </div>
  
  
    </a>
    <a href="#" class="col-sm-2">
        <div class="w3-container w3-teal">
            <p>A kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Motociklai ir triračiai</p>
      </div>
  
    </a>
    <a href="#" class="col-sm-2">
        <div class="w3-container w3-teal">
            <p>B kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Lengvieji automobiliai ir keturračiai</p>
      </div>
  
      
      </div>
    </a>
  </div>
  <div class="container">
    <div class="row">
        <a href="#" class="col-sm-2">
          
            <div class="w3-container w3-teal">
                  <p>AM kategorija</p>
            </div>
        
            <img src="unnamed.png" alt="Car" style="width:100%">
        
            <div class="w3-container">
            <p>Mopedai ir lengvieji keturračiai</p>
            </div>
        

        
        </a>
        <a href="#" class="col-sm-2">
          
                <div class="w3-container w3-teal">
                      <p>A1 kategorija</p>
                </div>
            
                <img src="unnamed.png" alt="Car" style="width:100%">
            
                <div class="w3-container">
                <p>Motociklai ir triračiai</p>
                </div>
            
            
            </a>
            <a href="#" class="col-sm-2">
          
      <div class="w3-container w3-teal">
            <p>A2 kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Motociklai ir triračiai</p>
      </div>
  
  
    </a>
    <a href="#" class="col-sm-2">
        <div class="w3-container w3-teal">
            <p>A kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Motociklai ir triračiai</p>
      </div>
  
    </a>
    <a href="#" class="col-sm-2">
        <div class="w3-container w3-teal">
            <p>B kategorija</p>
      </div>
  
      <img src="unnamed.png" alt="Car" style="width:100%">
  
      <div class="w3-container">
      <p>Lengvieji automobiliai ir keturračiai</p>
      </div>
  
      
      </div>
    </a>
  </div>
  </center>
  
  <button type="button" class="btn btn-danger live_chat_button">Live chat</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>