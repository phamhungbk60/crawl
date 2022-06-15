<?php

use Controller\Factory\GetDataUrl as Parser;

class Vnexpress extends Parser
{
    protected $regex_title = '#<h1 class="newsFeature__header-title mt-20">(.*?)</h1>#si';
    protected $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
    protected $regex_details = '#<p>(.*?)</p>#si';
    protected $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';


    public function __construct()
    {
    }

    public function execute()
    {
        $title = $this->getDataTitle();
        $description = $this->getDataDate();
        $date = $this->getDataDate();
        $details = $this->getDataDetails();
        $this->insertData($title, $description ,$date , $details);
    }
}