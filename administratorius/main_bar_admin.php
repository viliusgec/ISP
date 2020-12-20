<?php
session_start();

if (empty($_SESSION["role"]) || $_SESSION["role"] != "administratorius") {
  header('Location: ../index.php');
}
?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img
          src="../musulogo.jpg"
          class="logo">
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
              <a class="nav-link" href="../index.php"
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
                  <a class="dropdown-item" href="../clientTheoryClass.html"
                    >Teorines pamokos</a
                  >
                  <a class="dropdown-item" href="../clientDrivingClass.html"
                    >Vairavimo pamokos</a
                  >
                  <a class="dropdown-item" href="../clientTheoryExam.html"
                    >Teorijos egzaminas</a
                  >
                  <a class="dropdown-item" href="../clientDrivingExam.html"
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
              <a class="nav-link" href="../aboutus.php">Apie mus</a>
            </li>
            <?php
            if(!empty($_SESSION["role"])){
              if($_SESSION["role"] == "administratorius"){
                echo"<li class='nav-item'>";
                echo "<a class='nav-link' href='admin.php'>Administratorius</a>";
                echo "</li>";
                 } 
            }
            if(!empty($_SESSION["role"])){
              if($_SESSION["role"] == "darbuotojas"){
                echo"<li class='nav-item'>";
                echo "<a class='nav-link' href='../darbuotojas/worker.php'>Darbuotojo profilis</a>";
                echo "</li>";
                 } 
            }
            ?>
            <li class="nav-item">
              <div class="text-center">
              <!-- sutvarkyti kad nebeliktu login prisijungus ir rodytu varda -->
              <?php 
              if(empty($_SESSION["vardas"]))
              {
                echo "<a
                class='btn btn-default btn-rounded mb-4'
                data-toggle='modal'
                data-target='#modalLoginForm'>Prisijungti</a>";
              }
              else 
              {
                echo "<a href='../vartotojas/logOut.php' class='btn btn-default btn-rounded mb-4'>Atsijungti</a>";
              }
              ?>
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
        
  
        <form method="post" action="vartotojas/login.php">
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
          <a href="../forgotPassword.html">Pamiršau slaptažodį</a>
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
        <form method="post" action="vartotojas/register.php">
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
          <a href="../forgotPassword.html">Pamiršau slaptažodį</a>
        </div>
      </div>
    </div>
  </div>