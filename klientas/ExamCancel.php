<?php 
$_SESSION['message_photo'] = "";
include("main_bar_klientas.php");
 include("../database/database.class.php");

 $databaseObj = new database(); 
 $conn = $databaseObj->connect();

?> 
  <div class="jumbotron text-center animate__animated animate__fadeIn">

  <form action="ExamCancel_Theory.php" method="post">
  <button class='btn btn-outline-info'>Atšaukti teorinį egzaminą</button><br><br>
</form>
<form action="ExamCancel_Practise.php" method="post">
  <button class='btn btn-outline-info'>Atšaukti praktinį egzaminą</button>
</form>
</div>
<?php include("../button.html");?>

  </body>
</html>