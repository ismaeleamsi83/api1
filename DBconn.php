<?php

class DBconn{

    private $host;
    private $dbname;
    private $user;
    private $passsword;
    public $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->dbname = 'icb0006_uf4_pr01';
        $this->user = 'root';
        $this->passsword = '';
    }

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->passsword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'connection faile: ' . $e->getMessage();
        }
        return $this->conn;
    }


}

?>