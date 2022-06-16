<?php
use Controller\Factory\GetDataUrls as Parser;
use Views\View;

class Dantri extends Parser
{
    protected $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
    protected $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
    protected $regex_details = '#<p>(.*?)</p>#si';
    protected $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
  
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