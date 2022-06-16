<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Craw</title>
</head>
<body>
<form class="row_form" method="post" novalidate="novalidate">
        <div class="form-group">
          <label for="urlPage">Enter the link here</label>
          <input type="text" class="form-control" id="urlPage" name="url_page" placeholder="Enter link">
        </div>
        <button type="submit" name="button_save" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>

<?php
    if (isset($_POST['button_save'])) {
        if (isset($_POST['url_page'])) {
            $url_page = $_POST['url_page'];
            echo $url_page;
        } else {
            $url_page = " ";
        }
    }
?>


<table cellspacing="0" cellpadding="0" class="form">
    <thead>
        <tr>
            <td>Username</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $item){ ?>
        <tr>
            <td><?php echo $item['username']; ?></td>
            <td><?php echo $item['email']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
class Config {    
    const SERVERNAME = "localhost";
    const USERNAME="minicraw";
    const PASSWORD = "2002";
    const DBNAME ="minicraw";

    public function connect(){
        // Connect Database
        $connect = mysqli_connect(self::SERVERNAME,self::USERNAME,self::PASSWORD,self::DBNAME);
        mysqli_set_charset($connect,"uft8");

        // Data insertion procedure

        // Get Data Title
        $url_page = $_POST['url_page'];
        $url = $url_page;
        // Initialize a CURL session.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        // $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
        $regex_title = '#<h1 class="newsFeature__header-title mt-20">(.*?)</h1>#si';
        // $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
        preg_match($regex_title, $result, $title);

        // Get Data description
        // $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
        $regex_description = '#<div class="newFeature__main-textBold">(.*?)</div>#si';
        // $regex_description = '#<p class="description">(.*?)</p>#si';
        preg_match($regex_description, $result, $description);

        // Get Data Date
        $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
        // $regex_date = '#<span>(.*?)</span>#si';
        // $regex_date = '#<span class="date">(.*?)</span>#si';
        preg_match($regex_date, $result, $date);

        // Get Data Details
        // $regex_details = '#<p>(.*?)</p>#si';
        $regex_details = '#<p>(.*?)</p>#si';
        // $regex_details = '#<p class="Normal">(.*?)</p>#si';
        
        preg_match_all($regex_details, $result, $details);

        $sqls = sprintf("Select * From data");
        if ($connect->query($sqls) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sqls . "<br>" . $connect->error;
          }

        $sql = sprintf("INSERT INTO Data (title, description, date, details) 
        VALUES ('%s', '%s', '%s', '%s')", str_replace("'", "", $title[1]), str_replace("'", "", $description[1]), $date[1], str_replace("'", "", implode (" ",$details[1])));
        // Check Data connect
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