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

    public function register($conn, $name, $surname, $id, $email, $pass, $hash)
    {
        $sql = "  INSERT INTO asmuo (vardas, pavarde, el_pastas, slaptazodis, asmens_kodas, role, tokenas)
        VALUES ('$name', '$surname', '$email', '$pass', '$id', 'klientas', '$hash')";
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
}

?>
