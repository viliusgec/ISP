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

    public function register($conn, $name, $surname, $id, $email, $pass)
    {
        $sql = "  INSERT INTO asmuo (vardas, pavarde, el_pastas, slaptazodis, asmens_kodas, role)
        VALUES ('$name', '$surname', '$email', '$pass', '$id', 'klientas')";
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
