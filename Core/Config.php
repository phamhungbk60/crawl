<?php

class Config
{    
    const SERVERNAME = "localhost";
    const USERNAME="minicraw";
    const PASSWORD = "2002";
    const DBNAME ="minicraw";

    public function connect(){
        /** 
         * Connect Database
         * */ 
        $connect = mysqli_connect(self::SERVERNAME,self::USERNAME,self::PASSWORD,self::DBNAME);
        mysqli_set_charset($connect,"uft8");

        /**
         * Process Data insert
         */


        
        
         /**
         * Get Data Title
        */
        $url = "https://vnexpress.net/ba-nuoc-cam-may-bay-cho-ngoai-truong-nga-4472525.html";
        // Initialize a CURL session.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
        preg_match($regex_title, $result, $title);

        /**
         * Get Data description
         */
        $regex_description = '#<p class="description">(.*?)</p>#si';

        preg_match($regex_description, $result, $description);
        // var_dump($description);
        // die();

        /**
         * Get Data Date
         */
        // $regex_date = '#<span class="date">(.*?)</span>#si';

        // preg_match($regex_date, $result, $date);
        // var_dump($date);
        // die();
        
        /**
         * Get Data Details
         */

        $regex_details = '#<p class="Normal">(.*?)</p>#si';

        preg_match_all($regex_details, $result, $details);

        foreach($details as $detail){
            // var_dump($detail[0]);
            // die();    
        

        /**
         * Test Insert data
         */
        $date = '2022-05-29';
        
        $sql = sprintf("INSERT INTO Data (title, description, date, details) VALUES ('%s', '%s', '%s', '%s')", $title[0], $description[0], $date, $detail[1]);
    }

        /**
         * Check Data connect
         */
        if ($connect->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
          }
        $connect->close();

    }
}

$CONSO = new Config;
$CONSO->connect();