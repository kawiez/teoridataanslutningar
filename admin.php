<?php include("config.php") ?>
<?php 
    if(!isset($_SESSION['username'])) {
        header("location: login.php?message=Du måste vara inloggad");
    }

?>

<?php

/* Anslut till databasen */
        $db = mysqli_connect('localhost', 'varor', 'password', 'varor') or die('Fel vid anslutning');

        if(isset($_POST['varunamn'])){
            $varunamn = $_POST['varunamn'];
            $pris = $_POST['pris'];
            $farg = $_POST['farg'];

            $sql = "INSERT INTO artikel(varunamn, farg, pris) VALUES ('" . $varunamn . "', '" . $farg . "', $pris);";
            $result = mysqli_query($db, $sql) or die("Fel vid tillägning");
        }

        ?>

<div class="formdb">
    <h3>Lägg till vara</h3>
        <form action="index.php" method="post">
            <label for="varunamn">Varunamn: </label>
            <br>
            <input type="text" name="varunamn" />
            <br>
            <label for="pris">Pris: </label>
            <br>
            <input type="text" name="pris" />
            <br>
            <label for="farg">Färg: </label>
            <br>
            
            <select name="farg" id="farg">
                <option value="lila">Lila</option>
                <option value="gul">Gul</option>
            </select>
            <br>
            <input type="submit" value="Lägg till">

        </form>
    </div>

   
    <a href="logout.php">Logga ut</a>