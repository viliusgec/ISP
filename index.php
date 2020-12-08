<?php 
session_start();
// session_unset();
// $_SESSION["vardas"] = "yra";
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VM</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img
        src="kissclipart-pixel-art-cars-png-clipart-pixel-car-racer-sports-c97f6477a5e2d075.jpg"
        class="logo"
      />
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Pagrindinis <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <div class="dropdown show">
              <a
                class="btn btn-secondary dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Mokymai
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-header">Mūsų siūlomos paslaugos</a>
                <a class="dropdown-item" href="clientTheoryClass.html"
                  >Teorines pamokos</a
                >
                <a class="dropdown-item" href="clientDrivingClass.html"
                  >Vairavimo pamokos</a
                >
                <a class="dropdown-item" href="clientTheoryExam.html"
                  >Teorijos egzaminas</a
                >
                <a class="dropdown-item" href="clientDrivingExam.html"
                  >Praktinis egzaminas</a
                >
              </div>
            </div>
          </li>
    
          <li class="nav-item">
            <a class="nav-link" href="#">Kainos</a>
          </li>
          <li class="nav-item">
            <div class="dropdown show">
              <a
                class="btn btn-secondary dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Paslaugos
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-header">Papildomos paslaugos</a>
                <a class="dropdown-item" href="#">Autoserviso paslaugos</a>
                <a class="dropdown-item" href="#">Ket knygelės pardavimas</a>
                <a class="dropdown-item" href="#"
                  >Įgudžių tobūlinimas su simuliatoriumi</a
                >
                <a class="dropdown-item" href="#">Mokomosios aikštelės nuoma</a>
                <a class="dropdown-item" href="#"
                  >Vairavimo testavimasŽinstruktoriaus dalyvavimas vį "REGITRA"
                  egzamine</a
                >
                <a class="dropdown-item" href="#"
                  >Transporto nuoma egzaminams vį "REGITRA"</a
                >
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">Apie mus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.html">Administratorius</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="worker.html">Darbuotojo profilis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="client.html">Kliento profilis</a>
          </li>
          <li class="nav-item">
            <div class="text-center">
            <!-- sutvarkyti kad nebeliktu login prisijungus ir rodytu varda -->
            <?php 
            if(empty($_SESSION["vardas"]))
            {
              echo "<a
              class='btn btn-default btn-rounded mb-4'
              data-toggle='modal'
              data-target='#modalLoginForm'
              >Prisijungti</a
            >";
            }
            else 
            {
              echo "<a class='btn btn-default btn-rounded mb-4'>".$_SESSION['vardas']."</a>";
              echo "<a href='php_control/logOut.php' class='btn btn-default btn-rounded mb-4'>Atsijungti</a>";
            }
            ?>
              <!-- <a
                href=""
                class="btn btn-default btn-rounded mb-4"
                data-toggle="modal"
                data-target="#modalLoginForm"
                >Prisijungti</a
              > -->
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div w3-include-html="navbar.html"></div>
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
      <!-- <form method="post" action="php_control/login.php"> -->
        <button type="submit" class="btn btn-default">Prisijungti</button>
      </form>
        <!-- <button href="php_control/login.php" class="btn btn-default">Prisijungti</button> -->
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
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Jūsų e.paštas</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Jūsų slaptažodis</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Pakartokite slaptažodį</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Registruotis</button>
      </div>
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