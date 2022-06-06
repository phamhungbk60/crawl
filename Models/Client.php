<?php

Class Client extends Config
{

    protected $connect;
    
    public function __construct(){
        $this->connect = $this->connect();
    }

    public function insertData()
    {
    $title = "This is title of vnexpress";
    $description = "description VN 222";
    $date = '2022-05-29';
    $details = 'Details description VNexpress';    
    
    $sql = sprintf("INSERT INTO Data (title, description, date, details) VALUES ('%s', '%s', '%s', '%s')", $title, $description, $date, $details);
    $query =  $this->query($sql);
}

    public function query($sql){
        return mysqli_query($this->connect,$sql);
    }
}
    $a = new Client();
    $a->insertData();



