<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="stylesheet.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VM</title>
    <style>

input[type=text], select {
  width: 20%;
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
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="kissclipart-pixel-art-cars-png-clipart-pixel-car-racer-sports-c97f6477a5e2d075.jpg" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Pagrindinis <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mokymai
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-header">Mūsų siūlomos paslaugos</a> 
                  <a class="dropdown-item" href="#">Vairavimo kursai</a>
                  <a class="dropdown-item" href="#">Vairavimo įgūdžių tobulinimas</a>
                  <a class="dropdown-item" href="#">Papildomas vairuotojų mokymas</a>
                  <a class="dropdown-item" href="#">Profesinis mokymas EU 95 Kodas</a>
                  <a class="dropdown-item" href="#">Transporto vadybininkų mokymas</a>
                  <a class="dropdown-item" href="#">ADR kursai</a>
                  <a class="dropdown-item" href="#">Traktorininkų mokymai</a>
                  <a class="dropdown-item" href="#">Krautuvų mokymai</a>
                  <a class="dropdown-item" href="#">Krovimo kranų mokymas</a>
                  <a class="dropdown-item" href="#">Kėlimo platformų mokymai</a>
                  <a class="dropdown-item" href="#">Mokomosios transporto priemonės</a>
                </div>
              </div>
        </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Kainos</a>
          </li>
          <li class="nav-item">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Paslaugos
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-header">Papildomos paslaugos</a> 
                  <a class="dropdown-item" href="#">Autoserviso paslaugos</a>
                  <a class="dropdown-item" href="#">Ket knygelės pardavimas</a>
                  <a class="dropdown-item" href="#">Įgudžių tobūlinimas su simuliatoriumi</a>
                  <a class="dropdown-item" href="#">Mokomosios aikštelės nuoma</a>
                  <a class="dropdown-item" href="#">Vairavimo testavimasŽinstruktoriaus dalyvavimas vį "REGITRA" egzamine</a>
                  <a class="dropdown-item" href="#">Transporto nuoma egzaminams vį "REGITRA"</a>
                </div>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">Apie mus</a>
          </li>
          <li class="nav-item">
            <div class="text-center">
            <a class="nav-link" href="admin.html">Administratorius</a>
          </div>
          </li>
       
        </li>
      </ul>
    </div>
  </nav>
 
  <div class="jumbotron text-center">
    <h1>Tvarkarastis</h1>
    <br>

    <label for="cars">Pasirinkite grupę:</label>

    <select name="cars" id="cars">
      <option value="volvo">A</option>
      <option value="saab">B</option>
      <option value="mercedes">C</option>
      <option value="audi">D</option>
    </select>

  <br><br>    
  
  <label for="cars">Pasirinkite savaitės dieną:</label>

<select name="cars" id="cars">
  <option value="volvo">Pirmadienis</option>
  <option value="saab">Antradienis</option>
  <option value="mercedes">Trečiadienis</option>
  <option value="audi">Ketvirtadienis</option>
  <option value="civic">Penktadienis</option>
</select>

<br><br>  

<label for="cars">Pasirinkite laiką:</label>

<select name="cars" id="cars">
  <option value="volvo">9:00</option>
  <option value="saab">10:00</option>
  <option value="mercedes">11:00</option>
  <option value="audi">12:00</option>
  <option value="civic">14:00</option>
</select>

<br><br>  

<label for="cars">Pasirinkite paskaitą:</label>

<select name="cars" id="cars">
  <option value="volvo">Nėra</option>
  <option value="saab">Teorinė</option>
  <option value="mercedes">Praktinė</option>
</select>
<br><br>
<input type="button" name="yra" value="Patvirtinti"></input>

</div>
</div>



  
  <button type="button" class="btn btn-danger live_chat_button">Live chat</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>