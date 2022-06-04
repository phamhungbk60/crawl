<?php
  $host = "localhost";
  $username = "minicraw";
  $password = "2002";
  $db = "minicraw";

  // Create connection
  $conn = new mysqli($host, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $title = "This is title of dantri.com";
  $content = "Content VN 789";
  $date = '2022-05-20';

  $sql = sprintf("INSERT INTO Data (title, content, date) VALUES ('%s', '%s', '%s')", $title, $content, $date);

  // $sql = "INSERT INTO Data (title, content, date)
  // VALUES ('This is title of dantri.com', 'Content dantri.com', '2022-06-08')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>

  <!-- 
  $title = "This is title of dantri.com";
  $content = "Content VN 123";
  $date = '2022-05-20';
  // $sql = `INSERT INTO Data (content) VALUES ('` . $title . `', )`;
  $sql = sprintf("INSERT INTO Data (title, content, date) VALUES ('%s', '%s', '%s')", $title, $content, $date);
  // Check connection
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }

  if ($conn->query($sql) === TRUE) {
    echo('INSERTED');
  }

  $conn->close(); -->