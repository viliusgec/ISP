<?php
class database {
    // private $servername = 'localhost';
    // private $username = 'root';
    // private $password = '';
    // private $database = 'vairavimo_kursai';
    
    public function connect()
    {
        
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'vairavimo_kursai';
    
        //kazka cia keist reik nes ne taip turi but
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully"; <- neprintinam, nes kitaip išvedinėja į ekraną srr
        return $conn;
    }

    public function register($conn, $name, $surname, $id, $email, $pass, $hash, $date)
    {
        $sql = "  INSERT INTO asmuo (vardas, pavarde, el_pastas, slaptazodis, asmens_kodas, role, tokenas, paskutinis_prisijungimas)
        VALUES ('$name', '$surname', '$email', '$pass', '$id', 'klientas', '$hash', '$date')";
        $conn->query($sql);
    }

    public function checkToken($conn, $email, $hash)
    {
        $sql = "  SELECT *
            FROM asmuo
            WHERE el_pastas='$email'
            AND tokenas='$hash'";
        $data = $conn->query($sql);
        return $data;
    }

    public function verify($conn, $email)
    {
        $sql = "  UPDATE asmuo
            SET Ar_aktyvuotas='1'
            WHERE el_pastas='$email'";
        $conn->query($sql);
    }

    public function checkEmail($conn, $email)
    {
        $sql = "  SELECT *
            FROM asmuo
            WHERE el_pastas='$email'";
        $data = $conn->query($sql);
        $data = $data->fetch_assoc();
        return $data;
    }
    
    public function logIn($conn, $user, $pass) {
        $sql = "  SELECT *
                    FROM asmuo
                    WHERE el_pastas='$user'
                    AND slaptazodis='$pass'";
        $data = $conn->query($sql);
        return $data;
    }

    public function checkIfVerified($conn, $email)
    {
        $aktyvuotas = 3;
        $sql = " SELECT *
            FROM asmuo
            WHERE el_pastas='$email'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $aktyvuotas = $row['Ar_aktyvuotas'];
        }
        if ($aktyvuotas == 0)
            return 0;
        else
            return 1;
    }
    public function checkIfVerifiedPhoto($conn, $email)
    {
        $aktyvuotas = 3;
        $sql = " SELECT *
            FROM asmuo
            WHERE el_pastas='$email'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $aktyvuotas = $row['Ar_aktyvuotas_nuot'];
        }
        if ($aktyvuotas == 0)
            return 0;
        else
            return 1;
    }


    public function changePassword($conn, $pass, $email)
    {
        $sql = "  UPDATE asmuo
            SET slaptazodis='$pass'
            WHERE el_pastas='$email'";
        $conn->query($sql);
    }

    public function getTheoryInstructors($conn)
    {
        $sql = " SELECT * FROM darbuotojas
        LEFT JOIN asmuo 
        ON darbuotojas.fk_asmuo = asmuo.asmens_kodas 
        WHERE darbuotojas.pareigos = 'teorijos'
        ";
        $data = $conn->query($sql);
        return $data;
    }

    public function getCourses($conn)
    {
        $sql = " SELECT * FROM kursai
        ";
         $data = $conn->query($sql);
         return $data;
    }

    public function makeGroup($conn, $name, $course, $instructor, $startDate, $groupSize, $endDate) 
    {   
        $dateStartConvert = strtotime($startDate);
        $dateEndConvert = strtotime($endDate);

        $startDate = date('Y-m-d',$dateStartConvert);
        $endDate = date('Y-m-d',$dateEndConvert);

        //Sitas current date tai, kad galeciau automatiskai pridet nauja pamoka, bet norint pridet nauja
        //pamoka tai reikia tureti grupes id tai tiesiog padarysiu, kad kai automatiskai prideda nauja pamoka
        //tai surikiuoti grupes pagal kada sukurta ir pacia pirma naujausia iterptu i pamokas
        $currentDate = date('Y-m-d H:i:s');
 
        $sql = "  INSERT INTO grupe (pavadinimas, fk_kursai_id, fk_darbuotojo_id, numatyta_data, vietu_kiekis, numatyta_data_iki, grupe_sukurta)
        VALUES ('$name', '$course', '$instructor', '$startDate', '$groupSize', '$endDate', '$currentDate')";
      
         $conn->query($sql);
    }
    
    public function getLatestGroup($conn)
    {
        $sql = "SELECT * FROM kursai
        RIGHT JOIN grupe
        ON grupe.fk_kursai_id = kursai.id
        ORDER BY grupe.grupe_sukurta DESC
        LIMIT 1";

        $data = $conn->query($sql);
        
        return $data;
    }

    public function makeLesson($conn, $time, $howLong, $groupId, $day)
    {
        $sql = "  INSERT INTO pamoka (laikas, trukme, fk_grupes_id, diena)
        VALUES ('$time', '$howLong', '$groupId', '$day')";
      
         $conn->query($sql);
    }

    public function getUnconfirmedPhotos($conn)
    {
        $sql = "SELECT * FROM nuotraukos
        RIGHT JOIN asmuo
        ON nuotraukos.vartotojo_id = asmuo.asmens_kodas
        WHERE nuotraukos.busena = 0";
        $data = $conn->query($sql);
        
        return $data;
    }
    
    public function updatePhotoStatusApproved($conn, $identityNr)
    {
        $sql = "UPDATE nuotraukos 
        LEFT JOIN asmuo ON nuotraukos.vartotojo_id = asmuo.asmens_kodas
        SET nuotraukos.busena = 1,
        asmuo.Ar_aktyvuotas_nuot = 1
        WHERE asmuo.asmens_kodas = $identityNr";
        $conn->query($sql);
    }

    public function updatePhotoStatusDecline($conn, $identityNr)
    {
        $sql = "UPDATE nuotraukos 
        SET nuotraukos.busena = 2
        WHERE nuotraukos.vartotojo_id = $identityNr";
        $conn->query($sql);
    }

    public function updateLastLogin($conn, $date, $email)
    {
        $sql = "  UPDATE asmuo
            SET paskutinis_prisijungimas='$date'
            WHERE el_pastas='$email'";
        $conn->query($sql);
    }

    public function getIdentityIdUser($conn, $identityNr)
    {
        $sql = "SELECT * FROM asmuo
        WHERE asmuo.asmens_kodas = $identityNr";

        $data = $conn->query($sql);
       
        return $data;
    }

    public function getIdentityIdNotWorker($conn, $identityNr)
    {
        $sql = "SELECT * FROM asmuo
        WHERE asmuo.asmens_kodas = $identityNr
        AND asmuo.role != 'darbuotojas' 
        AND asmuo.role != 'administratorius'";

        $data = $conn->query($sql);
       
        return $data;
    }
    
    public function removeUser($conn, $identityNr)
    {
        $sql = "DELETE FROM asmuo
        WHERE asmuo.asmens_kodas = $identityNr";
        $conn->query($sql);
    }

    public function updateUserToWorker($conn, $identityNr, $type)
    {
        $sql = "UPDATE asmuo 
        SET asmuo.role = 'darbuotojas'
        WHERE asmuo.asmens_kodas = $identityNr";

        $conn->query($sql);

        $currentDate = date('Y-m-d H:i:s');
        $sql2 = "  INSERT INTO darbuotojas (dirba_nuo, pareigos, fk_asmuo)
        VALUES ('$currentDate', '$type', '$identityNr')";
      
        $conn->query($sql2);
    }

    public function deleteOldUsers($conn){
        $sql = "DELETE FROM asmuo 
                WHERE asmuo.asmens_kodas 
                IN 
                    (SELECT asmuo.asmens_kodas 
                    FROM `asmuo` 
                    WHERE DATE_ADD(asmuo.paskutinis_prisijungimas, INTERVAL 1 YEAR) <= now())";
        $conn->query($sql);
    }
    public function informForDeletion($conn){
        $sql = "SELECT asmuo.el_pastas
                FROM `asmuo` 
                WHERE DATE_ADD(asmuo.paskutinis_prisijungimas, INTERVAL 1 YEAR) <= DATE_ADD(now(), INTERVAL 7 DAY) 
                AND DATE_ADD(asmuo.paskutinis_prisijungimas, INTERVAL 1 YEAR) >= now()";
        $conn->query($sql);
        //Cia galima siust kad bus istrintas po 7 dienu
        $result = $conn->fetch_array(MYSQLI_NUM);
        return $result;
    }

}

?>
