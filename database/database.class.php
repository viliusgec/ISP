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
