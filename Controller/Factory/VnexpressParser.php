<?php
// From URL to get webpage contents
$url = "https://vnexpress.net/kien-nghi-som-huong-dan-phat-tu-lai-xe-say-ruou-4471913.html";

// Initialize a CURL session.
$ch = curl_init();

// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Grab URL and pass it to the variable
curl_setopt($ch, CURLOPT_URL, $url);

$result = curl_exec($ch);

// Get the date
$regex_date = '#<span class="date">(.*?)</span>#si';

preg_match($regex_date, $result, $date);

var_dump($date[0]);

// Get the title
$regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';

preg_match($regex_title, $result, $title);

var_dump($title[0]);

// Get the description

$regex_description = '#<p class="description">(.*?)</p>#si';

preg_match($regex_description, $result, $description);
var_dump($description[0]);

// Get the details

$regex_details = '#<p class="Normal">(.*?)</p>#si'; 

preg_match($regex_details, $result, $details);
var_dump($details[0]);