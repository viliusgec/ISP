<?php 
session_start();
include("main_bar.html");
if(!empty($_SESSION['loginError']))
{
      echo "<div class='jumbotron text-center'>
      <p style='color:red'>".$_SESSION['loginError']."</p> </div>";
}
 ?>
      

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