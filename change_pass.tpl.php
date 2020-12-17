<style>
    #aaa{
      color: red;
      text-align: left;
    }
    </style>
<div class="jumbotron text-center animate__animated animate__fadeIn">
    <h2>Slaptažodžio pakeitimas:</h2>
    <form action="change_pass.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="slaptazodis" placeholder="Įveskite seną slaptažodį:">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" id="slaptazodis1" name="slaptazodis1" placeholder="Įveskite naują slaptažodį:">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="slaptazodis2" name="slaptazodis2" placeholder="Pakartokite naują slaptažodį:">
      </div>
    <p id="password"></p>
      <input type="submit" class="btn btn-outline-danger" name="submit" id="submit" value="Patvirtinti"></input>
    </form>
  </div>