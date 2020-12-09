<?php
class database {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'vairavimo_kursai';
    
    public function connect()
    {
        //kazka cia keist reik nes ne taip turi but
        $conn = new mysqli('localhost', 'root', '', 'vairavimo_kursai');
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
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
    
    public function logIn($conn, $user, $pass) {
        $sql = "  SELECT *
                    FROM asmuo
                    WHERE el_pastas='$user'
                    AND slaptazodis='$pass'";
        $data = $conn->query($sql);
        return $data;
    }
}

?>
