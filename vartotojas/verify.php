<?php
    include '../database/database.class.php';
    $databaseObj = new database();        
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email']; 
        $hash = $_GET['hash']; 
        $conn = $databaseObj->connect();
        $data = $databaseObj->checkToken($conn, $email, $hash);
        $data = $data->fetch_assoc();
        // echo $data;
        if(!empty($data))
        {
            $databaseObj->verify($conn, $email);
            header('Location: ../index.php');
        }
        else
            echo "Naudokite jum atsiusta nuoroda";

                    
    }else{
        echo "Naudokite jum atsiusta nuoroda";
    }

?>