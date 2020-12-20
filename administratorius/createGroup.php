<?php
include '../database/database.class.php';
$databaseObj = new database();
if((isset($_POST['group'])) && !empty($_POST['group']))
{
  
    $name = $_POST['name'];
    $instructor = $_POST['instructor'];
    $course = $_POST['course'];
    $startDate = $_POST['date'];
    $groupSize = $_POST['group'];
    if ($groupSize <= 10){
      header('Location: newGroup.php?Message= Prasome ivesti grupes dydi ivesti didesni nei 10');
      exit();
    }
    $dateStartConvert = strtotime($startDate);
    $startDateCompare = date('Y-m-d',$dateStartConvert);
   
    if ($startDateCompare < date("Y-m-d")) {
      header('Location: newGroup.php?Message= Prasome ivesti ateities data');
      exit();
    }
    $add_date = date("Y-m-d"); 
    $endDate = new DateTime($startDate);
     $endDate ->modify("+60 days");
    $endDate = $endDate ->format("Y-m-d"); 
   # $hash = md5( rand(0,1000) );
    $conn = $databaseObj->connect();
    $data = $databaseObj->makeGroup($conn, $name, $course, $instructor, $startDate, $groupSize, $endDate );

    //Get newest group 
    $latestGroup =  $databaseObj->getLatestGroup($conn);
    while ($row = $latestGroup->fetch_assoc()) {
     
      echo $row['id'];
      echo $row['tipas'];
      for ($i = 0; $i < 2; $i++){
        if ($i == 0){
          $day = 'Pirmadienis';
        } else {
          $day = 'Treciadienis';
        }
        if ($row['tipas'] == 'rytinis'){
          $time = '09:00';
        } else {
          $time = '18:00';
        }
        $howLong = '2 Valandas';
        $data = $databaseObj->makeLesson($conn, $time, $howLong, $row['id'], $day);
      }
 
  }

    
    header('Location: newGroup.php?Message=Nauja grupė sekmingai sukurta');
}
else {


  header('Location: newGroup.php?Message=Prasome pasirinkti pavadinima, data arba grupes dydi');
}
?>