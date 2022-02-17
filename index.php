<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL - Teori</title>

    <style>

    body {
        font-size: 1.1em;
        text-align: center;
    }

    div {
        padding: 5%;
        margin: 2% auto;
        width: 60%;
    }
    .PDO {
        background-color: lightgreen;
    }

    .mysqli {
        background-color: pink;
    }

    .mysqliobjekt{
        background-color: lightblue;
    }
    </style>
</head>
<body>
    <h1>Webbutik</h1>

    <h2>Mina varor</h2>
    <div class="PDO">
        <h3>Anslutning med PDO</h3>
        <?php
        
        
        /* Anslut till databasen */
        $db = new PDO("mysql:dbname=varor;host=localhost;port=3306", 'varor', 'password') or die("Fel vid anslutning"); //pdo(typ av db)

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
    </div>

    <div class="mysqli">
        <h3>Anslutning med mysqli</h3>

        <?php

        /* LÄGGA TILL I BÖRJAN
        $sql = "INSERT INTO artikel(varunamn, farg, pris) VALUES ('Skjorta', 'Vit', 325);";
        $result = mysqli_query($db, $sql);
        */

        /* Anslut till databasen */
        $db = mysqli_connect('localhost', 'varor', 'password', 'varor') or die('Fel vid anslutning');

        /* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
        $sql = "SELECT * FROM artikel";
        $result = mysqli_query($db, $sql) or die('Fel vid SQL-fråga');

        /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) */
        while ($row = mysqli_fetch_array($result)) {
            echo "<article><h3>" . $row['varunamn'] . "</h3>";
            echo "<p>Pris: " . $row['pris'] . " kronor.</p>";
            echo "<p>Färg: " . $row['farg'] . "</p>";
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
    }
?>
    </div>

</body>
</html>