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


echo '<h2>Kunden</h2>';
$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();
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
            <th><a href='bestellung.php?id={$row['id']}'>Bestellungen</a></th>
        </tr>
        ";
  
       
    }
    
    ?>
    

</table>

