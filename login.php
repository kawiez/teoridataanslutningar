<?php include("config.php") ?>
<?php
      
      if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];

          if($username == "kajsa" && $password == "ripdobby") {
              $_SESSION['username'] = $username;
              header("location:admin.php");
          } else {
              $message = "Fel anv/lösen";
          }
      }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggning</title>
</head>
<body>


    <?php 

    if(isset($_GET['message'])) {
        echo $_GET['message'];
    }

    ?>

    <form action="" method="post">
        <label for="username">Användarnamn:</label>
        <br>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Lösenord:</label>
        <br>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" value="Logga in">
    
    </form>
</body>
</html>
