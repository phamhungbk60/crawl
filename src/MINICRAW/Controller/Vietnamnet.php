<?php
use Controller\Factory\GetDataUrls as Parser;
use Views\View;

class Vietnamnet extends Parser
{
    protected $regex_title = '#<h1 class="newsFeature__header-title mt-20">(.*?)</h1>#si';
    protected $regex_description = '#<div class="newFeature__main-textBold">(.*?)</div>#si';
    protected $regex_details = '#<p>(.*?)</p>#si';
    protected $regex_date = '#<span>(.*?)</span>#si';


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