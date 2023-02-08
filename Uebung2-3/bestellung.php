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

$order = $_GET['id'];
echo '<h2>Ihre Bestellung</h2>';
$statement = $conn->prepare("SELECT * from orders where orders.customer_id = :id ");
$statement->execute([':id' => $order]);



?>

<table>
    <tr>
        <th>Bestelldatum</th>
        <th>Ship</th>
        <th>Payment type</th>
        <th>Paid date</th> 
    </tr>

    <?php  while ($row = $statement->fetch()){
        
        echo " 
        <tr>
            <th>{$row['order_date']}</th>
            <th>{$row['ship_name']}</th>
            <th>{$row['payment_type']}</th>
            <th>{$row['paid_date']}</th>
            <th><a href='delete.php?id={$row['id']}'>Bestellung löschen</a></th>
        </tr>
        ";
  
    }
    
    ?>
    

</table>