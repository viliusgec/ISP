<?php 
session_start();
include("main_bar.html");
 ?>
 
  <div class="jumbotron text-center">
    <h1>Zinutes siuntimas</h1>
    <br>


   

  </div>
  
  <form>
    <div class="form-row"></div>
    <div class="form-group col-md-2">
      <label for="exampleInputEmail1">Gavėjo el. paštas</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com">
    </div>
    <div class="form-group col-md-3">
      <label for="exampleInputPassword1">Žinutė</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group col-md-3">
    <button type="submit" class="btn btn-primary">Siųsti</button>
  </div>
  </div>
  </form>



  
  <button type="button" class="btn btn-danger live_chat_button">Live chat</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>