<?php

    session_start();
    $ingredients = array();
    if(isset($_SESSION['ingredients'])){
        $ingredients = $_SESSION['ingredients'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
       
       $ingredient = $_POST['ingredient'];
       array_push($ingredients, $ingredient);
       $_SESSION['ingredients'] = $ingredients;
       
    }

?>

<h1>Pizza Konfigurator</h1>
<p>Deine Pizza besteht aus folgenden Toppings:</p>
<ul>
<?php 
    foreach($ingredients as $ing){
        echo '<li>'. $ing . '</li>';
    }?>
</ul>

<form method="POST" action="?">
    <p>Füge weitere Zutaten hinzu:</p>
    <input type="text" name="ingredient" placeholder="Zutat" />
    <input type="submit" value="Hinzufügen" />
</form>
