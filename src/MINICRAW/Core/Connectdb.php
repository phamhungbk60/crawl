<?php
namespace Core;

class Connectdb
{
    public $conn;
    private $servername = "localhost";
    private $username = "minicraw";
    private $pass = "2002";
    private $dbname = "minicraw";

    public function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->pass);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAME 'uft8'");
    }
}
