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
  <thead>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Jobtitel</th>
        <th>Adresse</th>
        <th>Stadt</th>
    </tr>
  </thead>

    <?php  
    
    while ($row = $statement->fetch()){

        echo " 
        <tr>
            <th>{$row['first_name']}</th>
            <th>{$row['last_name']}</th>
            <th>{$row['job_title']}</th>
            <th>{$row['address']}</th>
            <th>{$row['city']}</th>
            <th><a href='bestellung.php?id={$row['id']}'>Bestellungen</a></th>
        </tr>
        ";
   
    }
    
    ?>
    

</table>

<style>
 *{
   padding: 0;
   font-family: 'Poppins', sans-serif;
   margin: 0;
 }
 table, th, td {
   border:1px solid black;
 }
 table {
   border-collapse: collapse;
   margin: 25px 0;
   font-size: 0.9em;
   font-family: sans-serif;
   min-width: 400px;
 }
 table thead tr {
   background-color: #1E90FF;
   color: #ffffff;
   text-align: left;
 }
 table th,
 table td {
   padding: 12px 15px;
 }
</style>

