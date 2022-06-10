<?php
require '../Models/GetDanTriData.php';
require '../Views/View.php';

class ParserDantri
{
    public function __construct()
    {
        $this->execute();
    }
    
    public function execute(){
        
        // Get Data Title
        $url_page = $_POST['url_page'];
        $url = $url_page;
        // Initialize a CURL session.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
        preg_match($regex_title, $result, $title);
        
        // Get Data description
        $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
        preg_match($regex_description, $result, $description);
        
        // Get Data Date
        $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
        preg_match($regex_date, $result, $date);
        
        // Get Data Details
        $regex_details = '#<p>(.*?)</p>#si';
        preg_match_all($regex_details, $result, $details);
    }
}
$controller = new ParserDantri;
$controller->execute();