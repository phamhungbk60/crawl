<?php
namespace Models;
use Core\Connectdb;

class Clients extends Connectdb
{
    public function insertData($title, $description ,$date , $details)
    {
    $query = sprintf("INSERT INTO Data (title, description, date, details) 
        VALUES ('%s', '%s', '%s', '%s')", $title, $description, $date, $details);
        return mysqli_query($this->conn,$query);
    }
}   