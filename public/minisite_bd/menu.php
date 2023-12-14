<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a  href="index.php">Home</a>


        <?php
        session_start();
        if (!isset($_SESSION['mail']) && !isset($_SESSION['pwd'])) {

            ?>

            <a href="login_bd.php">Connexion</a>
            <a href="register.php">Inscription</a>

        <?php }
        else {
            echo "<a href='logout.php'>Déconnexion</a>";
        }

        ?>
    </div>
</nav>