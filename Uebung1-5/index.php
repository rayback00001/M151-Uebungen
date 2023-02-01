<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $username = $_POST['name'];
        $select = $_POST['class'];
        
        if(empty($username))
        {
            echo  'Username eingeben!';
        }
        else if(!empty($username)){
            echo "Hallo {$username} Sie gehen in die {$select}!";
        }
    }
?>

<form method="POST" action="?">
    <input type="text" name="name" placeholder="Benutzername" />
    <select name="class" id="class">
        <option value="1.Klasse">1.Klasse</option>
        <option value="2.Klasse">2.Klasse</option>
        <option value="3.Klasse">3.Klasse</option>
        <option value="4.Klasse">4.Klasse</option>
    </select>
    <input type="submit" value="Absenden" />
</form>