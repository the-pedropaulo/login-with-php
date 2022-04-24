<?php

$host="localhost";
$username="root";
$password="";
$dbname="app-login";
$port=3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname",$username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>