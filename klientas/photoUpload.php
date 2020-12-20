<?php
include("main_bar_klientas.php");
?>
  </nav>
 
  <div class="jumbotron text-center animate__animated animate__fadeIn">
    <h1>Įkelkite savo nuotrauką</h1>
    
  <?php echo "" . $_SESSION['message_photo']; ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Pasirinkite nuotrauką įkėlimui:
        <input type="file" name="fileToUpload" id="fileToUpload" value="Ieškoti..."></br>
        <input class="btn btn-outline-dark" type="submit" value="Įkelti" name="submit">
      </form>
  
   

  </div>
 
 <?php 
include("../button.html");  
?>
</body>
</html>