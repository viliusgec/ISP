<?php
include 'C:xampp/htdocs/ISP/database/database.class.php';
$databaseObj = new database();
$conn = $databaseObj->connect();
$todelete = $databaseObj->deleteOldUsers($conn);
while($row = $todelete->fetch_assoc()){
    $to      = $row["el_pastas"];
    $subject = 'Paskyros ištrynimas';
    $message = '
    
    Jūsų paskyra ištrinta, nes buvote neaktyvus metus.
    Dėl papildomos informacijos kreipkitės dievuliui.
    Viso giero.
    
    ';

    $headers = 'From:ispprojektas@gmail.com' . "\r\n";
    mail($to, $subject, $message, $headers);
    header('Location: ../index.php');
}
$inform = $databaseObj->informForDeletion($conn);
while($row = $inform->fetch_assoc()){
    $to      = $row["el_pastas"];
    $subject = 'Paskyros ištrynimas';
    $message = '
    
    Pranešame, kad jūsų paskyra bus ištrinta dėl ilgo neaktyvumo.
    Norint išsaugoti paskyrą prašome prisijungti prie mūsų sistemos.
    
    ';

    $headers = 'From:ispprojektas@gmail.com' . "\r\n";
    mail($to, $subject, $message, $headers);
    header('Location: ../index.php');
}
$members = $databaseObj->getGroupMemberCount($conn);
while($row = $members->fetch_assoc()){
    $group = $databaseObj->getGroupByID($conn, $row["fk_grupes_id"]);
    $date = date("Y-m-d");
    if($date == $group["numatyta_data"]){
        if($row["klientu_skaicius"]+1 >= $group["vietu_kiekis"]*0.7 && $group["busena"] == "registracija"){
            $databaseObj->setGroupState($conn, $row["fk_grupes_id"], "susidare");
            //siunciam emaila visiems useriams, kad susidare
            $mails = $databaseObj->getClientMailByGroupId($conn, $row["fk_grupes_id"]);
            while($row2 = $mails->fetch_assoc()){
                $to      = $row2["el_pastas"];
                $subject = 'Paskyros ištrynimas';
                $message = '
    
                Jūsų grupė '. $group["pavadinimas"] .' pradeda savo veiklą.
                
                ';

                $headers = 'From:ispprojektas@gmail.com' . "\r\n";
                mail($to, $subject, $message, $headers);
                header('Location: ../index.php');
            }
        }
        elseif ($row["klientu_skaicius"] < $group["vietu_kiekis"]*0.7 && $group["busena"] == "registracija"){
            $databaseObj->setGroupState($conn, $row["fk_grupes_id"], "neuzpildyta");
            //siunciam emaila visiems useriams, kad nesusidare
                
            $mails = $databaseObj->getClientMailByGroupId($conn, $row["fk_grupes_id"]);
            while($row2 = $mails->fetch_assoc()){
                $to      = $row2["el_pastas"];
                $subject = 'Paskyros ištrynimas';
                $message = '
    
                Jūsų grupė '. $group["pavadinimas"] .' atšaukta, nes nesusirinko reikiamas klientų skaičius.
                Prašome registruotis į naują grupę.
                
                ';

                $headers = 'From:ispprojektas@gmail.com' . "\r\n";
                mail($to, $subject, $message, $headers);
                header('Location: ../index.php');
            }
        }
    }
}
?>