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
        background-color: green;
    }

    .mysqli {
        background-color: pink;
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
    </div>

    <div class="mysqli">
        <h3>Anslutning med mysqli</h3>

        <?php
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

    <div>
    </div>

</body>
</html>