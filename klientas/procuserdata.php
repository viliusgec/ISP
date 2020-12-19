<?php 
session_start();
$_SESSION['message_photo'] = "";
include("main_bar_klientas.html");
include("../database/database.class.php");



$databaseObj = new database(); 
    if ($_POST != NULL)
    {
        print_r($_POST);
        // $_SESSION['vardas'] = $_POST['vardas'];
        // $_SESSION['pavarde'] = $_POST['pavarde'];
        // $_SESSION['epastas'] = $_POST['elpastas'];
        // $_SESSION['slaptazodis'] = $_POST['slaptazodis1'];
        // $_SESSION['userID'] = $_POST['asmens_kodas'];
    }
?> 