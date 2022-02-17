<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL - Teori</title>
</head>
<body>
    <h1>Webbutik</h1>

    <h2>Mina varor</h2>

  
    <?php
    /* Anslut till databasen */
    $db = new PDO("mysql:dbname=varor;host=localhost;port=3306", 'varor', 'password') or die("Fel vid anslutning"); 

    /* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
    $sql = "SELECT * FROM artikel";
    $result = $db->query($sql) or die("Fel vid SQL-fråga");

    /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) */
    foreach($result->FetchAll() as $row) {
        echo "<article><h3>" . $row['varunamn'] . "</h3>";
        echo "<p>Pris: " . $row['pris'] . " kronor.</p>";
        echo "<p>Färg: " . $row['farg'] . "</p>";
    }
    ?>


</body>
</html>