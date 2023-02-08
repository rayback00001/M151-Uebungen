<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password); // Er definiert, dass der Datenbanktyp mysql ist

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Attribute
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/*
echo '<h2>Kunden</h2>';
$sql = "SELECT * FROM customers";
foreach ($conn->query($sql) as $row) {
   echo $row['first_name']. ' ' .$row['last_name']."<br />";
}
*/

$jobTitle = $_GET['job_title'];
echo '<h2>Kunden</h2>';
$sql = "SELECT * FROM customers where job_title = :job_title";
$statement = $conn->prepare($sql);
$statement->execute([':job_title' => $jobTitle]);
?>

<table>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Jobtitel</th>
    </tr>

    <?php  while ($row = $statement->fetch()){

        echo " 
        <tr>
            <th>{$row['first_name']}</th>
            <th>{$row['last_name']}</th>
            <th>{$row['job_title']}</th>
        </tr>
        ";
  
       
    }
    
    ?>
    

</table>

