<?php
    $username = $_GET['username'];
    
    echo "Hallo {$username}!<br />";

    if ($_GET['age']) {
        $age = $_GET['age'];
        echo "Du bist {$age} Jahre alt.";
    }

    // Lösung: http://m151.test/Uebung1-4/index.php?username=Username&age=15
?>



   


