<?php
namespace Controller\Factory;
use Interfaces\Parser as Parsers;
use Models\Clients;

class GetDataUrls implements Parsers
{
    public $model;   

  
    public function __construct()    
    {    
        $this->model = new Clients(); 
    }

    public function getDataUrl()
    {
        $url = $_POST['url_page'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
        $result = curl_exec($ch);
        return $result; 
    }

    public function getDataTitle()
    {
        $results =  $this->getDataUrl();
        preg_match($this->regex_title, $results, $title);
        return str_replace("'", "", $title[1]); 
    }

    public function getDataDescription(){
        $results =  $this->getDataUrl();
        preg_match($this->regex_description, $results, $description);
        return str_replace("'", "", $description[1]);
    }

    public function getDataDate(){
        $results =  $this->getDataUrl();
        preg_match($this->regex_date, $results, $date);
        return $date[1];
    }

    public function getDataDetails(){
        $results =  $this->getDataUrl();
        preg_match_all($this->regex_details, $results, $details);
        return str_replace("'", "", implode (" ",$details[1]));
    }
}