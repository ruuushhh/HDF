<?php
  if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "<script type='text/javascript'>
    error();
    </script>";
    exit();
  }
  
  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email = strip_tags(htmlspecialchars($_POST['email']));
  $subject = strip_tags(htmlspecialchars($_POST['subject']));
  $message = strip_tags(htmlspecialchars($_POST['message']));
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "healingd_queries";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "insert into Queries(Name, Email, Subject, Message) values ('$name', '$email', '$subject','$message')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "<script type='text/javascript'>
  success();
  </script>" ;
} catch(PDOException $e) {
  echo "<script type='text/javascript'>
  error();
  </script>";
}

$conn = null;   
?>