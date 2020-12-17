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

    public function getWorkersFk() {
        $sql = "  SELECT asmens_kodas
                    FROM asmuo
                    WHERE role='darbuotojas'";
        $data = $conn->query($sql);
        return $data;
    }
}

?>
