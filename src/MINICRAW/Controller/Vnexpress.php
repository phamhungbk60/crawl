<?php
use Controller\Factory\GetDataUrls as Parser;
use Views\View;

class Vnexpress extends Parser
{
    protected $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
    protected $regex_description = '#<p class="description">(.*?)</p>#si';
    protected $regex_details = '#<p class="Normal">(.*?)</p>#si';
    protected $regex_date = '#<span class="date">(.*?)</span>#si';

    public $view;
  
    public function __construct()    
    {    
        $this->view = new View();
        
    }

    public function execute()
    {
        $title = $this->getDataTitle();
        $description = $this->getDataDate();
        $date = $this->getDataDate();
        $details = $this->getDataDetails();
        $this->model->insertData($title, $description ,$date , $details);
    }
}