<?php 
    $content = file_get_contents("https://vnexpress.net/hlv-park-toi-muon-gianh-lai-aff-cup-tu-thai-lan-4467858.html");
    
    $pattern1 = '#<span class="date">(.*?)</span>#si';
    $pattern2 = '#<h1 class="title-detail">(.*?)</h1>#si';
    $pattern3 = '#<p class="description">(.*?)</p>#si';
    $pattern4 = '#<p class="Normal">(.*?)</p>#si';

    preg_match($pattern1, $content, $date);
    preg_match($pattern2, $content, $title);
    preg_match($pattern3, $content, $description);
    preg_match_all($pattern4, $content, $details);

    echo '<pre>';
    print_r($date);
    echo '</pre>';

    echo '<pre>';
    print_r($title);
    echo '</pre>';

    echo '<pre>';
    print_r($description);
    echo '</pre>';

    echo '<pre>';
    print_r($details);
    echo '</pre>';