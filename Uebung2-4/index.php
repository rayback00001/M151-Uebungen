<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password); // Er definiert, dass der Datenbanktyp mysql ist

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Attribute
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


echo '<h2>Kunden</h2>';
$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();

function e($string) {
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<table>
  <thead>
    <tr>
        <th>Id</th>
        <th>Firma</th>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>Email</th>
        <th>Job</th>
        <th>Business Phone</th>
        <th>Home Phone</th>
        <th>Mobile Phone</th>
        <th>Fax-Nummer</th>
        <th>Adresse</th>
        <th>Stadt</th>
        <th>Staat</th>
        <th>PLZ</th>
        <th>Region</th>
        <th>Web Page</th>
        <th>Notes</th>
        <th>Anhänge</th>
    </tr>
  </thead>

    <?php  
    
    while ($row = $statement->fetch()){

        echo " 
        <tr>
            <th>{$row['id']}</th>
            <th>{$row['company']}</th>
            <th>{$row['last_name']}</th>
            <th>{$row['first_name']}</th>
            <th>{$row['email_address']}</th>
            <th>{$row['job_title']}</th>
            <th>{$row['business_phone']}</th>
            <th>{$row['home_phone']}</th>
            <th>{$row['mobile_phone']}</th>
            <th>{$row['fax_number']}</th>
            <th>{$row['address']}</th>
            <th>{$row['city']}</th>
            <th>{$row['state_province']}</th>
            <th>{$row['zip_postal_code']}</th>
            <th>{$row['country_region']}</th>
            <th>{$row['web_page']}</th>
            <th>{$row['notes']}</th>
            <th>{$row['attachments']}</th>
            
        </tr>
        ";
   
    }
    
    ?>


<style>
 *{
   padding: 0;
   font-family: 'Poppins', sans-serif;
   margin: 0;
 }

 body{
  display: flex;
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
   justify-content: center;
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

