<?php
class DantriData extends Connectdb
{
    public function insertData($title, $description ,$date , $details)
    {
    $query = sprintf("INSERT INTO Data (title, description, date, details) 
        VALUES ('%s', '%s', '%s', '%s')", str_replace("'", "", $title[1]), str_replace("'", "", $description[1]), $date[1], str_replace("'", "", implode (" ",$details[1])));
        return mysqli_query($this->conn,$query);
    }
}   