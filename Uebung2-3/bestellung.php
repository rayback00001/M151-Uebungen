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

$order = $_GET['id'];
echo '<h2>Ihre Bestellung</h2>';
$statement = $conn->prepare("SELECT * from orders where orders.customer_id = :id ");
$statement->execute([':id' => $order]);


function e($string) {
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<table>
  <thead>
    <tr>
        <th>Bestelldatum</th>
        <th>Ship</th>
        <th>Payment type</th>
        <th>Paid date</th> 
    </tr>
  </thead>

    <?php  
    
    while ($row = $statement->fetch()){
        
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


<style>
 *{
   padding: 0;
   font-family: 'Poppins', sans-serif;
   margin: 0;
 }

 body{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-top: 25px;
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
   text-align: center;
 }
 table th,
 table td {
   padding: 12px 15px;
 }
</style>