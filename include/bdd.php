<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "netflix";

try {
  // Create a secure connection using PDO
  $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Set PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}



?>