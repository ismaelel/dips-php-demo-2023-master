<nav>
    <a  href="index.php">Home</a>
    <a href="cv.php">CV</a>
    <a href="contact.php">Contact</a>

    <?php
    session_start();
    if (!isset($_SESSION['mail']) && !isset($_SESSION['pwd'])) {

        ?>
        <a href="login.php">Connexion</a>

<?php }
    else {
        echo "<a href='logout.php'>Déconnexion</a>";
    }

        ?>
</nav>