<?php
include 'C:xampp/htdocs/ISP/database/database.class.php';
$databaseObj = new database();
$conn = $databaseObj->connect();
$databaseObj->deleteOldUsers($conn);
$inform = $databaseObj->informForDeletion($conn);
?>