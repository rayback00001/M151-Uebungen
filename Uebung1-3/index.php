<?php
  
    // Session starten
    session_start();

    // Daten verarbeiten
    $anzahl_aufrufe = 1;
    if (isset($_SESSION['anzahl_aufrufe'])) {
        $anzahl_aufrufe = $_SESSION['anzahl_aufrufe'];
    }
    
    echo "Die Seite wurde {$anzahl_aufrufe}x aufgerufen.";
    $anzahl_aufrufe++;

    // Daten speichern
    $_SESSION['anzahl_aufrufe'] = $anzahl_aufrufe;
?>

