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

    .formdb {
        background-color: orange;
    }
    </style>
</head>
<body>
    <h1>Webbutik</h1>
    <a href="admin.php">Admin</a>

    <h2>Mina varor</h2>


    <div class="mysqli">
        <h3>Anslutning med mysqli</h3>

        <?php

        /* LÄGGA IN DATA
        $sql = "INSERT INTO artikel(varunamn, farg, pris) VALUES ('Skjorta', 'Vit', 325);";
        $result = mysqli_query($db, $sql);
        */

        /* Anslut till databasen */
        $db = mysqli_connect('localhost', 'varor', 'password', 'varor') or die('Fel vid anslutning');

        if(isset($_POST['varunamn'])){
            $varunamn = $_POST['varunamn'];
            $pris = $_POST['pris'];
            $farg = $_POST['farg'];

            $sql = "INSERT INTO artikel(varunamn, farg, pris) VALUES ('" . $varunamn . "', '" . $farg . "', $pris);";
            $result = mysqli_query($db, $sql) or die("Fel vid tillägning");
        }

        /* SQL-fråga  för att läsa ut allt (*) från tabellen artikel */
        $sql = "SELECT * FROM artikel";
        $result = mysqli_query($db, $sql) or die('Fel vid SQL-fråga');

        /* Loopa genom resultatet (alla rader som returneras av SQL-frågan) */
        while ($row = mysqli_fetch_array($result)) {
            echo "<article><h3>" . $row['varunamn'] . "</h3>";
            echo "<p>Pris: " . $row['pris'] . " kronor.</p>";
            echo "<p>Färg: " . $row['farg'] . "</p></article>";
        }


        mysqli_close($db);

    ?>
    </div>


</body>
</html>