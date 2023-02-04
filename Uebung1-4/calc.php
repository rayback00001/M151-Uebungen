<?php

    
    $x = $_GET['x'];
    $y = $_GET['y'];
    $mode = $_GET['mode'];

    switch($mode){
        case 'plus';
           $res =  $x + $y;
            break;
        case 'minus';
        $res = $x - $y;
            break;
        case 'mal';
        $res =  $x * $y;
            break; 
        case 'div';
        $res =  $x / $y;
            break;   

        
    }

    echo "Antwort: {$res}";

    // http://m151.test/Uebung1-4/calc.php?x=5&y=7&mode=mal

    // Antwort: 35


?>