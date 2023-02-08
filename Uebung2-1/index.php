<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br />";

mysqli_select_db($conn, $database);

echo "Datenbank ausgewählt!<br />";

$sql = "select * from customers where job_title = 'Purchasing Representative' ";
$result = $conn->query($sql);

while($record = mysqli_fetch_assoc($result)){
   d($record);
}

function d($args){
   echo "<pre>";
   var_dump($args);
   echo "</pre>";
}


mysqli_close($conn)
?>