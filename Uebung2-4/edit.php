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


// preset laden
$preset = null;
if(isset($_GET['id']) && $_GET['id'] !== ''){
    $sql = "SELECT * FROM customers WHERE id = :id";
    $statement = $conn->prepare($sql);

    $statement->execute([
            ':id' => $_GET['id']
    ]);

    $preset = $statement ->fetch();
}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
         if($preset){
            $sql = "UPDATE customers SET company = :company,
                        last_name = :last_name,
                        first_name = :first_name,
                        email_address = :email_address
                    WHERE id = :id ";

                $statement = $conn->prepare($sql);

                $statement->execute([
                    ':company' => $_POST['company'],
                    ':last_name' => $_POST['last_name'],
                    ':first_name' => $_POST['first_name'],
                    ':email_address' => $_POST['email_address'],


                    ':id' => $_GET['id'],

                ]);

                $sql = "SELECT * FROM customers WHERE id = :id";
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':id' => $_GET['id']
                ]);

                $preset = $statement->fetch();
         }else{
            header('Location: index.php');
            die();
        }
    }


?>


<form action="edit.php?id=<?= $preset ? $preset['id'] : '' ?>" method="POST">
        <div>
            <input type="text" name="company" placeholder="Firma" value="<?=$preset ? $preset['company'] : '' ?>">
        </div>
        <div>
            <input type="text" name="last_name" placeholder="Nachname" value="<?=$preset ? $preset['last_name'] : '' ?>">
        </div>
        <div>
            <input type="text" name="first_name" placeholder="Vorname" value="<?=$preset ? $preset['first_name'] : '' ?>">
        </div>
        <div>
            <input type="email" name="email_address" placeholder="Email" value="<?=$preset ? $preset['email_address'] : '' ?>">
        </div>
       
        <button type="submit">Speichern</button>
</form>



