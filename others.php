    
    <div class="PDO">
        <h3>Anslutning med PDO</h3>
        <?php
        /*  LÄGG IN DATA
            $sql = "INSERT INTO artikel(varunamn, farg, pris) VALUES ('Skjorta', 'Vit', 325);";
            $db->query($sql);
        */
        
        /* Anslut till databasen */
        $db = new PDO("mysql:dbname=varor;host=localhost;port=3306", 'varor', 'password') or die("Fel vid anslutning"); //pdo(typ av db)

        /* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
        $sql = "SELECT * FROM artikel";
        $result = $db->query($sql) or die("Fel vid SQL-fråga");

        /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) */
        foreach($result->FetchAll() as $row) { // I PDO returneras resultatet i en array
            echo "<article><h3>" . $row['varunamn'] . "</h3>";
            echo "<p>Pris: " . $row['pris'] . " kronor.</p>";
            echo "<p>Färg: " . $row['farg'] . "</p></article>";
        }
        ?>
    </div>

    <div class="mysqliobjekt">
    <h3>Anslutning med objektorienterad mysqli</h3>

    <?php
    /* Anslut till databasen */
    $db = new mysqli('localhost', 'varor', 'password', 'varor');
    if($db->connect_errno > 0){
        die('Fel vid anslutning [' . $db->connect_error . ']');
    }

    /* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
    $sql = "SELECT * FROM artikel";
    if(!$result = $db->query($sql)){
        die('Fel vid SQL-fråga [' . $db->error . ']');
    }

    /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) */
    while($row = $result->fetch_assoc()){
        echo "<article><h3>" . $row['varunamn'] . "</h3>";
        echo "<p>Pris: " . $row['pris'] . " kronor.</p>";
        echo "<p>Färg: " . $row['farg'] . "</p></article>";
    }
?>
    </div>