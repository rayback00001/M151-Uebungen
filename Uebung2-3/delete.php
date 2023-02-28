<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password); 

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$delete = $_GET['id'];
echo '<h2>Bestellung löschen</h2>';
$statement = $conn->prepare("delete from orders where orders.customer_id = :id ");
$statement->execute([':id' => $delete]);


?>