<?php
/* Anslut med nytt konto för varor */
$db = new mysqli("localhost", "varor", "password", "varor");
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 

/* SQL-fråga för att skapa tabell */
$sql = "DROP TABLE IF EXISTS artikel;
    CREATE TABLE artikel(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    varunamn VARCHAR(64) NOT NULL,
    farg VARCHAR(24),
    pris INT(11)
);";

/* SQL-fråga för att lägga in data */
$sql .= "INSERT INTO artikel (varunamn, farg, pris) VALUES
('Jacka', 'Grön', 500),
('Byxor', 'Blå', 300),
('Tröja', 'Gul', 400),
('Skor', 'Svart', 250);";

echo "<pre>$sql</pre>"; // Skriv ut SQL-frågan till skärm

/* Skicka SQL-frågan till DB */
if($db->multi_query($sql)) {
    echo "Tabell installerad.";
} else {
    echo "Fel vid installation av Tabell.";
}
